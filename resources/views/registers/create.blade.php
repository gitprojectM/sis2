@extends('layouts.master')
@section('content')
<div class="card card-default"  >
	<div class="card-header bg-secondary text-white" >
		<h1 class="card-title" >Register  Student</h1>
		
		
		
	</div>
	
	<div class="card-body">



		<form method="POST" action="{{url('registers') }}">
			
			@csrf		
			
			
			
			<label>Student</label> 
			<div class="row">
				<div class="col-4">
					<label>LRN</label> 
					
					<input class="form-control {{$errors->has('studid')?'is-invalid':''}}" type="text" name="studid" id="studID">
					@if ($errors->has('studid'))
					<span class="invalid-feedback">
						<h6>{{$errors->first('studid')}}<h6>
					</span>
						
					@endif
				</div>	
				<div class="col-4">
					
					<label>Name</label>
					<div class="row">
							<div class="col-sm-6">
									<input class="form-control" type="text"  id="student" readonly>
							</div>
							<div class="col-sm-6">
									<input class="form-control" type="text"  id="Lstudent" readonly>
							</div>
					</div>
				
				
				
					
				</div>
				<div class="col-4">
					
					<label>Standing</label>
					
					<select class="custom-select " name=""  id="STATUS">
						<option value="">Select</option>
						<option value="Junior">Junior</option>
						<option value="Senior">Senior</option>
					</select>
				</div>
			</div>
			
			@foreach($schoolyears as $schoolyear)
			<input type="hidden" id="YEAR" name="year" value=" {{$schoolyear->id}}" > 
			@endforeach		 
			<div class="row">	
				<div class="col-4">
					<label>Year level</label>
					<select class="custom-select" name="ylid" id="GRADE"  onchange="return showtrack();">
						
					</select>				 
				</div>
				
				<div id="dtrack" class="col-4"  style="visibility: hidden">
					<label>Track</label>
					<select class="custom-select" name="track" id="TRACK">
						
						
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-4">
					<label>Section</label>
					<select class="custom-select  {{$errors->has('studid')?'is-invalid':''}}" name="section" id="SECTION">

						
						
					</select>
					
				
					<select style="display: none;" class="custom-select {{$errors->has('section')?'is-invalid':''}}" name="section" id="SECTION2">
						
						
					</select>
					@if ($errors->has('section'))
					<span class="invalid-feedback">
						<h6>{{$errors->first('section')}}<h6>
					</span>
						
					@endif		 
					
				</div>
				
				
				
				
				<div  id="dsem" class="col-4" style="visibility: hidden" >
					<label>Semester</label>
					<select class="custom-select" name="sem" id="SEM">
						
						@foreach($sems as $sem)
						
						@endforeach 
						
						
					</select>
				</div>
			</div>
			
			<br>
			<div class="form-gruop">
				
				
				<label>SUBJECT</label> <br>
				<input style="display: none;"  name="add" id="add" class="btn btn-defualt btn-secondary section" type="button" value="add Subject"></div>
				
				<table class="table" id="SUBJECT"   >
					
				</table>
			
			
			<br>
			
			<div>	
				<input class="btn btn-secondary" type="submit" value="submit">
			</div>
			
			
			
			
		</form>
	</div>
</div>
</div>




</div>
<script type="text/javascript">


	function showtrack() {
		var selectbox= document.getElementById('GRADE');
		var userinput=selectbox.options[selectbox.selectedIndex].value;
		
		console.log(userinput);
		if(userinput==5){
			document.getElementById('dtrack').style.visibility='visible';
			document.getElementById('dsem').style.visibility='visible';
			//document.getElementById('dadd').style.visibility='visible';
		}else if(userinput==6){
			document.getElementById('dtrack').style.visibility='visible';
			document.getElementById('dsem').style.visibility='visible';
			//document.getElementById('dadd').style.visibility='visible';
		}else{
			document.getElementById('dtrack').style.visibility='hidden';
			document.getElementById('dsem').style.visibility='hidden';
			//document.getElementById('dadd').style.visibility='hidden';
		}
		
		return false;
	}
