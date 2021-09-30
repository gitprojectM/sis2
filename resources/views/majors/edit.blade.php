 @extends('layouts.master')
@section('content')
<div class="card card-default"  >
		<div class="card-header bg-secondary	 text-white" >
			  <h1 class="card-title" >Edit</h1>
		</div>	
		<div class="card-body">
        <form method="POST" action="{{action('MajorsController@update', $id)}}">
                
         @csrf  
         <input name="_method" type="hidden" value="PATCH">    
                <div>
                    <label>Track Name</label>
                    <input class="form-control" type="text" name="name" value="{{$majors->major}}">
                </div>
                <br>
                <div>
                <input class="btn btn-secondary" type="submit" value="submit">    
                </div>
        </form>
    </div>
    
</div>
@endsection