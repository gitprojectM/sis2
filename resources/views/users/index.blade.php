@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Accounts</h3>
            </div>
            <div class="col-2">
          <a href="/users/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add Account</a>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <table id="example" class="table table-striped">
        <thead>
            <tr class="table-active">
            
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
         </thead>
                        <tbody>
            @if(count( $users)>0)
        @foreach($users as $user)
             <tr>
                  
                    <td> {{$user->user_id}}</td>          
                    <td> {{$user->uname}}</td>            
                    <td>{{$user->name}}</td> 
                    <td>
                            <input type="hidden" name="stat" value="{{$user->active}}">
                            @if($user->name=='admin')
                            <input  class="btn btn-secondary"  type="button" value="Active">                                                          
                            @elseif($user->active)
                        <form method="POST" action="{{action('UsersController@update',$user->id)}}">	
                            @csrf		
                                <input name="_method" type="hidden" value="PATCH">
                                <input type="hidden" name="stat" value="0">
                           <input  class="btn btn-secondary" type="submit" value="Active">               
                   </form>  
                  
                            @else
                            <form method="POST" action="{{action('UsersController@update',$user->id)}}">	
                                @csrf		
                                    <input name="_method" type="hidden" value="PATCH">
                                    <input type="hidden" name="stat" value="1">                             
                               <input  class="btn btn-secondary" type="submit" value="Block">                       
                       </form>
                            @endif
                                  </form>
                    
                    </td> 
                 
                  
                    <td>
                            <div class="btn-group">
                                   
                                    <form action="{{action('UsersController@destroy', $users=[$user->id])}} " method="POST">
                                                    @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                                   
                                  </div>
                            
                    </form>
                </div>
                </div>
                    </td> 
             
        @endforeach
    @else
        <p>No Data Found</p>
    @endif             
</tr></tbody>
<tfoot>
    
        <th>User ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Status</th>
        <th>Action</th>
</tfoot>
        </table>       
    </div>
</div>
@endsection