</script>
<script type="text/javascript">
$('#studID').change(function(){
			var studID = $(this).val();
			$.ajax({
				type:"GET",
				url:"{{url('get_studentname')}}",
				data:'id='+ studID,  
				success:function(res){   
					console.log(res) ;
					$("#student").empty();
				//	$("#student").append('<option>Select</option>');
					$.each(res,function(key,value){
						$("#Lstudent").val(value)
						$("#student").val(key)
					});
					
					
				}
			});
			
		});
	//$('#student').change(function(){
	//	var stud = $(this).val(); 
		//console.log(stud)
	//	$("#studID").empty();
		//$("#studID").val(stud);
		
	//});
	
	
	
	$(document).ready(function(){
		
		var a = 1;
		$('#add').click(function(){
			a++;
			$('#SUBJECT').append('<tr id="row'+a+'"><td><select id="SUB" class="custom-select" name="tid[]"  id="search">	</select></td><td>	<input  name="remove" id="'+a+'" class="btn btn-defualt btn-danger btn_remove" type="button" value="x"></td></tr>');
		});
		$(document).on('click','.btn_remove',function(){
			var button_id=$(this).attr("id");
			$('#row'+button_id+'').remove();
		});
	}); 
	//jhs
	$('#SECTION').change(function(){
		var sectionID = $(this).val(); 
		var a ;
		$.ajax({
			type:"GET",
			url:"{{url('get_subject')}}?section_id="+ sectionID,
			
			// data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
			success:function(res){   
				console.log(res); 
				$("#SUBJECT").empty();
				//$("#SUBJECT").append('<option>Select</option>');
				$("#SUBJECT").append('<tr><th>Description</th></tr>');
				$.each(res,function(key,value){
					$("#SUBJECT").append('<tr id="row'+a+'"><td><input type="hidden" name="tid[]" value="'+key+'" />'+value+'</td></tr>');
					//$("#SUBJECT").append('<option value="'+key+'">'+value+'</option>');
				});
				
				
			}
		});
		
	});
	//shs
	$('#SECTION2').change(function(){
		var sectionID = $(this).val(); 
		
		var a ;
		$.ajax({
			type:"GET",
			url:"{{url('get__subject')}}?section_id="+ sectionID,
			
			// data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
			success:function(res){   
				console.log(res); 
				$("#SUBJECT").empty();
				//$("#SUBJECT").append('<option>Select</option>');
				$("#SUBJECT").append('<tr><th>Description</th></tr>');
				$.each(res,function(key,value){
					$("#SUBJECT").append('<tr id="row'+a+'"><td><input type="hidden" name="tid[]" value="'+key+'" />'+value+'</td><td>	<input  name="remove" id="'+a+'" class="btn btn-defualt btn-danger btn_remove" type="button" value="x"></td></tr>');
					//$("#SUBJECT").append('<option value="'+key+'">'+value+'</option>');
				});
				
				
			}
		});
		
	});
	//track
	$('#TRACK').change(function(){
		$("#SEM").empty();
		$("#SEM").append('<option value="">Select</option>');
		//  $.each(res,function(key,value){
			$("#SEM").append('<option value="{{$sem->id}}">{{$sem->sem}}</option>');
		});
		/*  $('#YEAR').click(function(){
			var syID = $(this).val();    
			
			//console.log(ylID+syID);    
			if(syID){
				$.ajax({
					type:"GET",
					url:"{{url('get_yearlevel')}}?school_year_id="+syID,
					success:function(res){   
						if(res){
							$("#GRADE").empty();
							$("#GRADE").append('<option>Select</option>');
							$.each(res,function(key,value){
								$("#GRADE").append('<option value="'+key+'">'+value+'</option>');
							});
							
						}else{
							$("#GRADE").empty();
						}
					}
				});
			}else{
				$("#GRADE").empty();
				
			}      
		});*/
		$('#GRADE').change(function(){
			
			var syID = $("#YEAR").val();
			var ylID = $(this).val();  
			
			//console.log(syID + ylID) ;
			if(ylID<=4){
				$("#SECTION2").hide();
				$("#SECTION").show()
				$.ajax({
					type:"GET",
					url:"{{url('get_section')}}",
					data:'yearlevelid='+ ylID,
					data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
					success:function(res){   
						console.log(res) ;
						
						$("#SECTION2").empty();
						$("#SECTION").empty();
						$("#SECTION").append('<option value="">Select</option>');
						$.each(res,function(key,value){
							$("#SECTION").append('<option value="'+key+'">'+value+'</option>');
						});
						
						
					}
				}); 
			}
			else if(ylID>4){
				$("#SECTION").hide();
				$("#SECTION2").show();
				$.ajax({
					type:"GET",
					url:"{{url('get_section')}}",
					data:'yearlevelid='+ ylID,
					data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
					success:function(res){   
						console.log(res) ;
						$("#SECTION").empty();
						$("#SECTION2").empty();
						
						$("#SECTION2").append('<option value="">Select</option>');
						$.each(res,function(key,value){
							$("#SECTION2").append('<option value="'+key+'">'+value+'</option>');
						});
						
						
					}
				}); 
			}
			
			
		});
		$('#GRADE').change(function(){
			var syID = $("#YEAR").val();
			var ylID = $(this).val();  
			
			//console.log(syID + ylID) ;
			
			
			$.ajax({
				type:"GET",
				url:"{{url('get_track')}}",
				data:'yearlevelid='+ ylID,
				data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
				success:function(res){   
					console.log(res) ;
					$("#TRACK").empty();
					$("#TRACK").append('<option value="">Select</option>');
					$.each(res,function(key,value){
						$("#TRACK").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});
		$('#GRADE').click(function(){
			var ylID = $(this).val();  
			$.ajax({
				type:"GET",
				url:"{{url('get___subject')}}",
				data:'yearlevelid='+ ylID,  
				success:function(res){   
					console.log(res) ;
					$("#SUB,.tid").empty();
					$("#SUB,.tid").append('<option value="">Select</option>');
					$.each(res,function(key,value){
						$("#SUB,.tid").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});
		/* $('#TRACK').change(function(){
			var syID = $("#YEAR").val();
			var ylID = $("#GRADE").val();
			var trackID = $(this).val();  
			
			//console.log(syID + ylID) ;
			
			
			$.ajax({
				type:"GET",
				url:"{{url('get_sembytrack')}}",
				data:'trackid='+ trackID,
				data:'trackid='+ trackID + '&school_year_id='+syID + '&yearlevelid='+ ylID ,    
				success:function(res){   
					console.log(res) ;
					$("#SEM").empty();
					$("#SEM").append('<option>Select</option>');
					$.each(res,function(key,value){
						$("#SEM").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});*/
		$('#SEM').change(function(){
			var syID = $("#YEAR").val();
			var ylID = $("#GRADE").val();
			var trackID = $('#TRACK').val(); 
			var semID = $(this).val();  
			
			//console.log(syID + ylID) ;
			
			
			$.ajax({
				type:"GET",
				url:"{{url('get_sectionbysem')}}",
				data:'senmid='+ semID,
				data:'semid='+ semID + '&school_year_id='+syID + '&yearlevelid='+ ylID  +'&trackid='+ trackID ,    
				success:function(res){   
					console.log(res) ;
					$("#SECTION2").empty();
					$("#SECTION2").append('<option value="">Select</option>');
					$.each(res,function(key,value){
						$("#SECTION2").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});
		
		$('#SECTION').change(function(){
			var grade = $(this).val(); 
			console.log(grade);
		});
		
		
		$('#STATUS').change(function(){
			var ylID = $(this).val();
			if(ylID=='Senior'){
				$("#add").show();
			}  
			else{
				$("#add").hide();
			}
			$.ajax({
				type:"GET",
				url:"{{url('get_year')}}",
				data:'status='+ ylID,  
				success:function(res){   
					console.log(res) ;
					$("#GRADE").empty();
					$("#GRADE").append('<option value="">Select</option>');
					$.each(res,function(key,value){
						$("#GRADE").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});
		
	</script>
	
	
	
	@endsection