<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionDetails extends Model
{
    protected $fillable = [
        'section_id',
        'section_title',
        'type',
        'details',
        'url'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }
}
