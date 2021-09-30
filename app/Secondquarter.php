<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secondquarter extends Model
{
    
    protected $table = 'secondquarters';
	protected $fillable = [
		'studentsubject_id', 'grade'
	];
	protected $primaryKey = 'id';
	public $timestamps = false;
}
