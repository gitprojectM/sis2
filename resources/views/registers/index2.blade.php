@extends('layouts.master')
@section('content')
<div class="card">
        <div class="card-header">
            <div class=" row">
            <div class="col-10">
          <h3 class="card-title">Seniors Students</h3>
            </div>
            <div class="col-2">
          <a href="/registers/create" class="btn btn-secondary"><i class="fa fa-plus"></i>&nbsp;add</a>
            </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
                <table id="example" class="table  table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                   <th>Section</th>
                                   <th>Track</th>
                                    <th>Account</th>
                                    <th>Profile</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @if(count( $juniors)>0)
                            @foreach($juniors as $junior)
                                 <tr>
                                        <td>{{$junior->id}}</td>       
                                        <td> {{$junior->lname}} {{$junior->fname}} {{$junior->mname}}</td> 
                                        <td>{{$junior->sex}}</td> 
                                 <td>{{$junior->name}}</td>
                                 <td>{{$junior->tname}}</td> 
                                      
                                        <td><a href="{{action('UsersController@edit2', $juniors=[$junior->id])}}" class="btn btn-secondary btn-sm ">Activate</a></td>
                                        <td>  <a href="{{action('StudentsController@show', $juniors=[$junior->id])}}"  class=" btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a></td>
                                        <td>
                                                <div class="btn-group">
                                                        <a class="btn btn-default btn-sm" href="{{action('RegisterController@edit',  $juniors=[$junior->id])}}">  <i class="fa fa-edit"></i></a>
                                                        
                                                       
                                                      </div>
                                                
                                        </form>
                                    </div>
                                    </div>
                                        </td> 
                                 
                            @endforeach
                        @else
                            <p>No Data Found</p>
                        @endif             
                    </tr></tbody>
                        <tfoot>
                            <tr>
                                    <th>LRN</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Section</th>
                                    <th>Track</th>
                                    <th>Account</th>

                                    <th>Profile</th>
                                    <th>Action</th>
                            </tr>
                        </tfoot>
                </table>     
    </div>
</div>



    <script>
 
     </script>
@endsection
