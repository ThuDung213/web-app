<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function Project() {
        return $this->hasMany(Project::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
