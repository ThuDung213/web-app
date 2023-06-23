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
        $creators = $this->userService->getUserByRole(1, $request);
        foreach ($creators as $creator) {
            foreach ($creator->projects as $project) {
                $currentMonthWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project);
                $project->totalWorkingHours = $currentMonthWorkingHours;
            }
        }
        return view('admin.creator.index', compact('creators'));
    }
    public function show($id)
    {
        $creator = $this->userService->find($id);
        $currentMonth = Carbon::now()->month;
        $workingHoursByProject = [];

        foreach ($creator->projects as $project) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;
            $project -> totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project);
        }

        return view('admin.creator.show', compact('creator', 'workingHoursByProject'));
    }
}
