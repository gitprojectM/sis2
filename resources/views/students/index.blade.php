@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Students</h3>
            </div>
            <div class="col-2">
          <a href="/students/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <table id="example" class="table  table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                   
                                    <th>Account</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count( $students)>0)
                            @foreach($students as $student)
                                 <tr>
                                        <td>{{$student->id}}</td>       
                                        <td> {{$student->lname}} {{$student->fname}} {{$student->mname}}</td> 
                                        <td>{{$student->sex}}</td> 
                                      
                                      
                                        <td><a href="{{action('UsersController@edit2',$student->id)}}" class="btn btn-secondary btn-sm ">Activate</a></td>
                                        <td>  <a href="{{action('StudentsController@show',$student->id)}}"  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a></td>
                                        <td>
                                                <div class="btn-group">
                                                        <a class="btn btn-default btn-sm" href="{{action('StudentsController@edit', $student['id'])}}">  <i class="fa fa-edit"></i></a>|
                                                        <form action="{{action('StudentsController@destroy', $student['id'])}} " method="POST">
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
                            <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                   
                                    <th>Account</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                            </tr>
                        </tfoot>
                </table>     
    </div>
</div>



    <script>
 
     </script>
@endsection
