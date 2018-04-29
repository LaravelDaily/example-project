<?php
/**
 * Created by PhpStorm.
 * User: Faustas
 * Date: 2018-04-28
 * Time: 22:52
 */

namespace App\Services;


use App\TogglReport;

class TogglReportService
{
    public function deleteReport(TogglReport $report)
    {
        $path = public_path('reports/' . $report->file_name . '.pdf');

        if (file_exists($path)) {
            unlink($path);
        }

        $report->delete();
    }
}