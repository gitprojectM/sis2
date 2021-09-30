@extends('layouts.master')
@section('content') 
<div class="card">
    <div class="card-header">
        <div class="">
            <div >
                <h3 class="card-title">Sections</h3>
            </div>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form method="POST" action="{{url('sectionnames')}}">
            
            @csrf  
            <div class="row">  
            <div class="col-lg-4 col-sm-12">
                <label>Section Name</label>
                <input class="form-control {{$errors->has('name')?'is-invalid':''}}" type="text" name="name">
                @if ($errors->has('name'))
                <span class="invalid-feedback">
                        <h6>{{$errors->first('name')}}</h6>
                </span>
                    
                @endif 
            </div>
            <div class="col-lg-4 col-sm-12">
                <label>Year Level</label>
              <select class="custom-select  {{$errors->has('yearlevelid')?'is-invalid':''}}" name="yearlevelid" id="">
                  <option value="1">Grade 7</option>
                  <option value="2">Grade 8</option>
                  <option value="3">Grade 9</option>
                  <option value="4">Grade 10</option>
                  <option value="5">Grade 11</option>
                  <option value="6">Grade 12</option>

              </select>
                @if ($errors->has('yearlevelid'))
                <span class="invalid-feedback">
                        <h6>{{$errors->first('yearlevelid')}}</h6>
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
                        <th>Name</th>
                        <th>Year Level</th>
                        <th>Action</th>
                        
                        
                        
                    </tr>
                </thead>
                <body>
                    @if(count($sectionnames)>0)
                    @foreach($sectionnames as $sectionname)
                    <tr>
                        <td>{{$sectionname->id}}</td>  
                   
                        <td>{{$sectionname->name}}</td>  
                        <td>{{$sectionname->grade}}</td> 
                        
                        
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-default btn-sm" href="{{action('Section_namesController@edit', $sectionnames=[$sectionname->id])}}">  <i class="fa fa-edit"></i></a>|
                                <form action="{{action('Section_namesController@destroy', $sectionnames=[$sectionname->id])}} " method="POST">
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
                <p>No data found</p>
                @endif                                    
            </tr>
        </body>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Year Level</th>
                <th>Action</th>
                
                
            </tr>
        </tfoot>
    </table>    
</div>
</div>
</div>
@endsection
