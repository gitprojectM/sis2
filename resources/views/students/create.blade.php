@extends('layouts.master')
@section('content')
<div class="card card-default"  >
	<div class="card-header bg-secondary	 text-white" >
		<h1 class="card-title" >Add Students</h1>
		
		
		
	</div>
	
	<div class="card-body">
		
		<form method="POST" action="{{url('students') }}" id="studentform">
			
			@csrf	
			<h3>Basic Profile</h3>	
			<div class="row">
				<div class="col-4" > 
					
				<input class="form-control {{$errors->has('id')?'is-invalid':''}}" type="text" name="id" value="{{old('id')}}" id="id" autofocus placeholder="LRN">
				@if ($errors->has('id'))
				<span class="invalid-feedback">
					<h6>{{$errors->first('id')}}<h6>
				</span>
					
				@endif
				</div>

				<div class="col-4">
						
						<select name="status" id="status" class="custom-select {{$errors->has('status')?'is-invalid':''}}">
								<option value=" ">Select Status</option>
							<option value="Regular">Regular</option>
							<option value="Transferee">Transferee</option>
							<option value="Balik - Aral">Balik - Aral</option>
							<option value="Repeater">Repeter</option>
						</select>
						@if ($errors->has('status'))
				<span class="invalid-feedback">
					<h6>{{$errors->first('status')}}<h6>
				</span>
					
				@endif
					</div>
			</div>
			<label>Name</label>
			<div class="row">
							
				<div class="col-4">
					
					<input id="fname" class="form-control" type="text" name="fname" placeholder="First ">
				</div>
				<div class="col-4">
			
					<input id="lname" class="form-control" type="text" name="lname" placeholder="Last ">
				</div>
				<div class="col-4">
					<input id="mname" class="form-control" type="text" name="mname" placeholder="Middle ">
					
				</div>
			</div>			
			<div class="row">
				<div class="col-4">
					<label>Gender</label>
					
					<select class="custom-select" name="sex" id="sex"	>
						<option value="">Select</option>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
				</div>
				<div class="col-4">
					<label>Birth Date</label>
					<input id="birth_date" class="form-control" type="date" name="birth_date" onchange="ageCount()">
				</div>
				<div class="col-4">
					<label>Age</label>
					<input readonly type="text" id="age" class="form-control">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Etnic Group</label>
					<input id="etnic_group" class="form-control" type="text" name="etnic_group">
				</div>
				<div class="col-4">
					<label>Religion</label>
					<input id="religion" class="form-control" type="text" name="religion">
				</div>
				
				
			</div>
			<label>Address</label>
			<div class="row">
				
					<div class="col-4">
							<label></label>
							<select style="" class="custom-select" name="" id="region">
									<option value=" ">Region</option>
								@foreach ($provinces as $province)
							<option value="{{$province->id}}">{{$province->regDesc}}</option>
								@endforeach
								
							</select>
						</div>
					<div class="col-4">
							
							<label></label>
							<select class="custom-select" name="province" id="province">
		
		
							</select>
							
							
						</div>
				
				<div class="col-4">
						<label></label>
					<select class="custom-select" name="municipality" id="municipality">


						</select>
				</div>
			</div>
				<div class="row">

				
				<div class="col-4">
					
						<label></label>
						<select class="custom-select" name="barangay" id="barangay">
	
	
							</select>
					</div>
					<div class="col-4">
							<label></label>
							<input id="street" class="form-control" type="text" name="street" placeholder="Street">
							
						</div>
		
		</div>
			<div class="row">
					
					
				<div class="col-4">
					<label>Mother Tongue</label>
					<input id="mothers_tongue" class="form-control" type="text" name="mothers_tongue">
				</div>
				<div class="col-4">
					<label>Dialect</label>
					<input id="dialect" class="form-control" type="text" name="dialect">
				</div>
				
			</div>
			<hr>	
			<h3>Enrolment Profile</h3>
			<strong>Previos Enrolment</strong>	
			<div class="row">
				<div class="col-4">
					<label>School ID No.</label>
					<input id="schoolid" class="form-control" type="text" name="schoolid">
				</div>
				<div class="col-4">
					<label>Grade Level</label>
					<input id="grade_level" class="form-control" type="text" name="grade_level">
				</div>
				<div class="col-4">
					<label>Name of School</label>
					<input id="school_name" class="form-control" type="text" name="school_name">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Name of Adviser</label>
					<input id="adviser_name" class="form-control" type="text" name="adviser_name">
				</div>
			</div>
			<hr>	
			<h3>Parents / Guardian Information</h3>
			<label>Father </label>
			<div class="row">
				<div class="col-4">
				
					<input id="father_fname" class="form-control" type="text" name="father_fname" placeholder="First Name">
				</div>
				<div class="col-4">
				
					<input id="father_lname" class="form-control" type="text" name="father_lname"  placeholder="Last Name">
				</div>
				<div class="col-4">
					
					<input id="father_mname" class="form-control" type="text" name="father_mname"  placeholder="Middle Name">
					
				</div>
			</div>
			<label>Mother</label>
			<div class="row">
				
				<div class="col-4">
				
					<input id="mother_fname" class="form-control" type="text" name="mother_fname"  placeholder="First Name">
					
				</div>
				<div class="col-4">
					
					<input id="mother_lname"  class="form-control" type="text" name="mother_lname"  placeholder="Last Name">
				</div>
				<div class="col-4">
					
					<input id="mother_mname" class="form-control" type="text" name="mother_mname"  placeholder="Middle Name">
					
				</div>
			</div>
			<label>Guardian</label>
			<div class="row">
				
				<div class="col-4">
					
					<input id="guardianfname" class="form-control" type="text" name="guardianfname"  placeholder="First Name">
				</div>
				<div class="col-4">
					
					<input id="guardianlname" class="form-control" type="text" name="guardianlname"  placeholder="Last Name">
				</div>
				<div class="col-4">
					
					<input id="guardianmname" class="form-control" type="text" name="guardianmname"  placeholder="Middle Name">
				</div>
				
				
			</div>
			<div class="row">
				<div class="col-4">
					<label>Relationship with Guardian</label>
					<input id="relationship" class="form-control" type="text" name="relationship">
				</div>
				<div class="col-4">
					<label>Parent Contact</label>
					<input id="pcontact" class="form-control" type="text" name="pcontact">
					
				</div>
				
			</div>
			
			
			
			<br>
			<input class="btn hover btn-secondary "  type="submit" value="submit">
			<hr>
			
			
			
			
			
		</form>	
	
		
		
		<!-- /.row -->
	</div>
	<!-- /.card-body -->
	
