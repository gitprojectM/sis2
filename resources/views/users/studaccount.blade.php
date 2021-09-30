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
						   
						   <input class="form-control" type="text" name="userid" value="{{$student->id}}">
						
					   </div>
					   <div class="col-4 " >
                           <label>Name</label>
                           <input class="form-control" type="text" name="name" value="{{$student->fname}} {{$student->lname}}">
                       </div> 
                       <div class="col-4">
                            <label>Role</label>
                           
                            <select  class="custom-select" name="role" id="">	
																   
							<option value="3" >student </option> 
						               
                            </select>
                        </div>	                     
					   </div>					   
				   <div class="row">	
                       
					   <div class="col-4">
                           <label>User Name</label> 
                           <input class="form-control" type="text" readonly name="username" value="{{$student->id}}">                        
                           
					   </div>
					   <div class="col-4">
						   <label>Password</label>
                        <input class="form-control"  type="text" readonly name="password" value="@php
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