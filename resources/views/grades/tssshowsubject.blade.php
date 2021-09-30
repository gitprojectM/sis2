
@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Teachers Loads<h3>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">   
        <form method="POST" action="{{url('grades')}}">
            @csrf	
        @foreach($speriods as $speriod)
        <input type="hidden" name="pid" value={{"$speriod->id"}}>
        @endforeach
    <table class="table table-striped">
        <thead>
            <tr class="table-active">
                <th>LRN</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody> 
             @if(count($sloads)>0)
        @foreach($sloads as $sload)
             <tr>  
                    <td>{{$sload->student_id}}</td>
                    <td>{{$sload->fname}}</td>
                    <td> {{$sload->subject}}  <input type="hidden" name="ssid[]" value={{"$sload->id"}}></td>                    
                    <td><input class="form-control" type="text" name="grade[]"></td>               
        @endforeach
    @else
        <p>No posts found</p>
    @endif   
             </tr>
        </tbody>    
        </table>
        <input  class="btn btn-secondary btn-sm" type="submit" value="submit">  
    </form>
</div>
</div>
@endsection
