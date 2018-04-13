<?php

namespace App\Http\Controllers;

use App\Services\TogglService;

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
            return back()->withErrors(['message' => $e->getMessage()]);
        }

        return view('toggl.index', compact('me'));
    }

}
