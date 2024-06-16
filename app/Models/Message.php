<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
    // public function users()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }
}
