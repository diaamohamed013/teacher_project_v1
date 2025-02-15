<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'parent_phone',
        'city',
        'grade_id',
        'user_id'
    ];

    public function grade () {
        return $this->belongsTo(Grade::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function courses(){
        return $this->belongsToMany(Course::class);
    }
}
