@extends('layouts.master')
@section('content')

      <!-- SELECT2 EXAMPLE -->
	  <div class="card card-default"  >
			<div class="card-header bg-secondary	 text-white" >
				  <h1 class="card-title">Curriculum Programs</h1>
			</div>
			<!-- /.card-header -->
			<div class="card-body">
<form method="POST" action="{{url('curriculums') }}">			
		 @csrf	
	<div class="row">
     @foreach($clums as $clum)
	<input type="hidden" name="clum" value="{{$clum->id}}">	
	@endforeach	
		<div class="col-3">
			<label>Strand Name</label>
			<input class="form-control {{$errors->has('Cname')?'is-invalid':''}}" type="text" name="Cname">
			@if ($errors->has('Cname'))
			<span class="invalid-feedback">
					<h6>{{$errors->first('Cname')}}</h6>
			</span>
				
			@endif 
		</div>
		<div class="col-3">
			<label>Course(TVL)</label>
			<input class="form-control" type="text" name="course">
			
				
	 
		</div>
		<div class="col-3">
			<label>Strand Description</label> 
			<input class="form-control {{$errors->has('Cdescription')?'is-invalid':''}}" type="text" name="Cdescription">
			@if ($errors->has('Cdescription'))
			<span class="invalid-feedback">
					<h6>{{$errors->first('Cdescription')}}</h6>
			</span>
				
			@endif 
		</div>
		<div class="col-3">
				<label>status</label> 
			
				<select  class="custom-select {{$errors->has('status')?'is-invalid':''}}" name="status" id="">
						<option value="Junior">Junior</option>
						<option value="Senior">Senior</option>

				</select>
				@if ($errors->has('status'))
				<span class="invalid-feedback">
						<h6>{{$errors->first('status')}}</h6>
				</span>
					
				@endif 
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