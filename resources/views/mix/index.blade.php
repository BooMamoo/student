@extends('template')

@section('content')

	<div class="row form blue-grey lighten-5">
		<p class="text-form teal-text">Please enter your name :D</p>

		<div class="col s12 form">
			<div class="row">
				<div class="input-field col s6">
					<input name="first" type="text" class="validate first">
					<label class="active">First Name</label>
				</div>

				<div class="input-field col s6">
					<input name="last" type="text" class="validate last">
					<label class="active" for="first_name2">Last Name</label>
				</div>
			</div> 

			<label>University</label>
			<div class="select-dropdown" type="text">
				<select class="university" name="university">
					<option value="" disabled selected>University</option>

					@foreach($universitys as $university)
						<option value=" {{ $university->id }} "> {{ $university->name }} </option>
					@endforeach
				</select>
			</div>

			<button class="btn waves-effect wave-light right submit" type="submit" name="action">
				Submit
				<i class="mdi-content-send right"></i>
			</button>
		</div>
	</div> 

	<div class="show blue-grey lighten-5">
	
		<p class="text-form teal-text center"> Lists </p>

		<table class="hoverable">

			@if(!empty($students))

				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Date</th>
						<th>Time</th> 
						<th>University</th> 
						@if(!Auth::guest())
							<th class="center">Manage</th> 
						@endif       
					</tr>    
				</thead>				

				<tbody>
				@foreach($students as $student)
				
					<?php
						$date = new DateTime($student->created_at);
					?>					

					<tr class="{{ $student->id }}">
						<td> {{ $student->firstname }} </td>
						<td> {{ $student->lastname }} </td>
						<td> {{ $date->format('d-m-Y') }} </td>
						<td> {{ $date->format('H:i:s') }} </td>
						<td> {{ $student->universitys->name }} </td>

						@if(!Auth::guest())
							<td class="center"><a class="waves-effect waves-light btn red delete" id="{{ $student->id }}">Delete</a> </td>
						@endif
					</tr>
				

				@endforeach

				</tbody>     

		</table>

		@else

			<p class="no-info center">No information</p>

		@endif
	</div>

@endsection

@section('script')

	$("button.submit").on("click", function() {  
		var first_name = $("input.first").val()
		var last_name = $("input.last").val()
		var university = $("select.university").val()

		$.ajax({
			method: "POST",
			url: "{{ url('store') }}",
			data: {
				first: first_name,
				last: last_name,
				univer: university
			},
			success: function(data) {
				if(data == "false")
				{
					Materialize.toast("Error", 2000)
				}
				else
				{
					Materialize.toast("Success", 2000)

					var id = data[0] + ""
					var first = data[1] + ""
					var last = data[2] + ""

					var tmp = data[3].date.split(" ")
					var date = new Date(tmp[0])
					var time = tmp[1].substring(0, 8)
					var day = date.getDate()
					var month = date.getMonth() + 1
					var year = date.getFullYear()
					var formatDate = day + "-" + month + "-" + year

					var university = data[4] + ""
					var isAdmin = data[5] + ""
					
					
					var htmlString = "<tr class=\"" + id + "\">" +
								"<td>" + first + "</td>" +
								"<td>" + last + "</td>" +
								"<td>" + formatDate + "</td>" +
								"<td>" + time + "</td>" +
								"<td>" + university + "</td>"

					if(isAdmin)
					{
						htmlString += "<td class=\"center\"><a class=\"waves-effect waves-light btn red delete\" id=\"" + id + "\">Delete</a> </td>" +
							"</tr>"
					}
					else
					{
						htmlString += "</tr>"
					}
							
					$("tbody").append(htmlString)

					bindOnClick()

					console.log(data)
				}

				$(".first").val("")
				$(".last").val("")
			}
		})
	})

	function bindOnClick()
	{
		$('a.delete').on("click", function() {
			var tmp = this.id

			$.ajax({
				type: "POST",
				url: "{{ url('delete') }}",
				data: {
					id: this.id
				},
				success: function(data) {
					if(data == "true")
					{
						Materialize.toast("Delete", 2000)
						$("tr." + tmp).remove()
					}
					else
					{
						Materialize.toast("Error", 2000)
					}
				}
			})

		})
	}

	bindOnClick()

@endsection
