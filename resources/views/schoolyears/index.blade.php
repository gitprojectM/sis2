@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        <div class=" row">
            <div class="col-10">
                <h3 class="card-title">School Year</h3>
            </div>
            
        </div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{url('schoolyears') }}">
            
            @csrf      
            <div>
                
                
                
                
                
            </select>
            <select class="custom-select"  name="sy">
                @for($a=1995,$c=1996;$a<2050,$c<2051;$c++,$a++)
                <option>  {{$a}}-{{$c}} </option>
                @endfor
            </select>                   
        </div>
        <div>
            <br>
            <input class="btn btn-secondary" type="submit" value="submit">    
        </div>
    </form>
</div>
<br>
<div class="container">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>School Year</th>
                <th>Action</th>
                
                
                
            </tr>
        </thead>
        <tbody>
            @if(count($schoolyears)>0)
            @foreach($schoolyears as $schoolyear)
            <tr>
                <td>{{$schoolyear->id}}</td>  
                <td>{{$schoolyear->Year}}</td> 
                
                
                
                <td>
                    <div class="btn-group">
                        
                        <form action="{{action('SchoolYearsController@destroy', $schoolyear['id'])}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                            
                        </div>
                        
                        
                    </form>
                    
                    
                </td> 
                
                
                
                
                @endforeach
                
                @else
                <p>No data found</p>
                @endif
                
                
                
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>School Year</th>
                <th>Action</th>
            </tr>
        </tfoot>
         </table>
        </div> 
   </div>

@endsection
