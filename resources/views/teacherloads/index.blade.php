@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class=" row">
            <div class="col-10">
                <h3 class="card-title">Class Subject </h3>
            </div>
            <div class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/teacherloads/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>               
                    <th>ID</th>
                    <th>Teachers Name</th>
                    <th>Subject Description</th>
                    <th>Section</th>
                    <th>Year Level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count( $teacherloads)>0)
                @foreach($teacherloads as $teacherload)
                <tr> 
                    <td>{{$teacherload->id}}</td>  
                    <td>{{$teacherload->fname}} {{$teacherload->lname}}</td>   
                    <td> {{$teacherload->subject}}</td>
                    <td> {{$teacherload->name}}</td> 
                    <td> {{$teacherload->grade}}</td>  
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="{{action('TeacherloadsController@edit', $teacherloads=[$teacherload->id])}}">  <i class="fa fa-edit"></i></a>|
                            <form action="{{action('TeacherloadsController@destroy', $teacherloads=[$teacherload->id])}}  " method="POST">
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
            <p>No posts found</p>
            @endif
            
            
            
        </tr>
    </tbody>
    <tfoot>
            <tr>
                    <th>ID</th>
                    <th>Teachers Name</th>
                    <th>Subject Description</th>
                    <th>Section</th>
                    <th>Year Level</th>
                    <th>Action</th>
            </tr>
        </tfoot>
</table>

</div>

</div>

@endsection
