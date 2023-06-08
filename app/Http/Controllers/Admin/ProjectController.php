<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Client\ClientServiceInterface;
use App\Service\Project\ProjectServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;
    private $clientService;
    private $userService;

    public function __construct(ProjectServiceInterface $projectService, ClientServiceInterface $clientService, UserServiceInterface $userService)
    {
        $this->projectService = $projectService;
        $this->clientService = $clientService;
        $this->userService = $userService;
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
        return view('admin.project.show', compact('project', 'users', 'tasks'));
    }

    public function edit($id)
    {
        $project = $this->projectService->find($id);
        $clients = $this->clientService->all();

        return view('admin.project.edit', compact('project', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $data = $request-> all();
        $this->projectService->update($id, $data);
        return redirect()->route('admin.project.show', ['project' => $id]);
    }

    public function destroy($id)
    {
        $this->projectService->delete($id);

        return redirect()->route(('admin.project.index'));
    }

}
