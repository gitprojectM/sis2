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
            @foreach($teachers as $teacher)
            <h3 class="profile-username text-center">{{$teacher->fname}} {{$teacher->lname}}</h3>
           
            <!--<p class="text-muted text-center">Software Engineer</p>-->
            
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Position</b> <a class="float-right">{{$teacher->pname}}</a>
              </li>
              @endforeach
              @foreach($sections as $section)
              <li class="list-group-item">
                <b>Advisory Class</b> <a class="float-right">{{$section->name}}</a>
              </li>
              @endforeach
            
            </ul>
              <a class="btn btn-primary btn-block" href="/changepassword">Change Password</a>
          
            
           
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
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Infomation</a></li>
              <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Current Loads</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Junior Records</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings2" data-toggle="tab">Senior Records</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class=" tab-pane active" id="activity">
                <!-- Post -->
                
                <!-- /.post -->
                
                <!-- Post -->
                
                <!-- /.user-block -->
                <div class="row">
                  <div class="col-lg-6"> 
                    <h5>Basic Information</h5>
                    <ul class="list-group list-group-unbordered mb-3">
                      @foreach($teachers as $teacher)
                      <li class="list-group-item">
                        <b>ID:</b> <a class="float-right">{{$teacher->id}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Gender:</b> <a class="float-right">{{$teacher->sex}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Birth Date:</b> <a class="float-right">{{$teacher->birth_date}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Age:</b> <a class="float-right">{{$teacher->age}}</a>
                      </li>
                      @endforeach
                      
                    </ul>
                  </div>
                  
                </div>
                
                <!-- /.post -->
                
                <!-- Post -->
                
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane " id="timeline">
                <!-- The timeline -->
                
                
                <h1>Junior Current Loads</h1>
                <table class="table table-defualt">
                    <thead>
                      <tr class="">
                        
                        <th>Section</th>
                        <th>Subject</th>
                   
                        <th>Year Level</th>
                        <th>action</th>
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
                        
                          <a @can('isadmin')href="{{action('TeachersController@gradesheet', $teacherloads=[$teacherload->id])}}"@endcan @can('isteacher')href="{{action('TeachersController@tgradesheet', $teacherloads=[$teacherload->id])}}"@endcan><button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</button></a>
                     
                          @endforeach  
                          @else
                          <p>No data found</p>
                          @endif
                        </tr>
                      </tbody>    
                    </table>
                    <h1>Senior Current Loads</h1>
                <table class="table table-defualt">
                    <thead>
                      <tr class="">
                        
                        <th>Section</th>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Year Level</th>
                        <th>action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(count( $steacherloads)>0)
                      @foreach($steacherloads as $steacherload)
                      <tr> 
                        <td>{{$steacherload->name}}</td>
                        <td> {{$steacherload->subject}}</td>
                        <td> {{$steacherload->sem}}</td>
                        <td>{{$steacherload->grade}} </td>
                        <td>
                          
                          
                          
                          
                          <a @can('isadmin')href="{{action('TeachersController@gradesheet2', $steacherloads=[$steacherload->id])}}"@endcan @can('isteacher')href="{{action('TeachersController@tgradesheet2', $steacherloads=[$steacherload->id])}}"@endcan><button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</button></a>
                          
                          
                          
                          
                          
                          @endforeach  
                          @else
                          <p>No data found</p>
                          @endif
                        </tr>
                      </tbody>    
                    </table>
                
                  
                  
                  
                  
                  
                  
                </div>
                <!-- /.tab-pane -->
                
                <div class="tab-pane" id="settings">
                  <h1>Junior Records</h1>
                  
                  <table id="example" class="table table-defualt">
                      <thead>
                        <tr class="">
                          
                          <th>Section</th>
                          <th>Subject</th>
                          <th>Year Level</th>
                          <th> School Year</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count( $records)>0)
                        @foreach($records as $record)
                        <tr> 
                          <td>{{$record->name}}</td>
                          <td> {{$record->subject}}</td>
                          <td>{{$record->grade}} </td>
                          <td>{{$record->Year }} </td>
                          <td>
                            
                            
                            
                            
                            <a @can('isadmin')href="{{action('TeachersController@record', $records=[$record->id])}}"@endcan @can('isteacher')href="{{action('TeachersController@trecord', $records=[$record->id])}}"@endcan  ><button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</button></a>
                            
                            
                            
                            
                            
                            @endforeach  
                            @else
                            <p>No posts found</p>
                            @endif
                          </tr>
                        </tbody> 
                        <tfoot>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Year Level</th>
                            <th> School Year</th>
                            <th>Action</th>
                          </tfoot>   
                      </table>
                    
                    
                    
                    
                    
                  </div>

                  <div class="tab-pane" id="settings2">
                      <h1>Senior Records</h1>
                      
                      <table id="example" class="table table-defualt">
                          <thead>
                            <tr class="">
                              
                              <th>Section</th>
                              <th>Subject</th>
                              <th>Year Level</th>
                              <th>Semester</th>
                              <th> School Year</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                              @if(count( $srecords)>0)
                              @foreach($srecords as $srecord)
                              <tr> 
                                <td>{{$srecord->name}}</td>
                                <td> {{$srecord->subject}}</td>
                                <td>{{$srecord->grade}} </td>
                                <td>{{$srecord->sem}} </td>
                                <td>{{$srecord->Year }} </td>
                                <td>
                                
                                  <a @can('isadmin')href="{{action('TeachersController@record2', $srecords=[$srecord->id])}}"@endcan @can('isteacher')href="{{action('TeachersController@trecord2', $srecords=[$srecord->id])}}"@endcan><button class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</button></a>
                                
                                
                                
                                
                              
                                
                                
                                
                                
                                
                                @endforeach  
                                @else
                                <p>No posts found</p>
                                @endif
                              </tr>
                            </tbody> 
                            <tfoot>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Year Level</th>
                                <th>Semester</th>
                                <th> School Year</th>
                                <th>Action</th>
                              </tfoot>   
                          </table>
                        
                        
                        
                        
                        
                      </div>
                  <!-- /.tab-pane -->
                </div>
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