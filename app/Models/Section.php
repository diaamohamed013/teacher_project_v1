<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name',
        'course_id'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function sectionDetails(){
        return $this->hasMany(SectionDetails::class);
    }
}
