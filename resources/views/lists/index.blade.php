@extends('template')

@section('content')

	<div class="show blue-grey lighten-5">

		<table class="hoverable">

			@if(!empty($students))

				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Date</th>
						<th>Time</th> 
						@if(!Auth::guest())
							<th class="center">Manage</th> 
						@endif       
					</tr>    
				</thead>				

				@foreach($students as $student)
					
					<?php
						$date = new DateTime($student->created_at);
					?>					

					<tbody>
					
					<tr class="{{ $student->id }}">
						<td> {{ $student->firstname }} </td>
						<td> {{ $student->lastname }} </td>
						<td> {{ $date->format('d-m-Y') }} </td>
						<td> {{ $date->format('H:i:s') }} </td>

						@if(!Auth::guest())
							<td class="center"> <a class="waves-effect waves-light btn red delete"  id="{{ $student->id }}">Delete</a> </td>
						@endif
					</tr>
					

				@endforeach

			@else

				<p class="no-info center">No information</p>

			@endif

			</tbody>     

		</table>
	</div>

@endsection

@section('script')

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

@endsection
