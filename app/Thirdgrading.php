<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thirdgrading extends Model
{
    
    protected $table = 'thirdgradings';
	protected $fillable = [
		'studentsubject_id', 'grade'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
