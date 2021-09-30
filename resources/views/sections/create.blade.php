@extends('layouts.master')
@section('content')

<div class="card card-default"  >
		<div class="card-header bg-secondary text-white" >
			  <h1 class="card-title" >Add Section</h1>
		 
		</div>
	
		<div class="card-body">
<form method="POST" action="{{url('sections') }}" id="sectionform" >
				
		 @csrf		
	<div>
			<div class="row">
					<div class="col-4">
							<label>Year Level</label>
							<select class="custom-select {{$errors->has('yearlevelid')?'is-invalid':''}}" name="yearlevelid" onchange="return showtrack();" id="yearlevelid">
								<option value="">===select===</option>
								@foreach($yearlevels as $yearlevel)
								<option value="{{$yearlevel->id}}"> {{$yearlevel->grade}}</option>
								@endforeach
								
							</select>
							@if ($errors->has('yearlevelid'))
							<span class="invalid-feedback">
									<h6>{{$errors->first('yearlevelid')}}</h6>
							</span>
								
							@endif
						</div>
				<div  id="dsem" class="col-4" style="visibility: hidden" >
					<label>Semester</label>
					<select class="custom-select" name="semid" id="semid">
					
						<option value="" >======Seclect Semester=======</option>
						 
						 @foreach($sems as $sem)
		
						<option value="{{$sem->id}}">{{$sem->sem}}</option>
						 @endforeach
						 
					</select>
			</div>
				<div  id="dtrack" class="col-4" style="visibility: hidden" >
					<label>Track</label>
					<select class="custom-select" name="trackid" id="trackid">
						<option  value="">select track</option>
						
						
						 @foreach($tracks as $track)
		
						<option value="{{$track->id}}">{{$track->tname}}</option>
						 @endforeach
						 
					</select>
			</div>
			
			</div> 
	<div class="row">		
		<div class="col-4">
			<label>Name</label>
			<select class="custom-select {{$errors->has('sectionname_id')?'is-invalid':''}}" name="sectionname_id" id="sectionname_id">
			
				
			</select>
			@if ($errors->has('sectionname_id'))
					<span class="invalid-feedback">
							<h6>{{$errors->first('sectionname_id')}}</h6>
					</span>
						
					@endif
		</div>
		<div class="col-4">
			<label>Adviser</label> 
			<select class="custom-select {{$errors->has('teacher_id')?'is-invalid':''}}" name="teacher_id" id="teacher_id">
				<option value="">===select===</option>
				 @foreach($teachers as $teacher)

				<option value="{{$teacher->id}}"> {{$teacher->fname}} </option>
				 @endforeach
			</select>	@if ($errors->has('teacher_id'))
					<span class="invalid-feedback">
							<h6>{{$errors->first('teacher_id')}}</h6>
					</span>
						
					@endif
		
			
		</div>
		
	</div>
			
				 @foreach($schoolyears as $schoolyear)
				 <input type="hidden" name="school_year_id" value="{{$schoolyear->id}}" id="school_year_id"/> 
   				@endforeach
				
			
			
			 
				
	
<br>
		
		<div>	
		<input class="btn btn-secondary" type="submit" value="submit">
	</div>
	</div>
	


	

</form>


 <!-- /.row -->
</div>
<!-- /.card-body -->

</div>

<script type="text/javascript">
	function showtrack() {
		var selectbox= document.getElementById('yearlevelid');
		var userinput=selectbox.options[selectbox.selectedIndex].value;
		console.log(userinput);
		if(userinput==5){
			document.getElementById('dtrack').style.visibility='visible';
			document.getElementById('dsem').style.visibility='visible';
		//	document.getElementById('dsy').style.visibility='hidden';

		}else if(userinput==6){
			document.getElementById('dtrack').style.visibility='visible';
				document.getElementById('dsem').style.visibility='visible';
			//	document.getElementById('dsy').style.visibility='hidden';


		}else{
			document.getElementById('dtrack').style.visibility='hidden';
		document.getElementById('dsem').style.visibility='hidden';
		//	document.getElementById('dsy').style.visibility='visible';
		}

		return false;


	}

	$('#yearlevelid').change(function(){
			var ylID = $(this).val();  
			$.ajax({
				type:"GET",
				url:"{{url('get_sections')}}",
				data:'yearlevelid='+ ylID,  
				success:function(res){   
					console.log(res) ;
					$("#sectionname_id").empty();
					$("#sectionname_id").append('<option value="">Select</option>');
					$.each(res,function(key,value){
						$("#sectionname_id").append('<option value="'+key+'">'+value+'</option>');
					});
					
					
				}
			});
			
		});

</script>



@endsection