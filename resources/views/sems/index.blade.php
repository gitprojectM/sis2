@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Set Semester</h3>
            </div>


        <div class="card-body"> 
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
        <tr class="">
            <th>ID</th>
            <th>Semester</th>
            <th>Action</th>   
        </tr>
    </thead><tbody>
        @if(count($sems)>0)
        @foreach($sems as $sem)
        <tr>
            <td>{{$sem->id}}</td>  
            <td>{{$sem->sem}}</td> 
            <td>
                
                <input type="hidden" name="stat" value="{{$sem->status}}">
                
                @if($sem->status)
                
                
                <form method="POST" action="{{action('SemsController@update',$sem->id)}}">	
                    @csrf		
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="stat" value="0">
                    
                    
                    <input  class="btn btn-secondary" type="submit" value="Deactivate">
                    
                    
                </form>
                
                
                
                
                @else
                <form method="POST" action="{{action('SemsController@update',$sem->id)}}">	
                    @csrf		
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="stat" value="1">
                    
                    
                    <input  class="btn btn-secondary" type="submit" value="Activate">
                    
                    
                </form>
                @endif
            
        </td>
        
        @endforeach               
        @else
        <p>No data found</p>
        @endif
    </tr>
</tbody>
</table>

</div>

</div>
</div> 
</div>


@endsection
