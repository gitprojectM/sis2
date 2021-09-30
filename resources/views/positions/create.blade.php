@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Add Teacher Position</h3>
            </div>
          
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
   
 
        <form method="POST" action="{{url('positions')}}">
                
         @csrf      
                <div class="col-lg-4 col-sm-12">
                    <label>Positions Name</label>
                    <input class="form-control {{$errors->has('pname')?'is-invalid':''}}" type="text" name="pname">
                    @if ($errors->has('pname'))
                    <span class="invalid-feedback">
                            <h6>{{$errors->first('pname')}}</h6>
                    </span>
                        
                    @endif 
                </div>
                <div>
                    <br>
                <input class="btn btn-secondary" type="submit" value="submit">   
              
                </div>
        </form>
 
</div>
<div class="">
<div class=" col-2">
 

</div>
<div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
            <tr class="">
                <th>ID</th>
                <th>Name</th>              
                <th>Action</th>   
            </tr>
                </thead>
                <tbody>
            @if(count($positions)>0)
        @foreach($positions as $position)
             <tr>
                <td>{{$position->id}}</td>  
                    <td>{{$position->pname}}</td>   
                 
                   
                   
                    <td>
                            <div class="btn-group">
                                    <a class="btn btn-default btn-sm" href="{{action('PositionsController@edit', $position['id'])}}">  <i class="fa fa-edit"></i></a>|
                                    <form action="{{action('PositionsController@destroy', $position['id'])}} " method="POST">
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
        </table>
        
    </div>
 
</div>
</div>



@endsection
