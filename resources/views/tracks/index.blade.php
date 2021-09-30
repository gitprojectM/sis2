@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="">
            <div class="">
                <h3 class="card-title">Track</h3>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="{{url('tracks')}}">      
            @csrf   
             <div class="row">
            <div class="col-lg-4">
                <label>Track</label>
                <input class="form-control {{$errors->has('name')?'is-invalid':''}}" type="text" name="name">
                @if ($errors->has('name'))
                <span class="invalid-feedback">
                        <h6>{{$errors->first('name')}}</h6>
                </span>
                    
                @endif 
            </div>
             </div>
        
            <br>
            <div>
                <input class="btn btn-secondary" type="submit" value="submit">    
            </div>
        </form> 
    
        <br>
        <div class="">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Track Name</th>
                        <th>Action</th>
                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @if(count($tracks)>0)
                    @foreach($tracks as $track)
                    <tr>
                        <td>{{$track->id}}</td>  
                        <td>{{$track->tname}}</td>   
                        
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default btn-sm" href="{{action('TracksController@edit', $track['id'])}}">  <i class="fa fa-edit"></i></a>
                                <form action="{{action('TracksController@destroy', $track['id'])}}" method="POST">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    |<button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash"></i></button>
                                    
                                </div>
                                
                                
                            </form>
                        </div>
                    </div>
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
                <th>Track Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    
</div>
</div>
</div>
@endsection
