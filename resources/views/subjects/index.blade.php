@extends('layouts.master')
@section('content')

<a href="/subjects/create" class="btn btn-secondary">add</a>
    <div class="">
        <table class="table table-striped">
            <tr class="">
                <td>ID</td>         
                <td>Description</td>
                <td>Action</td>


                
                
                
            </tr>
            @if(count($subjects)>0)
        @foreach($subjects as $subject)
             <tr>
                <td>{{$subject->id}}</td>  
                   
                 
                   
                   <td>{{$subject->description}}</td>
                                       <td>

                        <div class="row">
                            <div class>
                        <a href="{{action('SubjectsController@edit', $subject['id'])}}"  class=" btn btn-warning">Edit</a>
                        </div>
                        &nbsp;
                        <div>
                    <form action="{{action('SubjectsController@destroy', $subject['id'])}} " method="POST">
                                    @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <input class="btn btn-danger"  type="submit" name="" value="Delete">
                    </form>
                </div>
                </div>
                    </td> 
                   
                   
                        
                   
        @endforeach
       
    @else
        <p>No posts found</p>
    @endif
            
          
                
            </tr>
        </table>
        
    </div>
 



@endsection