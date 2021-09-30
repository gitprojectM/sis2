<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fourtgrading extends Model
{
    protected $table = 'fourtgradings';
	protected $fillable = [
		'studentsubject_id', 'grade'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
