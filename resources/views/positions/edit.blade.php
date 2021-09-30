 @extends('layouts.master')
@section('content')
<div class=" col-10">
    <h3>Add Teacher Positions </h3>
    <div>
        <form method="POST" action="{{action('PositionsController@update', $id)}}">
                
         @csrf  
         <input name="_method" type="hidden" value="PATCH">    
         <div class="form-group">
                <div>
                        <label>Positions Name</label>
                        <input class="form-control" type="text" name="name" value="{{$positions->pname}}">
                    </div>
    <br>
                    <div>
                    <input class="btn btn-secondary" type="submit" value="submit">    
                    </div>
         </div>
               
        </form>
    </div>
    
</div>
@endsection