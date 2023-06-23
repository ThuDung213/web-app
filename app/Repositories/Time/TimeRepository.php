<?php

namespace App\Repositories\Time;

use App\Models\WorkingTime;
use App\Repositories\BaseRepositories;
use Carbon\Carbon;

class TimeRepository extends BaseRepositories implements TimeRepositoryInterface
{
    public function getModel()
    {
        return WorkingTime::class;
    }
    public function getTimeByProject($creator, $project)
    {
        $time = $this->model->where('creator_id', $creator)
            ->where('project_id', $project)
            ->get();
        return $time;
    }
    public function getTotalWorkingTime($creator, $project)
    {
        $currentMonth = Carbon::now()->month;
        $currentMonthWorkingHours = $project->Time
            ->where('creator_id', $creator->id)
            ->filter(function ($workingTime) use ($currentMonth) {
                return Carbon::parse($workingTime->working_date)->month == $currentMonth;
            })
            ->sum('working_hours');
        return $currentMonthWorkingHours;
    }
    public function getTimeByDay($creator, $project)
    {
        $currentMonth = Carbon::now()->month;
        // $workingHoursByProject = [];

        $workingHoursByDay = [];
        // $totalWorkingHours = 0;

        $workingTimes = $project->Time()
            ->where('creator_id', $creator->id)
            ->whereMonth('working_date', $currentMonth)
            ->get();

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        foreach ($startDate->daysUntil($endDate, true) as $day) {
            $formattedDate = $day->format('d');

            $workingTime = $workingTimes
                ->first(fn ($wt) => Carbon::parse($wt->working_date)->format('d') === $formattedDate);

            $workingHours = $workingTime ? $workingTime->working_hours : 0;

            $workingHoursByDay[$formattedDate] = $workingHours;
        }
        return $workingHoursByDay;
    }
}
