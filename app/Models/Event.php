<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = ['name', 'description', 'date', 'club_id'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
    protected $guarded = [];

    use HasFactory;
}
