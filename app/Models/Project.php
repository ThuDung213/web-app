<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function Task()
    {
        return $this->hasMany(Task::class);
    }
    public function creators()
    {
        return $this->belongsToMany(User::class, 'project_creator', 'project_id', 'creator_id');
    }

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }

    public function members()
    {
        return $this->hasManyThrough(User::class, Task::class);
    }

    public function Time()
    {
        return $this->hasMany(WorkingTime::class, 'project_id');
    }
}
