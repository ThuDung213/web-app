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
        $currentMonth = Carbon::now()->month;
        foreach ($projects as $project) {
            foreach ($project->creators as $creator) {
                $currentMonthWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project);
                $creator->totalWorkingHours = $currentMonthWorkingHours;
            }
        }
        return view('front.client.index', compact('projects'));
    }
}
