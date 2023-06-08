<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
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

    public function create(Request $request)
    {
        $users = $this->userService->getUserByRole(1, $request);
        return response()->json($users, 200);
    }

    public function store(Request $request, Project $project)
    {
            $data = $request->all();
            $task = Task::create([
                'task_name' => $data['task_name'],
                'project_id'=> $project->id,
                'description' => $data['description'],
                'status' => $data['status'],
            ]);

            if($request->has('creators')) {
                $task->creators()->attach($request->creators);
            }
            $taskHtml = view('admin.task.task_item', ['task' => $task])->render();
            return response()->json(['message' => 'Task created successfully', 'task_html' => $taskHtml]);
    }

    public function show($id)
    {

    }

}
