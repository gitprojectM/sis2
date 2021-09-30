@extends('layouts.master')
@section('content')
      <!-- SELECT2 EXAMPLE -->
        <div class="card card-default"  >
          <div class="card-header" >
				<h1 class="card-title" >Create Accounts</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body"> 
				<form method="POST" action="{{url('users') }}">				
						@csrf		
				   <div >
					   <div class="row">
						   <div class="col-4" >
						   <label>User Id</label>
						   @foreach($teachers as $teacher)
						   <input readonly class="form-control" type="text" name="userid" value="{{$teacher->id}}">
						   @endforeach
					   </div>
					   <div class="col-4 " >
                           <label>Name</label>
                           <input readonly class="form-control" type="text" name="name" value="{{$teacher->fname}} {{$teacher->lname}}">
                       </div> 
                       <div class="col-4">
                            <label>Role</label>
                           
                            <select class="form-control " name="role" id="">	
									<option value="2" >teacher </option> 
								@foreach($roles as $role)									   
							<option value="{{$role->id}}" >{{$role->name}} </option> 
							@endforeach                        
                            </select>
                        </div>	                     
					   </div>					   
				   <div class="row">	
                       
					   <div class="col-4">
                           <label>User Name</label> 
                           <input class="form-control" type="text" name="username" readonly value="{{$teacher->id}}">                        
                           
					   </div>
					   <div class="col-4">
						   <label>Password</label>
						   <input class="form-control" type="text" readonly name="password" value="@php
						   $a=rand(0,9);
						   $b=rand(0,9);
						   $c=rand(0,9);
						   $d=rand(0,9);
						   echo $a,$b,$c,$d;
						   @endphp">
                       </div>
				   </div>
					 	
				
				   </div>			   
					   <br>
					   <div>	
					   <input class="btn btn-secondary" type="submit" value="Submit">
				   </div>
				   </div>				
			   </form>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->          
        </div>
<script type="text/javascript">
</script>
@endsection