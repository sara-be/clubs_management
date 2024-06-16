<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'responsable_id',
        'photo',
    ];

    public function responsable()
    {
        return $this->belongsTo(User::class, 'responsable_id');
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }
    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
