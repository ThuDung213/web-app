<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Client\ClientServiceInterface;
use App\Service\Project\ProjectServiceInterface;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $projectService;
    private $clientService;

    public function __construct(ProjectServiceInterface $projectService, ClientServiceInterface $clientService)
    {
        $this->projectService = $projectService;
        $this->clientService = $clientService;
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

    public function show($id)
    {
        $project = $this->projectService->find($id);
        return view('admin.project.show', compact('project'));
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
