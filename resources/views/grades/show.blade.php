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
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <h3>Junior</h3>
                <table id="" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr >
                
                <th>Section</th>
                <th>Subject</th>
                <th>Year Level</th>
                <th>Action</th>
            </tr>
                        </thead>
                        <tbody>
             @if(count( $teacherloads)>0)
        @foreach($teacherloads as $teacherload)
             <tr> 
                    <td>{{$teacherload->name}}</td>
                    <td> {{$teacherload->subject}}</td>
                    <td>{{$teacherload->grade}} </td>
                    <td>
                            <a @can('isadmin')href="{{action('GradesController@showsubject', $teacherloads=[$teacherload->id])}}"@endcan  @can('isteacher') href="/tgrades/{{$teacherload->id}}"@endcan  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a>

        @endforeach  
    @else
        <p>No data found</p>
    @endif
             </tr>
                        </tbody>  
                        <tfoot>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Year Level</th>
                                <th>action</th>
                            </tfoot>  
        </table>
                </div>
                <div class="col-lg-6 col-sm-12">
                        <h3>Senior</h3>
                        <table id="" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                       
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Year Level</th>
                        <th>Action</th>
                    </tr>
                                </thead>
                                <tbody>
                         @if(count( $sloads)>0)
                    @foreach($sloads as $sload)
                    
                     <tr>   <td>{{$sload->name}}</td>
                        <td> {{$sload->subject}}</td>
                        <td>{{$sload->grade}} </td>
                            <td>
                                  
        
                                <a @can('isadmin')href="{{action('GradesController@sshowsubject', $sloads=[$sload->id])}}"@endcan  @can('isteacher') href="/stgrades/{{$sload->id}}"@endcan  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a>

                                @endforeach  
                            @else
                                <p>No data found</p>
                            @endif
            
               
      
                     </tr>
                                </tbody> 
                                <tfoot>
                                        <th>Section</th>
                                        <th>Subject</th>
                                        <th>Year Level</th>
                                        <th>Action</th>
                                    </tfoot>   
                </table>
                        </div>
            </div>
    </div>
    
</div>


@endsection
