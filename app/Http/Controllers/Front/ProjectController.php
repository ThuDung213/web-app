<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    private $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }
    public function create()
    {
        $data = Project::all();
        $client_data = Client::all();
        foreach ($client_data as $value) {
            echo "<option>" . $value['client_name']. "</option>";
        };
        // return view('project.add');
    }

    public function index()
    {
        return view('project.index');
    }
}
