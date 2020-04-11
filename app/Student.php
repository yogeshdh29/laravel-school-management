<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $guarded = [];

    public function scopeAbsent($query) {
        return $query->where('Absent','A');
    }

    public function scopePresent($query) {
    	return $query->where('Present', 'P');
    }

    protected $attributes = [
        'attendace' => '0'
    ];

    public function getAttendaceAttribute($attribute){
        return [
            'P' => 'Present',
            'A' => 'Absent'
        ][$attribute];
    }
 
}
