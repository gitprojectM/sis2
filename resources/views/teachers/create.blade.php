@extends('layouts.master')
@section('content')

      <!-- SELECT2 EXAMPLE -->
        <div class="card card-default"  >
          <div class="card-header bg-secondary	 text-white" >
				<h1 class="card-title" >Add Teachers</h1>
           

           
          </div>
          <!-- /.card-header -->
          <div class="card-body"> 
				<form method="POST" action="{{url('teachers') }}" id="teacherform">
				
						@csrf		
				   <div >
					   <div class="row">
						   <div class="col-4" >
						   <label>ID</label>
						   <input class="form-control" type="text" name="id" id="id">
					   </div>
					   <div class="col-4 " >
						   <label>Position</label>
						   
						   <select  class="custom-select" name="position_id" id="position_id">
								<option value=" ">Select</option>
								@foreach($positions as $position)
			   
							  	 <option value="{{$position->id}}"> {{$position->pname}} </option>
								@endforeach
						   </select>
					   </div>
					 
					  
					   <div class="col-4 " >
							<label>Majors</label>
							
							<select  class="custom-select" name="majorid">
									<option value=" ">Select</option>
								 @foreach($majors as $major)
				
									<option value="{{$major->id}}"> {{$major->major}} </option>
								 @endforeach
							</select>
						</div>
					  
						</div>
				   <div class="row">		
					   <div class="col-4">
						   <label>First Name</label>
						   <input class="form-control" type="text" name="fname" id="fname"> 
					   </div>
					   <div class="col-4">
						   <label>Last Name</label>
						   <input class="form-control" type="text" name="lname" id="lname">
					   </div>
					   <div class="col-4"> 
						   <label>Middle Name</label>
						   <input class="form-control" type="text" name="mname" id="mname">
						   
					   </div>
				   </div>			
				   <div class="row">
					   <div class="col-4">
							<label>Gender</label>
					
							<select class="custom-select" name="sex" id="sex">
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
					   </div>
					   <div class="col-4">
						   <label>Birht Date</label>
						   <input class="form-control" type="date" name="birth_date" id="birth_date">
					   </div>
					 
				   </div>
			   
					   <br>
					   <div>	
					   <input class="btn btn-secondary" type="submit" value="Submit">
				   </div>
				   </div>
				<hr>
			   </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          
        </div>



<script type="text/javascript">

	(function() {
		document.querySelector('#teacherform').addEventListener('submit', function (e){
			e.preventDefault()
			
			axios.post(this.action, {
				'id': document.querySelector('#id').value,
				'position_id': document.querySelector('#position_id').value,
				'fname': document.querySelector('#fname').value,

				'lname': document.querySelector('#lname').value,
				'sex': document.querySelector('#sex').value,
				'birth_date': document.querySelector('#birth_date').value
			
				
			})
			.then((response) => {
				
				clearErrors()
				this.reset()
				this.insertAdjacentHTML('afterend', '<div class="alert alert-success" id="success">Teacher added successfully!</div>')
				document.getElementById('success').scrollIntoView()
			})
			.catch((error) => {
				const errors = error.response.data.errors
				const firstItem = Object.keys(errors)[0]
				const firstItemDOM = document.getElementById(firstItem)
				const firstErrorMessage = errors[firstItem][0]
				
				// scroll to the error message
				firstItemDOM.scrollIntoView()
				
				clearErrors()
				
				// show the error message
				firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)
				
				// highlight the form control with the error
				firstItemDOM.classList.add('border', 'border-danger')
			});
		});
		
		function clearErrors() {
			// remove all error messages
			const errorMessages = document.querySelectorAll('.text-danger')
			errorMessages.forEach((element) => element.textContent = '')
			
			// remove all form controls with highlighted error text box
			const formControls = document.querySelectorAll('.form-control')
			formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
		}
		
	})();
</script>




@endsection