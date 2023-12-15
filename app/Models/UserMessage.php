<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;
    protected $table = 'user_messages';

    public function message() {
        $this->belongsTo(Message::class);
    }
    public function user() {
        $this->belongsTo(User::class);
    }
}
