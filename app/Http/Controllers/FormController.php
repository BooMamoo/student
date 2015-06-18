<?php namespace App\Http\Controllers;

use App\Student;
use App\University;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FormController extends Controller {

	

	public function index()
	{
		$students = Student::all();
		$universitys = University::all();		
		return view('mix.index', compact('students', 'universitys'));
	}

	public function store(Request $request)
	{
		$first_name = $request->input('first');
		$last_name = $request->input('last');
		$university = $request->input('univer');

		if($first_name != "" && $last_name != "" && $university != "")
		{
			$student = new Student;
			$student->firstname = $first_name;
			$student->lastname = $last_name;
			
			$student->university = $university;
			$student->save();

			$isAdmin = false;
			

			if(Auth::check())
			{
				$isAdmin = true;
			}
			
			return [$student->id, $student->firstname, $student->lastname, $student->created_at, $student->universitys->name, $isAdmin];
		}

		return "false";
	}

	public function insert()
	{
		$student = new Student;
		
		return $student;
	}
}
