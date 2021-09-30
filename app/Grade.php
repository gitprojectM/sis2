<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';
	protected $fillable = [
		'studentsubject_id', 'grade', 'period_id'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
