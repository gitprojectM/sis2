@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class=" row">
            <div class="col-10">
                <h3 class="card-title">Curriculums Subject</h3>
            </div>
            <div class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/curriculumsubjects/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
            <table id="example" class="table table-striped table-bordered datatable" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Suject</th>                 
                    <th>Name</th>
                    <th>Description </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count( $curriculumsubjects)>0)
                @foreach($curriculumsubjects as $curriculumsubject)
                <tr> 
                    <td>{{$curriculumsubject->id}}</td> 
                    <td> {{$curriculumsubject->subject}}</td>
                    <td> {{$curriculumsubject->Cname}}</td> 
                    <td> {{$curriculumsubject->Cdescription}}</td> 
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="{{action('CurriculumSubjectsController@edit', $curriculumsubjects=[$curriculumsubject->id])}}">  <i class="fa fa-edit"></i></a>
                            <form action="{{action('CurriculumSubjectsController@destroy', $curriculumsubjects=[$curriculumsubject->id])}} " method="POST">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                |<button type="submit" class="btn btn-default btn-sm "><i class="fa fa-trash"></i></button>
                                
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
                    <th>Suject</th>                 
                    <th>Name</th>
                    <th>Description </th>
                    <th>Action</th>
                    </tr>
                </tfoot>
        </table>
        
        
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


@endsection
