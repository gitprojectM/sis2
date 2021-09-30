@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class=" row">
            <div class="col-10">
                <h3 class="card-title">Teachers</h3>
            </div>
            <div class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/teachers/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Major</th>
                    <th>Name</th>
                    <th>Gender</th>
                    
                    <th>Account</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(count( $teachers)>0)
            @foreach($teachers as $teacher)
            
                <tr>
                    
                    <td>{{$teacher->id}}</td>   
                    <td>{{$teacher->pname}}</td>       
                    <td>{{$teacher->major}}</td>            
                    <td> {{$teacher->fname}} {{$teacher->lname}}</td> 
                    <td>{{$teacher->sex}}</td> 
                
                    <td><a href="{{action('UsersController@edit',$teachers=[$teacher->id])}}" class="btn btn-secondary btn-sm ">Activate</a></td>
                    <td>  <a href="{{action('TeachersController@show',$teachers=[$teacher->id])}}"  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a></td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="{{action('TeachersController@edit', $teachers=[$teacher->id])}}">  <i class="fa fa-edit"></i></a>|
                            <form action="{{action('TeachersController@destroy',$teachers=[$teacher->id])}} " method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                                
                            </div>
                        </form>             
                        
                    </div>
                </div>
            </td> 
        </tr>
   
    @endforeach
    @else
    <p>No posts found</p>
    @endif
</tbody> 
<tfoot>
        <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Major</th>
                <th>Name</th>
                <th>Gender</th>
             
                <th>Account</th>
                <th>Profile</th>
                <th>Action</th>
        </tr>
    </tfoot>   
    
</table>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->


@endsection
