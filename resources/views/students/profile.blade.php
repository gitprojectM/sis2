@extends('layouts.master')
@section('content')
<section class="content">
  <div class="">
    
    <div class="row">
            <div class="col-lg-3">
                    
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                          src="/img/black-male-user-symbol.png"
                          alt="User profile picture">
                        </div>
                        
                        <h3 class="profile-username text-center"> {{$student->fname}} {{$student->mname}} {{$student->lname}} </h3>
                        
                        <!--<p class="text-muted text-center">Software Engineer</p>-->
                       
                        <ul class="list-group list-group-unbordered mb-3">
                            @foreach($studs as $stud)
                          <li class="list-group-item">
                            <b>Section:</b> <a class="float-right"> {{$stud->name}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Grade Level:</b> <a class="float-right">{{$stud->grade}}</a>
                          </li>
                          
                          <li class="list-group-item">
                            <b>Status:</b> <a class="float-right">{{$stud->status}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Adviser:</b> <a class="float-right">{{$stud->fname}} {{$stud->lname}}</a>
                          </li>
                        </ul>
                        
                        
                        <a class="btn btn-primary btn-block" href="{{action('StudentsController@edit', $student['id'])}}">  <i class="fa fa-edit"></i> Profile</a>
                        @endforeach
                        <ul class="list-group list-group-unbordered mb-3">
                            @foreach($sstuds as $sstud)
                          <li class="list-group-item">
                            <b>Section:</b> <a class="float-right"> {{$sstud->name}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Grade Level:</b> <a class="float-right">{{$sstud->grade}}</a>
                          </li>
                          
                          <li class="list-group-item">
                            <b>Status:</b> <a class="float-right">{{$sstud->status}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Adviser:</b> <a class="float-right">{{$sstud->fname}} {{$sstud->lname}}</a>
                          </li>
                        </ul>
                        
                        
                        <a class="btn btn-primary btn-block" href="{{action('StudentsController@edit', $student['id'])}}">  <i class="fa fa-edit"></i> Profile</a>
                        @endforeach
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
                
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-lg-6"> 
                        <h5>Basic Information</h5>
                        <ul class="list-group list-group-unbordered mb-3">
                          <li class="list-group-item">
                            <b>ID:</b> <a class="float-right">{{$student->id}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Gender:</b> <a class="float-right">{{$student->sex}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Birth Date:</b> <a class="float-right">{{$student->birth_date}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Age:</b> <a class="float-right">@foreach($ages as $age ) {{$age->age}} @endforeach</a>
                          </li>
                          <li class="list-group-item">
                            <b>Ethnic Group:</b> <a class="float-right">{{$student->etnic_group}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Religion:</b> <a class="float-right">{{$student->religion}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Address:</b> <a class="float-right">{{$student->street}},{{$student->barangay}},{{$student->municipality}},{{$student->province}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Mother Tongue:</b> <a class="float-right">{{$student->mothers_tongue}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>
                              Dialect:</b> <a class="float-right">{{$student->dialect}}</a>
                            </li>
                            <h5>Enrolment Profile</h5>
                            <li class="list-group-item">
                              <b>School ID No.:</b> <a class="float-right">{{$student->schoolid}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Grade Level:</b> <a class="float-right">{{$student->grade_level}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>School Name:</b> <a class="float-right">{{$student->school_name}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Name of Adviser:</b> <a class="float-right">{{$student->adviser_name}}</a>
                            </li>
                          </ul>
                        </div>
                        <div class="col-lg-6"> 
                          <h5>Family Background</h5>
                          <ul class="list-group list-group-unbordered mb-3">
                            <label for="">Father</label>
                            <li class="list-group-item">
                              <b>First Name <a class="float-right">{{$student->father_fname}}</a>
                            </li>
                            <li class="list-group-item">
                               Middle Name: <a class="float-right">{{$student->father_mname}}</a>
                            </li>
                            <li class="list-group-item">
                               Last Name: <a class="float-right">{{$student->father_lname}}</a>
                            </li>
                            <label for="">Mother</label>
                            <li class="list-group-item">
                              First Name <a class="float-right">{{$student->mother_fname}}</a>
                            </li>
                            <li class="list-group-item">
                              Middle Name <a class="float-right">{{$student->mother_mname}}</a>
                            </li>
                            <li class="list-group-item">
                              Last Name <a class="float-right">{{$student->mother_lname}}</a>
                            </li>
                            <label for="">Guardian</label>
                            <li class="list-group-item">
                               First Name <a class="float-right">{{$student->guardianfname  }}</a>
                            </li>
                            <li class="list-group-item">
                               Last Name <a class="float-right">{{$student->guardianlname}}</a>
                            </li>
                            <li class="list-group-item">
                               Middle Name <a class="float-right">{{$student->guardianmname}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Relationship to the guardian:</b> <a class="float-right">{{$student->relationship}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Contact Number:</b> <a class="float-right">{{$student->pcontact}}</a>
                            </li>
                            
                          </ul> 
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <!-- /.post -->
                  
                  <!-- Post -->
                  
                  <!-- /.post -->
                </div>
                <!-- /.tab-pane -->
                
                <!-- /.tab-pane -->
                
               
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