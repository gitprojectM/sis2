<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secondgrading extends Model
{
    
    protected $table = 'secondgradings';
	protected $fillable = [
		'studentsubject_id', 'grade'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
