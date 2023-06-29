<?php

namespace App\Http\Controllers\Front\Client;

use App\Http\Controllers\Controller;
use App\Service\Project\ProjectServiceInterface;
use App\Service\Time\TimeServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $projectService;

    private $timeService;

    public function __construct(ProjectServiceInterface $projectService, TimeServiceInterface $timeService)
    {
        $this->projectService = $projectService;
        $this->timeService = $timeService;
    }
    public function index()
    {

        $client = auth()->user()->id;
        $projects = $this->projectService->getProjectsByClient($client);
        //Get working hours in current month
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        foreach ($projects as $project) {
            $totalProjectHours = 0;
            foreach ($project->creators as $creator) {
                $currentMonthWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
                $creator->totalWorkingHours = $currentMonthWorkingHours;
                $totalProjectHours += $creator->totalWorkingHours;
            }
            $project->totalHours = $totalProjectHours;
        }

        $monthYear = Carbon::now()->format('Y-m');
        return view('front.client.index', compact('projects', 'monthYear'));
    }

    public function search(Request $request)
    {
        $client = auth()->user()->id;
        $projects = $this->projectService->getProjectsByClient($client);
        $month =  Carbon::parse($request->input('month'))->month;
        $year = Carbon::parse($request->input('month'))->year;
        foreach ($projects as $project) {
            $totalProjectHours = 0;
            foreach ($project->creators as $creator) {
                $currentMonthWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
                $creator->totalWorkingHours = $currentMonthWorkingHours;
                $totalProjectHours += $creator->totalWorkingHours;
            }
            $project->totalHours = $totalProjectHours;
        }
        $monthYear = $request->input('month');
        return view('front.client.index', compact('projects', 'monthYear'));
    }
}
