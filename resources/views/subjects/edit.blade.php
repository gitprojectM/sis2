@extends('layouts.master')
@section('content')

<div class="">
<h1>Add Teachers</h1>
<form method="POST" action="{{action('SubjectsController@update', $id)}}">
				
		 @csrf		
	
		
	<div class="row">		
		<div class="col-4">
			<label>Description</label>
			<input class="form-control" type="text" name="desc" value="{{$subjects->description}}">
		</div>
		
	</div>			
	
		<br>
		<div class=" ">	
		<input class="btn btn-primary" type="submit" value="submit">
		</div>
	</div>
	


	

</form>



</div>



@endsection