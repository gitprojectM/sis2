<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sgrade extends Model
{
    protected $table = 'sgrades';
	protected $fillable = [
		'studentsubject_id', 'grade', 'speriod_id'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
