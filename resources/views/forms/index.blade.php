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

		    <button class="btn waves-effect wave-light right submit" type="submit" name="action">
		        Submit
		        <i class="mdi-content-send right"></i>
		    </button>
		</div>
	    </div> 
	</div>

@endsection

@section('script')
           
	$("button.submit").on("click", function() {  
		var first_name = $("input.first").val()
		var last_name = $("input.last").val()

		$.ajax({
			method: "POST",
			url: "{{ url('store') }}",
			data: {
				first: first_name,
				last: last_name
			},
			success: function(data) {
				if(data == "true")
				{
					Materialize.toast("Success", 2000)
				}
				else
				{
					Materialize.toast("Error", 2000)
				}

				$(".first").val("");
				$(".last").val("");
			}
		})
	})
            
@endsection
