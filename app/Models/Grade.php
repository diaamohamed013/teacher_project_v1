<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'name',
        'symbol',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }
}
