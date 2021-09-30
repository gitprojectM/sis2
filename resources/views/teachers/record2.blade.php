@extends('layouts.master')
@section('content')

<section class="content">
    <div class="">
        <div class="row">
            <div class="col-md-3">
                
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                            src="/img/black-male-user-symbol.png"
                            alt="User profile picture">
                        
                        
                        </div>
                    
                        @foreach ($teachers as $teacher)
                        <h3 class="profile-username text-center">{{$teacher->fname}} {{$teacher->mname}} {{$teacher->lname}}</h3> 
                        @endforeach
                 
                     
                        
                        <!--<p class="text-muted text-center">Software Engineer</p>-->
                        
                        
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                
                <!-- About Me Box -->
                
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                            @foreach ($teachers as $teacher)
                            <h3>{{$teacher->subject}}</h3> 
                            @endforeach
                    </div><!-- /.card-header -->
                    <div class="card-body">
                            <table class="table table-defualt">
                                    <thead>
                                      <tr class="">
                                        
                                        <th>Student Name</th>
                                        <th>1st Quarter</th>
                                        <th>2nd Quarter</th>
                                       
                                        <th>Final Grade</th>
                                        
                                        
                                       
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                      @if(count( $teacherloads)>0)
                                      @foreach($teacherloads as $teacherload)
                                      <tr> 
                                        <td>{{$teacherload->lname}} {{$teacherload->fname}} {{$teacherload->mname}}</td>
                                        <td>{{$teacherload->fgrade}}</td>
                              <td>{{$teacherload->sgrade}}</td>
                            
                              <td>{{($teacherload->fgrade+$teacherload->sgrade)/4}}</td>
                                          
                                          
                                          
                                          
                                        
                                          
                                          
                                          
                                          
                                          
                                          @endforeach  
                                          @else
                                          <p>No posts found</p>
                                          @endif
                                        </tr>
                                      </tbody>    
                                    </table>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@endsection