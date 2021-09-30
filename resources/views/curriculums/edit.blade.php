 @extends('layouts.master')
@section('content')

<!-- SELECT2 EXAMPLE -->
<div class="card card-default"  >
		<div class="card-header bg-secondary	 text-white" >
			  <h1 class="card-title" >Edit</h1>
		</div>
		<!-- /.card-header -->
		<div class="card-body"> 
<form method="POST" action="{{action('CurriculumsController@update', $id)}}">
				
		 @csrf		
	
		
	<div class="row">		
		<div class="col-4">
			 <input name="_method" type="hidden" value="PATCH">    
			<label>Subject Code</label>
			<input class="form-control" type="text" name="cname" value="{{$curriculums->Cname}}">
		</div>
		<div class="col-4">
			<label>Course(TVL)</label>
			<input class="form-control" type="text" name="course" value="{{$curriculums->course}}">
		</div>
		<div class="col-4">
			<label>Description</label>
			<input class="form-control" type="text" name="cdesc" value="{{$curriculums->Cdescription}}">
		</div>
		
	</div>			
	
		<br>
		<div class=" ">	
		<input class="btn btn-secondary" type="submit" value="submit">
		</div>
	</div>
	


	

</form>


 <!-- /.row -->
</div>
<!-- /.card-body -->

</div>


@endsection