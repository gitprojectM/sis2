@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Teachers<h3>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr class="table"> 
                <th>ID</th>
                <th>Name</th>
                <th>Loads</th>
            </tr>
                        </thead>
                        <tbody>
             @if(count( $teachers)>0)
        @foreach($teachers as $teacher)
             <tr>
                    <td>{{$teacher->id}}</td>
                    <td> {{$teacher->fname}} {{$teacher->lname}}</td> 
                    <td>
                        <a href="{{action('GradesController@show', $teachers=[$teacher->id])}}"  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a>
                    </td>
        @endforeach
    @else
        <p>No posts found</p>
    @endif  
             </tr>       
                        </tbody>
                        <tfoot>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Loads</th>
                        </tfoot>
        </table>
    </div>
    
</div>


@endsection
