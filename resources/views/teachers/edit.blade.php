@extends('layouts.master')
@section('content')

 <!-- SELECT2 EXAMPLE -->
 <div class="card card-default"  >
		<div class="card-header bg-secondary	 text-white" >
			  <h1 class="card-title" >Edit</h1>
		</div>
		<!-- /.card-header -->
		<div class="card-body"> 
<form method="POST" action="{{action('TeachersController@update', $id)}}">
				
		 @csrf		 
	<div>
		<div class="row">
			<input name="_method" type="hidden" value="PATCH">
		
		<div class="col-4" >
			<label>Position</label>
			
			<select  class="custom-select" name="position_id"> 
				 @foreach($teachers as $teacher)
				<option value="{{$teacher->position_id}}"> {{$teacher->pname}} </option>
				 @endforeach
				 @foreach($positions as $position)

				<option value="{{$position->id}}"> {{$position->pname}} </option>
				 @endforeach
			</select>
		</div>
			
		<div class="col-4" >
				<label>Major</label>
				
				<select  class="custom-select" name="majorid"> 
					 @foreach($teachers as $teacher)
					<option value="{{$teacher->majorid}}"> {{$teacher->major}} </option>
					 @endforeach
					 @foreach($majors as $major)
	
					<option value="{{$major->id}}"> {{$major->major}} </option>
					 @endforeach
				</select>
			</div>
		</div>
		
	<div class="row">		
		<div class="col-4">
			 @foreach($teachers as $teacher)
			<label>First Name</label>
			<input class="form-control" type="text" name="fname" value="{{$teacher->fname}}">
		</div>
		<div class="col-4">
			<label>Last Name</label>
			<input class="form-control" type="text" name="lname" value="{{$teacher->lname}}">
		</div>
		<div class="col-4">
			<label>Middle Name</label>
			<input class="form-control" type="text" name="mname" value="{{$teacher->mname}}">
			@endforeach

			
		</div>
	</div>			
	<div class="row">
		<div class="col-4">
			<label>Gender</label>
			<input class="form-control" type="text" name="sex" value="{{$teacher->sex}}">
		</div>
		<div class="col-4">
			<label>Birht Date</label>
			 @foreach($teachers as $teacher)
			<input class="form-control" type="date" name="birth_date" value="{{$teacher->birth_date}}">
			@endforeach

        </div>
        
	</div>
	<br>
		<div class="form-group">	
		<input class="btn btn-secondary" type="submit" value="submit">
	</div>
	</div>
	


	

</form>



  <!-- /.row -->
</div>
<!-- /.card-body -->

</div>


@endsection