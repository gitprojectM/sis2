@extends('layouts.master')
@section('content')

 <!-- SELECT2 EXAMPLE -->
 <div class="card card-default"  >
		<div class="card-header bg-secondary text-white" >
			  <h1 class="card-title">Curriculum Subject</h1>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
<div align="right">			
<input  name="add" id="add" class="btn btn-defualt btn-secondary align-items-end" type="button" value="add Subject"></div>
<form method="POST" action="{{url('curriculumsubjects') }}">
				
		 @csrf		
	
		
			 
<div id="SUBJECT">
	<div class="row">	

			<div class="col-4">
					<label>Description</label>
					<input class="form-control" type="text" name="subject[]">
				</div>
	
		<div class="col-4">

			<label>Curriculum</label>
			<select class="form-control" name="curriculum_id[]" >
				<option value="" >=====SELECT CURRICULUM=====</option>
				@foreach($curriculums as $curriculum)

				<option value="{{$curriculum->id}}">{{$curriculum->Cname}}</option>
				 @endforeach
			</select>
		</div>
		
	</div>
		<br>
	</div>

		<br>
		<div>	
		<input  class="btn btn-secondary" type="submit" value="Submit">
	</div>

	


	

</form>

  <!-- /.row -->
</div>
<!-- /.card-body -->

</div>
<script>
		$(document).ready(function(){
		var a = 1;
		$('#add').click(function(){ 
			a++;
			$('#SUBJECT').append('<div id="row'+a+'" class="row"><div class="col-4"><input class="form-control" type="text" name="subject[]"></div><div class="col-4"><select class="form-control" name="curriculum_id[]" ><option value="" >=====SELECT CURRICULUM=====</option>@foreach($curriculums as $curriculum)<option value="{{$curriculum->id}}">{{$curriculum->Cname}}</option>@endforeach</select></div><button name="remove" id="'+a+'" class="btn btn-defualt btn-secondary btn_remove" type="button"><i class="fa fa-trash"></i></button></div> <div id="br'+a+'"><br></div>');
		});
		$(document).on('click','.btn_remove',function(){
			var button_id=$(this).attr("id");
			$('#row'+button_id+'').remove();
			$('#br'+button_id+'').remove();
		});
	});
	</script>




@endsection