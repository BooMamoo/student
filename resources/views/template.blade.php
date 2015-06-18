<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="students">
		<meta name="description" content="Show list of student.">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/css/materialize.min.css">
		<link rel="stylesheet" href="{{ asset('/css/template.css') }}">
		@yield('link')

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.96.1/js/materialize.min.js"></script>

		<title> Students </title>
	</head>

	<body>
		<nav>
		    <div class="nav-wrapper cyan">
			<a href="{{ url('/') }}" class="brand-logo space">Students</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down space">
				
				<li><a href="{{ url('form') }}">Form</a></li>
				<li><a href="{{ url('list') }}">List</a></li>

				@if (Auth::guest())
					<li><a href="{{ url('/auth/login') }}">Login</a></li>
					<li><a href="{{ url('/auth/register') }}">Register</a></li>
				@else
					<li><a class="dropdown-button" href="" data-activates="dropdown1"> {{ Auth::user()->name }} <i class="mdi-navigation-arrow-drop-down right"></i></a></li>
					<ul id="dropdown1" class="dropdown-content">
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
					</ul>
				@endif
			</ul>

		    </div>
		</nav>

		<div class="container content">

			@yield('content')

		</div>

		<footer class="page-footer white">	
		    <div class="footer-copyright cyan darken-3">
			<div class="space right white-text">
			    Boo Mamoo :)
			</div>
		    </div>
		</footer>

		<script>
			$(document).ready(function() {

				@yield('script')

			})
		</script>
	</body>

</html>
