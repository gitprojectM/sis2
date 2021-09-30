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
    
        <form method="POST"  @can('isadmin')action="{{url('grades') }} " @endcan  @can('isteacher')action="{{url('grades3') }}"@endcan>
            @csrf	
        @foreach($periods as $period)
        <input type="hidden" name="pid" value={{"$period->id"}}>
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
             @if(count($loads)>0)
        @foreach($loads as $load)
             <tr>  
                   <td>{{$load->student_id}}</td>
                    <td>{{$load->fname}} {{$load->lname}}</td>
             <td> {{$load->subject}}  <input type="hidden" name="ssid[]" value={{"$load->id"}}></td>
                    
                   
             <td><input class="form-control {{$errors->has('grade*')?'is-invalid':''}} grades" type="text" name="grade[]" id="grade">
                    @if ($errors->has('grade*'))
					<span class="invalid-feedback">
							<strong>{{$errors->first('grade*')}}</strong>
                    </span>
              
						
                    @endif
                </td>
                
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
<script type="text/javascript">
$(document).ready(function(){
    $("#grade,.grades").inputmask('Regex', { regex: "^[5-9][0-9]?$|^100$" });
});


</script>  
@endsection

  