<?php

namespace App\Http\Controllers;

use App\Services\TogglService;
use Illuminate\Http\Request;

class TogglController extends Controller
{

    private $togglService;

    public function __construct(TogglService $togglService)
    {
        $this->togglService = $togglService;
    }

    public function index()
    {
        try {
            $me = $this->togglService->me();
        } catch (\Exception $e) {
            return view('toggl.index')->withErrors(['message' => $e->getMessage()]);
        }

        return view('toggl.index', compact('me'));
    }

    public function timeEntries(Request $request)
    {
        $startDate = $request->input('start_date', false);
        $endDate = $request->input('end_date', false);

        try {
            $timeEntries = $this->togglService->getTimeEntries($startDate, $endDate);
        } catch (\Exception $e) {
            return back()->withErrors(['message' => $e->getMessage()]);
        }

        return view('toggl.timeEntries', compact('timeEntries', 'startDate', 'endDate'));
    }

}
