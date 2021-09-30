@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Set Curriculum</h3>
            </div>
            
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
            <tr class="">
                <th>ID</th>
                <th>School Year</th>
                 <th>Action</th>
                
                
                
            </tr>
                    </thead><tbody>
            @if(count($clums)>0)
         @foreach($clums as $clum)
             <tr>
                <td>{{$clum->id}}</td>  
                    <td>{{$clum->curriculumname}}</td>   
                    <td> <input type="hidden" name="stat" value="{{$clum->status}}">
                                                                                      
                        @if($clum->status)
                    <form method="POST" action="{{action('ClumsController@update',$clum->id)}}">	
                        @csrf		
                            <input name="_method" type="hidden" value="PATCH">
                            <input type="hidden" name="stat" value="0">
                       <input  class="btn btn-secondary" type="submit" value="Deactivate">               
               </form>  
                        @else
                        <form method="POST" action="{{action('ClumsController@update',$clum->id)}}">	
                            @csrf		
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="stat" value="1">                             
                           <input  class="btn btn-secondary" type="submit" value="Activate">                       
                   </form>
                        @endif
                              </form></td>
                 
                   
                   
                   
                        
                   
          @endforeach
                    
         @else
            <p>No data found</p>
            @endif
              
          
                
            </tr>
            </body>
        </table>
        
      </div>
 
     </div>
</div> 



@endsection
