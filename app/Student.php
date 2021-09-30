<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table='students';
    public $PrimaryKey='id';
    protected $casts = ["id"=>"decimal"];


}


