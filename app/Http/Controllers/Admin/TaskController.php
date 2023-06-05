<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Service\Task\TaskServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
class TaskController extends Controller
{
    private $taskService;
    private $userService;

    public function __construct(TaskServiceInterface $taskService, UserServiceInterface $userService)
    {
        $this->taskService = $taskService;
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        $tasks = $this->taskService->searchAndPaginate('task_name', $request->get('search'));
        return view('admin.task.index', compact('tasks'));
    }

}
