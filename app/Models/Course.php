<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'price',
        'sale_price',
        'image',
        'video_url',
        'grade_id'
    ];

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function students(){
        return $this->belongsToMany(Student::class);
    }
}
