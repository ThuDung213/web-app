<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Client\ClientServiceInterface;
use App\Service\Project\ProjectServiceInterface;
use App\Service\Time\TimeServiceInterface;
use App\Service\User\UserServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;
    private $clientService;
    private $userService;
    private $timeService;

    public function __construct(ProjectServiceInterface $projectService, ClientServiceInterface $clientService, UserServiceInterface $userService, TimeServiceInterface $timeService)
    {
        $this->projectService = $projectService;
        $this->clientService = $clientService;
        $this->userService = $userService;
        $this->timeService = $timeService;
    }

    public function index(Request $request)
    {
        $projects = $this->projectService->searchAndPaginate("project_name", $request->get('search'));
        return view('admin.project.index', compact('projects'));
    }
    public function create()
    {
        $clients = $this->clientService->all();
        return view('admin.project.add', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $project = $this->projectService->create($data);

        return redirect()->route('admin.project.show', ['project' => $project->id]);
    }

    public function show($id, Request $request)
    {
        $project = $this->projectService->find($id);
        $users = $this->userService->getUserByRole(1, $request);
        $tasks = $project->Task()->get();
        $currentMonth = Carbon::now()->month;
        foreach ($project->creators as $creator) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;

            $creator->totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project);
        }
        return view('admin.project.show', compact('project', 'users', 'tasks', 'workingHoursByProject'));
    }

    public function edit($id)
    {
        $project = $this->projectService->find($id);
        $clients = $this->clientService->all();

        return view('admin.project.edit', compact('project', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $this->projectService->update($id, $data);
        return redirect()->route('admin.project.show', ['project' => $id]);
    }

    public function destroy($id)
    {
        $this->projectService->delete($id);

        return redirect()->route(('admin.project.index'));
    }

    public function addMember(Request $request, $id)
    {
        $project = $this->projectService->find($id);

        if ($request->has('creators')) {
            $creatorIds = $request->creators;
            $project->creators()->attach($creatorIds);
            $creators = $project->creators()->whereIn('id', $creatorIds)->get();
        } else {
            $creators = [];
        }
        // Render the updated list of creators
        $creatorsHtml = view('admin.components.creator_item', ['creators' => $creators])->render();
        return response()->json([
            'message' => 'Creators added successfully',
            'creatorsHtml' => $creatorsHtml
        ]);
    }
}
