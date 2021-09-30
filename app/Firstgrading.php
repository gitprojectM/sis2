<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Firstgrading extends Model
{
    protected $table = 'firstgradings';
	protected $fillable = [
		'studentsubject_id', 'grade'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
