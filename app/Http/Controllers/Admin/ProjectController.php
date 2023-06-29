<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Service\Client\ClientServiceInterface;
use App\Service\Project\ProjectServiceInterface;
use App\Service\Time\TimeServiceInterface;
use App\Service\User\UserServiceInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use PDOException;

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
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $workingHoursByProject = [];
        foreach ($project->creators as $creator) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;

            $creator->totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
        }
        $monthYear = Carbon::now()->format('Y-m');
        return view('admin.project.show', compact('project', 'users', 'tasks', 'workingHoursByProject', 'monthYear'));
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

    public function deleteMember($project, $creator)
    {
        try {
            $creator = $this->userService->find($creator);
            $project = $this->projectService->find($project);
            $project->creators()->detach($creator);

            $html = view('admin.components.creator_item', ['creators' => $project->creators()->get()])->render();
            return response()->json([
                'message' => 'Creator removed successfully',
                'html' => $html
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Creator or project not found'
            ], 404);
        } catch (PDOException $e) {
            return response()->json([
                'message' => 'Error removing creator'
            ], 500);
        }
    }

    public function search(Request $request, $project)
    {
        $project = $this->projectService->find($project);
        $monthYear = $request->input('month');
        $month =  Carbon::parse($monthYear)->month;
        $year = Carbon::parse($monthYear)->year;
        $users = $this->userService->getUserByRole(1, $request);
        $tasks = $project->Task()->get();
        foreach ($project->creators as $creator) {
            $workingHoursByDay = $this->timeService->getTimeByDay($creator, $project);
            $workingHoursByProject[$project->id] = $workingHoursByDay;

            $creator->totalWorkingHours = $this->timeService->getTotalWorkingTime($creator, $project, $month, $year);
        }
        return view('admin.project.show', compact('project', 'users', 'tasks', 'workingHoursByProject', 'monthYear'));
        // return response()->json(['html' => $resultHtml]);
    }
}
