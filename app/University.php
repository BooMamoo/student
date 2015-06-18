<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model {

	protected $table = 'universitys';

	public function students()
	{
		return $this->hasMany('App\Student');
	}

}
