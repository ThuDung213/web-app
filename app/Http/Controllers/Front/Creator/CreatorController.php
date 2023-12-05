<?php

namespace App\Http\Controllers\Front\Creator;

use App\Http\Controllers\Controller;
use App\Service\Project\ProjectServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreatorController extends Controller
{
    private $projectService;
    private $userService;
    public function __construct(ProjectServiceInterface $projectService, UserServiceInterface $userService)
    {
        $this->projectService = $projectService;
        $this->userService = $userService;
    }
    public function index()
    {
        $creator = Auth::user()->id;
        $projects = $this->projectService->getRelatedProjects($creator);
        return view('front.creator.index', compact('projects','creator'));
    }
    public function chatbox()
    {
        return view('chat.index');
    }
}
