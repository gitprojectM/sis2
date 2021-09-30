@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Set Quarter</h3>
            </div>
            
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-striped">
            <tr class="">
                <th>ID</th>
                <th>Period</th>
                 <th>Action</th>
                
                
                
            </tr>
            @if(count($speriods)>0)
         @foreach($speriods as $speriod)
             <tr>
                <td>{{$speriod->id}}</td>  
                    <td>{{$speriod->speriod}}</td>   
                    <td> <input type="hidden" name="stat" value="{{$speriod->status}}">
                                                                                      
                        @if($speriod->status)
                    <form method="POST" action="{{action('SperiodsController@update',$speriod->id)}}">	
                        @csrf		
                            <input name="_method" type="hidden" value="PATCH">
                            <input type="hidden" name="stat" value="0">
                       <input  class="btn btn-secondary" type="submit" value="Deactivate">               
               </form>  
                        @else
                        <form method="POST" action="{{action('SperiodsController@update',$speriod->id)}}">	
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
        </table>
        
      </div>
 
     </div>
</div> 



@endsection
