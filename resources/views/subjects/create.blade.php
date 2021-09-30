@extends('layouts.master')
@section('content')

<div class="">
<h1>Add Subject</h1>
<input  name="add" id="add" class="btn btn-defualt btn-secondary" type="button" value="add Subject">
<form method="POST" action="{{url('subjects') }}">
				
		 @csrf		
	
<div id="SUBJECT"	>
	<div class="row">		
		
		<div class="col-4">
			<label>Description</label>
			<input class="form-control" type="text" name="desc[]">
		</div>
		
	</div>
	<br>
</div>			
	
		<br>
		<div class=" ">	
		<input class="btn btn-primary" type="submit" value="submit">
		</div>

	
	


	

</form>



</div>
<script>
	$(document).ready(function(){
	var a = 1;
	$('#add').click(function(){
		a++;
		$('#SUBJECT').append('<div id="row'+a+'" class="row"><div class="col-4"><input class="form-control" type="text" name="desc[]"></div> <div class="col-1">	<input  name="remove" id="'+a+'" class="btn btn-defualt btn-danger btn_remove" type="button" value="x"></div> </div> <div id="br'+a+'"><br></div>');
	});
	$(document).on('click','.btn_remove',function(){
		var button_id=$(this).attr("id");
		$('#row'+button_id+'').remove();
		$('#br'+button_id+'').remove();
	});
});
</script>



@endsection