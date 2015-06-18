@extends('template')

@section('link')

	<link rel="stylesheet" href="{{ asset('/css/home.css') }}">

@endsection

@section('content')

	<div class="home center blue-grey lighten-5">
		<p> Hello, {{ Auth::user()->name }} </p>
	</div>

	<div class="button-home">  
		<a href="{{ url('form') }}" class="waves-effect waves-light btn left"><i class="mdi-file-cloud left"></i>Form</a>	  
		<a href="{{ url('list') }}" class="waves-effect waves-light btn right"><i class="mdi-file-cloud right"></i>List</a>	
	</div>

@endsection
