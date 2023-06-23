<?php

namespace App\Http\Controllers\Front\Creator;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Service\Task\TaskServiceInterface;
use App\Service\Time\TimeServiceInterface;
use Illuminate\Http\Request;

class WorkingTimeController extends Controller
{
    private $timeService;
    private $taskService;
    public function __construct(TimeServiceInterface $timeService, TaskServiceInterface $taskService)
    {
        $this->timeService = $timeService;
        $this->taskService = $taskService;
    }
    public function index($creator, $project)
    {
        $events = array();
        $workingTime = $this->timeService->getTimeByProject($creator, $project);

        foreach ($workingTime as $time) {
            $events[] = [
                'id' => $time->id,
                'title' => $time->working_content,
                'start' => $time->working_date,
                'end' => $time->working_date,
                'hours' => $time->working_hours,
            ];
        }
        $tasks = $this->taskService->getTaskByProject($creator, $project);
        return view('front.creator.time.index', ['events' => $events, 'creator' => $creator, 'project' => $project, 'tasks' => $tasks]);
    }

    public function store(Request $request, $creator, $project)
    {
        $request->validate([
            'working_hours' => 'required | numeric',
            'working_content' => 'required | string',
        ]);

        $data = $request->all();
        $data['creator_id'] = $creator;
        $data['project_id'] = $project;
        $working_time = $this->timeService->create($data);

        return response()->json([
            'id' => $working_time->id,
            'title' => $working_time->working_content,
            'start' => $working_time->working_date,
            'end' => $working_time->working_date,
            'hours' => $working_time->working_hours,
        ]);
    }

    public function update(Request $request, $id)
    {
        $working_time = $this->timeService->find($id);
        if (!$working_time) {
            return response()->json([
                'error' => 'Unable to locate the event id'
            ], 404);
        }
        $working_time->update([
            'working_date' => $request->working_date,
        ]);

        return response()->json('Event updated successfully');
    }

    public function destroy($id)
    {
        $working_time = $this->timeService->delete($id);
        return $id;
    }
}
