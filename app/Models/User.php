<?php

namespace App\Models;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'avatar',
        'address',
        'image',
        'role',
        'description'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["client", "creator", "admin"][$value],
        );
    }

    public function Task(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_assigned', 'creator_id', 'task_id');
    }

    public function Client()
    {
        return $this->hasOne(Client::class);
    }

    public function Time()
    {
        return $this->hasMany(WorkingTime::class);
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_creator', 'creator_id', 'project_id');
    }
}
