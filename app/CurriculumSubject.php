<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class CurriculumSubject extends Model
{
     protected $fillable = [
        'subject_id','curriculum_id',
    ];

     public function subject()
    {
        return $this ->hasMany('App\Subject');
    }

    
     public function curriculum()
    {
        return $this ->hasMany('App\Curriculum');

    }
}
