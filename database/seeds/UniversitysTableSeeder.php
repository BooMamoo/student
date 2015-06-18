<?php

use Illuminate\Database\Seeder;
use App\University;
  
class UniversitysTableSeeder extends Seeder {
    public function run() {
	
	University::truncate();
	
	University::create( [
	    'name' => "A University"
	] );
       
      	University::create( [
	    'name' => "B University"
	] );

	University::create( [
	    'name' => "C University"
	] );

	University::create( [
	    'name' => "D University"
	] );

	University::create( [
	    'name' => "E University"
	] );
    }
}
