@extends('layouts.master')
@section('content') 
<div class="card card-default"  >
		<div class="card-header bg-secondary	 text-white" >
			  <h1 class="card-title" >Edit Secton</h1>
		</div>	
		<div class="card-body">
<form method="POST" action="{{action('SectionsController@update',$id)}}">				
		 @csrf		
	<div>	
			<div class=" row">
					<div class="col-4" >
						<label>Year Level</label>
						<select  class="custom-select" name="yearlevelid"  onchange="return showtrack();" id="YEARLEVEL">
							@foreach($sections as $section)
							<option value="{{$section->yearlevelid}}"> {{$section->grade}}</option>
							@endforeach
							
							@foreach($yearlevels as $yearlevel)
							<option value="{{$yearlevel->id}}"> {{$yearlevel->grade}}</option>
							@endforeach	 
						</select>
					</div>
					<div  id="dsem" class="col-4" style="visibility: hidden" >
							<label>Semester</label>
							<select class="custom-select" name="semid" id="SEM">
									@foreach($sections as $section)
									<option value="{{$section->semid}}"> {{$section->sem}}</option>
									@endforeach
								 @foreach($sems as $sem)
				
								<option value="{{$sem->id}}">{{$sem->sem}}</option>
								 @endforeach	 
							</select>
					</div>
						<div  id="dtrack" class="col-4" style="visibility: hidden" >
							<label>Track</label>
							<select class="custom-select" name="trackid" id="TRACK">
									@foreach($sections as $section)
									<option value="{{$section->trackid}}"> {{$section->tname}}</option>
									@endforeach
								
								 @foreach($tracks as $track)
				
								<option value="{{$track->id}}">{{$track->tname}}</option>
								 @endforeach					 
							</select>
					</div>
				</div>		 
	<div class="row">	
	<input name="_method" type="hidden" value="PATCH">	
		<div class="col-4">
			<label >Name</label>
			<select class="custom-select" name="sectionname_id" id="sectionname_id"> 
				@foreach($sections as $section)
				 <option value="{{$section->sectionname_id}}"> {{$section->name}} 	</option>
		 @endforeach
		 	@foreach($sectionnames as $sectionname)
		 <option value="{{$sectionname->id}}"> {{$sectionname->name}} 	</option>
		@endforeach
			</select>
		</div>
		<div class="col-4">
			<label>Adviser</label>
			<select  class="custom-select" name="teacher_id">
				@foreach($sections as $section)
				<option value="{{$section->teacher_id}}">{{$section->fname}} </option>
				@endforeach
				 @foreach($teachers as $teacher)
				<option value="{{$teacher->id}}"> {{$teacher->fname}} </option>
				 @endforeach
			</select>
		</div>
	</div>
			
				 @foreach($schoolyears as $schoolyear)
				 <input type="hidden" name="school_year_id"  value="{{$schoolyear->id}}">
				 @endforeach
	</div>				
<br>	
		<div>	
		<input class="btn btn-secondary" type="submit" value="submit">
	</div>
	</div>
</form>
</div>
</div>
<script type="text/javascript">
	function showtrack() {
		var selectbox= document.getElementById('YEARLEVEL');
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

	$('#YEARLEVEL').change(function(){
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