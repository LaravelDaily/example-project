<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTogglReportRequest;
use App\Services\TogglReportGenerationService;
use App\Services\TogglReportService;
use App\Services\TogglService;
use App\TogglReport;

class TogglReportsController extends Controller
{
    /**
     * @var TogglReportGenerationService
     */
    private $reportGenerator;
    /**
     * @var TogglService
     */
    private $togglService;
    /**
     * @var TogglReportService
     */
    private $togglReportService;

    /**
     * TogglReportsController constructor.
     * @param TogglReportGenerationService $reportGenerator
     * @param TogglService $togglService
     * @param TogglReportService $togglReportService
     */
    public function __construct
    (
        TogglReportGenerationService $reportGenerator,
        TogglService $togglService,
        TogglReportService $togglReportService
    )
    {
        $this->reportGenerator = $reportGenerator;
        $this->togglService = $togglService;
        $this->togglReportService = $togglReportService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = TogglReport::paginate(10);

        return view('togglReports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('togglReports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTogglReportRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTogglReportRequest $request)
    {
        $title    = $request->input('report_title');
        $start    = $request->input('start_date');
        $end      = $request->input('end_date');
        $userName = $this->togglService->me()->data->fullname;
        $fileName = $this->reportGenerator->generateReport($title, $start, $end);

        if (!$fileName) {
            return redirect()->route('togglReports.index')
                ->with('status', 'danger')
                ->with('message', 'There is no entries at date interval given');
        }

        TogglReport::create([
            'file_name'  => $fileName,
            'user_name'  => $userName,
            'title'      => $title,
            'start_date' => $start,
            'end_date'   => $end
        ]);

        return redirect()->route('togglReports.index')
            ->with('status', 'success')
            ->with('message', 'Report created. You can download it now.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->togglReportService->deleteReport(TogglReport::findOrFail($id));

        return redirect()->route('togglReports.index')
            ->with('status', 'success')
            ->with('message', 'Report deleted.');
    }
}
