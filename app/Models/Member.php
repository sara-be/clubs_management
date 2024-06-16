<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable=['name','email','annee','filiere','phone','club_id'];
    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
