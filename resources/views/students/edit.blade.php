@extends('layouts.master')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default"  >
	<div class="card-header bg-secondary	 text-white" >
		<h1 class="card-title" >Edit</h1>
	</div>
	<!-- /.card-header -->
	<div class="card-body"> 	 
		<form method="POST" action="{{action('StudentsController@update',$id)}}">
			
			
			@csrf		
			
			<input name="_method" type="hidden" value="PATCH">
			<div class="row">
				<div class="col-4">
					<label>LRN</label>
					@foreach ($students as $student)
						
					
					<input class="form-control" type="text" name="id" value="{{$student->id}}">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>First Name</label>
					<input class="form-control" type="text" name="fname" value=" {{$student->fname}}">	
				</div>
				<div class="col-4">
					<label>Last Name</label>
					<input class="form-control" type="text" name="lname" value="{{$student->lname}}">
				</div>
				<div class="col-4">
					<label>Middle Name</label>
					<input class="form-control" type="text" name="mname" value="{{$student->mname}}">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
						<label>Gender</label>
					
						<select class="custom-select" name="sex" id="sex" >
							<option value="{{$student->sex}}">{{$student->sex}}</option>
							<option value="">Select</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
				</div>
				<div class="col-4">
					<label>Birht Date</label>
					<input class="form-control" type="date" name="birth_date" value="{{$student->birth_date}}">
				</div>
				<div class="col-4">
					<label>Status</label>
					<select name="status" id="status" class="custom-select">
						<option value="{{$student->status}}">{{$student->status}}</option>
						<option value="Regular">Regular</option>
						<option value="Transferee">Transferee</option>
						<option value="Balik - Aral">Balik - Aral</option>
						<option value="Repeater">Repeter</option>
					</select>
				</div>
			</div>
			<div class="row">
				
				<div class="col-4">
					<label>Ethnic Group</label>
					<input class="form-control" type="text" name="etnic_group" value="{{$student->etnic_group}}" >
				</div>
				<div class="col-4">
					<label>Religion</label>
					<input class="form-control" type="text" name="religion" value="{{$student->religion}}">
				</div>
			</div>
			@endforeach
			
			<div class="row">
					<div class="col-4">
							<label>Region</label>
							<select style="" class="custom-select" name="" id="region">
									<option value=" ">Region</option>
								@foreach ($provinces as $province)
							<option value="{{$province->id}}">{{$province->regDesc}}</option>
								@endforeach
								
							</select>
						</div>
					<div class="col-4">
							<label>Province</label>
							
							<select class="custom-select" name="province" id="province">
									@foreach ($students as $student)
								<option value="{{$student->province}}">{{$student->provDesc}}</option>
								@endforeach
								
							</select>
						</div>
						<div class="col-4">
					<label>Municipality</label>
					
					<select class="custom-select" name="municipality" id="municipality">
							@foreach ($students as $student)
						<option value="{{$student->municipality}}">{{$student->citymunDesc}}</option>
						@endforeach
						
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Barangay</label>
					
				
					
					<select class="custom-select" name="barangay" id="barangay">
							@foreach ($students as $student)
						<option value="{{$student->barangay}}">{{$student->brgyDesc}}</option>
						@endforeach

					</select>
				</div>
				
				
				
				<div class="col-4">
						<label>Street</label>
						@foreach ($students as $student)
						<input class="form-control" type="text" name="street" value="{{$student->street}}">
						@endforeach
					</div>
				
			</div>
			<div class="row">
				<div class="col-4">
					<label>Mother Tongue</label>
					@foreach ($students as $student)
					<input id="mothers_tongue" class="form-control" type="text" name="mothers_tongue" value="{{$student->mothers_tongue}}">
				</div>
				<div class="col-4">
					<label>Dialect</label>
					<input id="dialect" class="form-control" type="text" name="dialect" value="{{$student->dialect}}">
				</div>
				
			</div>
			<hr>	
			<h3>Enrolment Profile</h3>
			<strong>Previos Enrolment</strong>	
			<div class="row">
				<div class="col-4">
					<label>School ID No.</label>
					<input id="schoolid" class="form-control" type="text" name="schoolid" value="{{$student->schoolid}}">
				</div>
				<div class="col-4">
					<label>Grade Level</label>
					<input id="grade_level" class="form-control" type="text" name="grade_level" value="{{$student->grade_level}}">
				</div>
				<div class="col-4">
					<label>Name of School</label>
					<input id="school_name" class="form-control" type="text" name="school_name" value="{{$student->school_name}}">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Name of Adviser</label>
					<input id="adviser_name" class="form-control" type="text" name="adviser_name" value="{{$student->adviser_name}}">
				</div>
			</div>
			<hr>	
			<h3>Parents / Guardian Information</h3>
			<div class="row">
				<div class="col-4">
					<label>Father First Name</label>
					<input class="form-control" type="text" name="father_fname" value="{{$student->father_fname}}">
				</div>
				<div class="col-4">
					<label>Father Last Name</label>
					<input class="form-control" type="text" name="father_lname" value="{{$student->father_lname}}">
				</div>
				<div class="col-4">
					<label>Father Middle Name</label>
					<input class="form-control" type="text" name="father_mname" value="{{$student->father_mname}}">
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Mother Maiden First Name</label>
					<input class="form-control" type="text" name="mother_fname" value="{{$student->mother_fname}}">
				</div>
				<div class="col-4">
					<label>Mother Maiden Last Name</label>
					<input class="form-control" type="text" name="mother_lname" value="{{$student->mother_lname}}">
				</div>
				<div class="col-4">
					<label>Mother Maiden Middle Name</label>
					<input class="form-control" type="text" name="mother_mname" value="{{$student->mother_mname}}">
				</div>
			</div>
			<div class="row">
					<div class="col-4">
						<label>Guardian First Name</label>
						<input id="guardianfname" class="form-control" type="text" name="guardianfname" value="{{$student->guardianfname}}">
					</div>
					<div class="col-4">
						<label>Guardian Last Name</label>
						<input id="guardianlname" class="form-control" type="text" name="guardianlname" value="{{$student->guardianlname}}">
					</div>
					<div class="col-4">
						<label>Guardian Middle Name</label>
						<input id="guardianmname" class="form-control" type="text" name="guardianmname" value="{{$student->guardianmname}}">
					</div>
					
					
				</div>
			<div class="row">

			
				<div class="col-4">
					<label>Relationship with Gurdian</label>
					<input class="form-control" type="text" name="relationship" value=" {{$student->relationship}}">
				</div>
				<div class="col-4">
					<label>Parent Contact</label>
					<input class="form-control" type="text" name="pcontact" value=" {{$student->pcontact}}">
					@endforeach
				</div>
			</div>
			
			<br>  
			<input class="btn btn-secondary" type="submit" value="submit">
			
			
			
			
			
		</form>
		
	<script>	
		
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