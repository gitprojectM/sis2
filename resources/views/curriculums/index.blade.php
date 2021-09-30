@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class=" row">
        <div class="col-10">
      <h3 class="card-title">Curriculum Programs</h3>
        </div>
        <div class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="/curriculums/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
        </div>
    </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr >
                        <th>ID</th>
                        <th>Subject Code</th>
                       <th>Course</th>
                        <th>Description</th>
                        <th>Curriculum</th>
                        <th>Action</th> 
                    </tr>
                    </thead> 
                    <tbody>
                    @if(count($curriculums)>0)
                @foreach($curriculums as $curriculum)
                     <tr class="">
                        <td>{{$curriculum->id}}</td>  
                            <td>{{$curriculum->Cname}}</td>   
                            <td>{{$curriculum->course}}</td>
                           <td>{{$curriculum->Cdescription}}</td>
                           <td>{{$curriculum->curriculumname}}</td>
                                               <td>                      
                                <div class="btn-group">
                                        <a class="btn btn-default btn-sm" href="{{action('CurriculumsController@edit',$curriculums=[$curriculum->id])}}">  <i class="fa fa-edit"></i></a>
                                        <form action="{{action('CurriculumsController@destroy', $curriculums=[$curriculum->id])}} " method="POST">
                                                        @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                        |<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                                       
                                      </div>
                            </form>             
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
                            <th>Subject Code</th>
                            <th>Course</th>
                            <th>Description</th>
                            <th>Curriculum</th>
                            <th>Action</th> 
                        </tr>
                    </tfoot>
                </table>
     
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

 
  
 

<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });
    });
  </script> 
@endsection