<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $table = 'student';

	protected $fillable = ['firstname', 'lastname'];

	public function universitys()
	{
		return $this->belongsTo('App\University', 'university');
	}
}
