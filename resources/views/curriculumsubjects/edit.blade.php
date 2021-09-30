@extends('layouts.master')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default"  >
		<div class="card-header bg-secondary	 text-white" >
			  <h1 class="card-title">Edit</h1>
		</div>
		<!-- /.card-header -->
		<div class="card-body">
<form method="POST" action="{{action('CurriculumSubjectsController@update', $id)}}">	
		 @csrf		
		     <input name="_method" type="hidden" value="PATCH">
	<div class="row">	
<div class="col-4">
			<label>Subject</label>
		
				@foreach($curriculumsubjects as $curriculumsubject)
			
				<input class="form-control" type="text" name="sid" value="{{$curriculumsubject->subject}}">
				 @endforeach
			
		
			</div>			
	
		<div class="col-4">

			<label>Curriculum</label>
			<select class="custom-select" name="cid" >
				@foreach($curriculumsubjects as $curriculumsubject)
				<option value="{{$curriculumsubject->curriculum_id}}">{{$curriculumsubject->Cname}}</option>
				 @endforeach
				@foreach($curriculums as $curriculum)

				<option value="{{$curriculum->id}}">{{$curriculum->Cname}}</option>
				 @endforeach
			</select>
		</div>
		
	</div>

		<br>
		<div>	
		<input  class="btn btn-secondary" type="submit" value="submit">
	</div>
	


	

</form>


		</div>
</div>




@endsection