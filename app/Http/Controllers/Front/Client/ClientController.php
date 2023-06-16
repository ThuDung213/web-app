<?php

namespace App\Http\Controllers\Front\Client;

use App\Http\Controllers\Controller;
use App\Service\Project\ProjectServiceInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $projectService;

    public function __construct(ProjectServiceInterface $projectService)
    {
        $this->projectService = $projectService;
    }
    public function index()
    {

        $client = auth()->user()->id;
        $projects = $this->projectService->getProjectsByClient($client);
        // $creators = $projects->map(function ($project) {
        //     return $project->Task()->get()->flatMap->creators;
        // })->unique('id');
        return view('front.client.index', compact('projects'));
    }
}
