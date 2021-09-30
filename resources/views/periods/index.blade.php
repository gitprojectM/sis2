@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Set Periods</h3>
            </div>


        <div class="card-body"> 
        <table  class="table table-striped table-bordered" style="width:100%">
                <thead>
            <tr class="">
                <th>ID</th>
                <th>Period</th>
                <th>Action</th>
                
                
                
            </tr>
        </thead>
        <tbody>
        @if(count($periods)>0)
        @foreach($periods as $period)
        <tr>
            <td>{{$period->id}}</td>  
            <td>{{$period->period}}</td>   
            <td> <input type="hidden" name="stat" value="{{$period->status}}">
                
                @if($period->status)
                <form method="POST" action="{{action('PeriodsController@update',$period->id)}}">	
                    @csrf		
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="stat" value="0">
                    <input  class="btn btn-secondary" type="submit" value="Deactivate">               
                </form>  
                @else
                <form method="POST" action="{{action('PeriodsController@update',$period->id)}}">	
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
    </tbody>
    </table>
    
</div>

</div>
</div> 
</div>

@endsection
