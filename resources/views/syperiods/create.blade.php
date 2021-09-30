@extends('layouts.master')
@section('content')

<div class=""> 
<h1>Add School Year Period</h1>
<form method="POST" action="{{url('syperiods') }}">
				
		 @csrf		
	
		
			

	<div class="row">	

<div class="col-4">
			<label>School Year</label>
			<select  id="subjectid"  class="form-control" name="syid"  >
				<option value="" >=====SELECT SCHOOL YEAR=====</option>
				@foreach($schoolyears as $schoolyear)
				<option value="{{$schoolyear->id}}">{{$schoolyear->Year}}</option>
				 @endforeach 
			</select>
			</div>			
	
		<div class="col-4">

			<label>Semester</label>
			<select class="form-control" name="semid" >
				<option value="" >=====SELECT SEMESTER=====</option>
				@foreach($sems as $sem)

				<option value="{{$sem->id}}">{{$sem->sem}}</option>
				 @endforeach
			</select>
        </div>
        <div class="col-4">

			<label>Status</label>
			<select class="form-control" name="stat" >
				<option value="" >=====SELECT STATUS=====</option>
                <option value="1">Active</option>
                <option value="0">Not Active</option>
				
			</select>
		</div>
		
	</div>

		<br>
		<div>	
		<input  class="btn btn-primary" type="submit" value="submit">
	</div>
	


	

</form>



</div>




@endsection