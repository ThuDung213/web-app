<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Project()
    {
        return $this->belongsTo(Project::class);
    }

    public function User() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
