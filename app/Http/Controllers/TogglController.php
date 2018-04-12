<?php

namespace App\Http\Controllers;

use App\Services\TogglService;

class TogglController extends Controller
{

    private $service;

    public function __construct(TogglService $togglService)
    {
        $this->service = $togglService;
    }

    public function index()
    {
        try {
            $me = $this->service->me();
        } catch (\Exception $e) {
            return view('Toggl.Error')->withErrors(['message' => $e->getMessage()]);
        }

        return view('Toggl.Index', compact('me'));
    }

}
