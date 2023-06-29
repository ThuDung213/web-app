<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Project\ProjectServiceInterface;
use App\Service\Time\TimeServiceInterface;
use App\Service\User\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    private $userService;

    private $projectService;
    private $timeService;

    public function __construct(UserServiceInterface $userService, ProjectServiceInterface $projectService, TimeServiceInterface $timeService)
    {
        $this->userService = $userService;
        $this->projectService = $projectService;
        $this->timeService = $timeService;
    }

    public function index(Request $request)
    {
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $creators = $this->userService->getUserByRole(1, $request);
        foreach ($creators as $creator) {
            foreach ($creator->projects as $project) {
                $currentMonthWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
                $project->totalWorkingHours = $currentMonthWorkingHours;
            }
        }
        return view('admin.creator.index', compact('creators'));
    }
    public function show($id)
    {
        $creator = $this->userService->find($id);
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $monthYear = Carbon::now()->format('Y-m');
        $workingHoursByProject = [];

        foreach ($creator->projects as $project) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;
            $project -> totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
        }

        return view('admin.creator.show', compact('creator', 'workingHoursByProject', 'monthYear'));
    }

    public function search(Request $request, $creator)
    {
        $creator = $this->userService->find($creator);
        $monthYear = $request->input('month');
        $month =  Carbon::parse($monthYear)->month;
        $year = Carbon::parse($monthYear)->year;
        $workingHoursByProject = [];

        foreach ($creator->projects as $project) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;
            $project -> totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
        }

        return view('admin.creator.show', compact('creator', 'workingHoursByProject', 'monthYear'));
    }
}