</div>
<script>
	



	/*(function(){ 
		document.querySelector('#studentform').addEventListener('submit', function (e){
			e.preventDefault()
			axios.post(this.action, {
				'id': document.querySelector('#id').value,
				'fname': document.querySelector('#fname').value
				
			})
			.then((response)=> {
				console.log('success')
			})
			.catch((error)=>{
				//const errors = error.response.data.errors 
				console.log(error.response);
			});
			
		});
		
	})();
	(function() {
		document.querySelector('#studentform').addEventListener('submit', function (e){
			e.preventDefault()
			
			axios.post(this.action, {
				'id': document.querySelector('#id').value,
				'fname': document.querySelector('#fname').value,
				'lname': document.querySelector('#lname').value,
				'sex': document.querySelector('#sex').value,
				'birth_date': document.querySelector('#birth_date').value,
				'province': document.querySelector('#province').value,
				'municipality': document.querySelector('#municipality').value
				
				
			})
			.then((response) => {
				
				clearErrors()
				this.reset()
				this.insertAdjacentHTML('afterend', '<div class="alert alert-success" id="success">student enrole successfully!</div>')
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
		
	})();*/

	
function ageCount() {
    var date1 = new Date();
    var dob = document.getElementById("birth_date").value;
    var date2 = new Date(dob);
   // var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    //Regex to validate date format (dd/mm/yyyy)       
	//if (pattern.test(dob)) {
        var y1 = date1.getFullYear();
        //getting current year            
        var y2 = date2.getFullYear();
        //getting dob year            
        var age = y1 - y2;
        //calculating age                       
        document.getElementById("age").value = age;
        document.getElementById("age").focus ();
        return true;
   // } else {
       // alert("Invalid date format. Please Input in (dd/mm/yyyy) format!");
       // return false;
   // }

}
$('#region').change(function(){
  
    var ylID = $(this).val();
  
    //console.log(syID + ylID) ;

    
        $.ajax({
           type:"GET",
           url:"{{url('get_province')}}",
         data:'regCode='+ ylID,
          
           success:function(res){   
            console.log(res) ;
                 $("#province").empty();
                $("#province").append('<option value="">Province</option>');
                $.each(res,function(key,value){
                    $("#province").append('<option value="'+key+'">'+value+'</option>');
                });
           
         
           }
        });
    
   });
   $('#province').change(function(){
  
  var ylID = $(this).val();

  //console.log(syID + ylID) ;

  
	  $.ajax({
		 type:"GET",
		 url:"{{url('get_mun')}}",
	   data:'provCode='+ ylID,
		
		 success:function(res){   
		  console.log(res) ;
			   $("#municipality").empty();
			  $("#municipality").append('<option value="">City/Municipality</option>');
			  $.each(res,function(key,value){
				  $("#municipality").append('<option value="'+key+'">'+value+'</option>');
			  });
		 
	   
		 }
	  });
  
 });
 $('#municipality').change(function(){
  
  var ylID = $(this).val();

  //console.log(syID + ylID) ;

  
	  $.ajax({
		 type:"GET",
		 url:"{{url('get_brgy')}}",
	   data:'citymunCode='+ ylID,
		
		 success:function(res){   
		  console.log(res) ;
			   $("#barangay").empty();
			  $("#barangay").append('<option value="" >Barangay</option>');
			  $.each(res,function(key,value){
				  $("#barangay").append('<option value="'+key+'">'+value+'</option>');
			  });
		 
	   
		 }
	  });
  
 });

</script>




@endsection