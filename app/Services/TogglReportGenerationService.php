<?php


namespace App\Services;


use Dompdf\Dompdf;

class TogglReportGenerationService
{

    private $togglService;

    public function __construct(TogglService $togglService)
    {
        $this->togglService = $togglService;
    }

    private function getGroupedByDescriptionTimeEntries($start_date, $end_date)
    {
        $entries = collect($this->togglService->getTimeEntries($start_date, $end_date));

        $entries = $entries->map(function($entry){
            $entry->description = $entry->description ?? 'untitled';
            return $entry;
        });

        return $entries->groupBy('description');
    }

    private function calculateGroupTotalTime($group)
    {
        return $group->reduce(function ($total, $entry) {
            return $total + $entry->duration;
        });
    }

    private function getDescriptionAndTimeArray($start_date, $end_date)
    {
        $entries = $this->getGroupedByDescriptionTimeEntries($start_date, $end_date);

        $result = [];

        foreach ($entries as $description => $entries_group) {
            $result[$description] = $this->calculateGroupTotalTime($entries_group);
        }

        return $result;
    }

    private function getTotalReportTime($entries)
    {
        return array_reduce($entries, function($sum, $entry){
            return $sum + $entry;
        });
    }

    private function formatTime($seconds)
    {
        return sprintf('%02d:%02d:%02d', ($seconds / 3600),($seconds / 60 % 60), $seconds % 60);
    }

    private function formatEntriesTime($entries)
    {
        foreach ($entries as $description => $time) {
            $entries[$description] = $this->formatTime($time);
        }

        return $entries;
    }

    private function saveToFile($filename, $pdf)
    {
        if (!file_exists(public_path('reports'))) {
            mkdir(public_path('reports'));
        }

        $path = public_path('reports/' . $filename . '.pdf');
        $i = 0;
        while (file_exists($path)) {
            $path = public_path('reports/ ' .$filename . '(' . ++$i . ').pdf');
        }

        file_put_contents($path, $pdf);

        return $filename;
    }

    private function formatTitleToFilename($title)
    {
        $filename = str_replace(' ', '_', $title);
        return strtolower($filename);
    }

    public function generateReport($title, $start_date, $end_date)
    {
        $entries = $this->getDescriptionAndTimeArray($start_date, $end_date);

        if (count($entries) <= 0) {
            return false;
        }

        $total_time = $this->formatTime($this->getTotalReportTime($entries));
        $name       = $this->togglService->me()->data->fullname;
        $entries    = $this->formatEntriesTime($entries);

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('toggl_reports.pdf.report', compact('entries', 'total_time', 'start_date', 'end_date', 'name')));
        $dompdf->render();

        return $this->saveToFile($this->formatTitleToFilename($title), $dompdf->output());
    }
}