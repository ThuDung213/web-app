<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingTime extends Model
{
    use HasFactory;

    protected $fillable = ['creator_id', 'project_id', 'working_hours', 'working_date', 'working_content'];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
