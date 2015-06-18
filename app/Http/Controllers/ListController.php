<?php namespace App\Http\Controllers;

use App\Student;
use App\University;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

class ListController extends Controller {

	public function index()
	{
		$students = Student::all();
		$universitys = University::all();		
		return view('mix.index', compact('students', 'universitys'));
	}

	public function delete(Request $request)
	{
		if(!empty($request->input('id')) && Auth::check())
		{
			Student::find($request->id)->delete();
			return "true";
		}

		return "false";
	}
}
