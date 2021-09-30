@extends('layouts.master')
@section('content') 
<div class="card">
    <div class="card-header">
        <div class=" row">
            <div class="col-10">
                <h3 class="card-title">Sections</h3>
            </div>
            <div class="col-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/sections/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
    </div>
    <!-- /.card-header --> 
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year Level</th>
                    
                    <th>Adviser</th>
                    <th>Track</th>
                    <th>Sem</th>
                    <th>School Year</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    
                </tr>
                @if(count( $sections)>0)
                @foreach($sections as $section)
                <tr>
                    <td>{{$section->id}}</td>  
                    <td>{{$section->name}}</td>   
                    <td> {{$section->grade}}</td>
                    <td> {{$section->fname}}</td> 
                    <td>@if($section->tname=='') N/A @else {{$section->tname}}  @endif </td>
                   
                    <td>@if($section->sem=='') N/A @else {{$section->sem}}  @endif </td>
                    <td> {{$section->Year}}</td> 
                    
                    
                    
                    
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm" href="{{action('SectionsController@edit', $sections=[$section->id])}}">  <i class="fa fa-edit"></i></a>|
                            <form action="{{action('SectionsController@destroy', $sections=[$section->id])}} " method="POST">
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
            <th>Name</th>
            <th>Year Level</th>
            
            <th>Adviser</th>
            <th>Track</th>
            <th>Sem</th>
            <th>School Year</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>


</div>

</div>

@endsection
