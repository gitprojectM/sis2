@extends('layouts.master')
@section('content')
<!--<div class="row">
  
  <div class="col-lg-3 col-sm-12">
  </div>
  <div class="col-lg-9 col-sm-12">
    
    
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Assesment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Grades</a>
      </li>
    </ul>
    
    Tab panes 
    <div class="tab-content">
      <div class="tab-pane container active" id="home">...</div>
      <div class="tab-pane container fade" id="menu1">...</div>
      <div class="tab-pane container fade" id="menu2">...</div>
    </div>
  </div>
</div>-->
<section class="content">
  <div class="">
    
    <div class="row">
      
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Infomation</a></li>
              <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Assesment</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Grades</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings2" data-toggle="tab">Records</a></li>
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
                  <div class="col-lg-3">
                    
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                      <div class="card-body box-profile">
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle"
                          src="/img/black-male-user-symbol.png"
                          alt="User profile picture">
                        </div>
                        @foreach ($students as $student)
                            
                       
                        <h3 class="profile-username text-center"> {{$student->fname}} {{$student->mname}} {{$student->lname}} </h3>
                        @endforeach
                        
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
                        
                        
                        <a class="btn btn-primary btn-block" href="{{action('StudentsController@edit',$student=[$student->id])}}">  <i class="fa fa-edit"></i> Profile</a>
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
                  <div class="col-lg-9">
                    <div class="row">
                      <div class="col-lg-6"> 
                        <h5>Basic Information</h5>
                        <ul class="list-group list-group-unbordered mb-3">
                            @foreach ($students as $student)
                          <li class="list-group-item">
                            <b>ID:</b> <a class="float-right">{{$student->id}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Gender:</b> <a class="float-right">{{$student->sex}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Birth:</b> <a class="float-right">{{$student->birth_date}}</a>
                            @endforeach
                          </li>
                          <li class="list-group-item">
                            <b>Age:</b> <a class="float-right">@foreach($ages as $age ) {{$age->age}} @endforeach</a>
                          </li>
                          <li class="list-group-item">
                              @foreach ($students as $student)
                            <b>Ethnic Group:</b> <a class="float-right">{{$student->etnic_group}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Religion:</b> <a class="float-right">{{$student->religion}}</a>
                          </li>
                          <li class="list-group-item">
                            <b>Address:</b> <a class="float-right">{{$student->street}},{{$student->brgyDesc}},{{$student->citymunDesc}},{{$student->provDesc}}</a>
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
                              First Name: <a class="float-right">{{$student->father_fname}}</a>
                            </li>
                            <li class="list-group-item">
                              Middle Name:: <a class="float-right">{{$student->father_mname}}</a>
                            </li>
                            <li class="list-group-item">
                              Last Name:: <a class="float-right">{{$student->father_lname}}</a>
                            </li>
                            <label for="">Mother</label>
                            <li class="list-group-item">
                              First Name: <a class="float-right">{{$student->mother_fname}}</a>
                            </li>
                            <li class="list-group-item">
                              Middle Name: <a class="float-right">{{$student->mother_mname}}</a>
                            </li>
                            <li class="list-group-item">
                              Last Name: <a class="float-right">{{$student->mother_lname}}</a>
                            </li>
                            <label for="">Guardian</label>
                            <li class="list-group-item">
                              First Name: <a class="float-right">{{$student->guardianfname  }}</a>
                            </li>
                            <li class="list-group-item">
                              Last Name: <a class="float-right">{{$student->guardianlname}}</a>
                            </li>
                            <li class="list-group-item">
                              Middle Name: <a class="float-right">{{$student->guardianmname}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Relationship to the guardian:</b> <a class="float-right">{{$student->relationship}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Contact Number:</b> <a class="float-right">{{$student->pcontact}}</a>
                              @endforeach
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
                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  
                  <div class="row"> 
                    <div class="col-lg-7 col-sm-12">
                      <ul class="list-group list-group-unbordered mb-3">
                        <h5>Enrolled Subject</h5>
                        @foreach($ases as $ase)
                        <li class="list-group-item">                        
                          <a class="">{{$ase->subject}}</a>
                        </li>
                        @endforeach
                        @foreach($sases as $sase)
                        <li class="list-group-item">                        
                          <a class="">{{$sase->subject}}</a>
                        </li>
                        
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-lg-2 col-sm-12">
                      
                      <ul class="list-group list-group-unbordered mb-3">
                        <h5>Section</h5>
                        @foreach($ases as $ase)
                        <li class="list-group-item">                        
                          <a class="">{{$ase->name}}</a>
                        </li>
                        
                        @endforeach
                        @foreach($sases as $sase)
                        <li class="list-group-item">                        
                          <a class="">{{$sase->name}}</a>
                        </li>
                        
                        @endforeach
                      </ul>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                      
                      <ul class="list-group list-group-unbordered mb-3">
                        <h5>Teacher</h5>
                        @foreach($ases as $ase)
                        <li class="list-group-item">                        
                          <a class="">{{$ase->fname}} {{$ase->lname}} </a>
                        </li>
                        
                        @endforeach
                        @foreach($sases as $sase)
                        <li class="list-group-item">                        
                          <a class="">{{$sase->fname}} {{$sase->lname}} </a>
                        </li>
                        
                        @endforeach

                      </ul>
                    </div>
                  </div>
                  
                  
                  
                  
                  <!-- <table id="" class="table  table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Teacher</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($ases as $ase)
                      <tr>
                        <td>{{$ase->subject}}</td>       
                        <td> {{$ase->name}}</td> 
                        <td>{{$ase->fname}}</td> 
                        
                        
                        
                        
                        
                        
                        
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Subject</th>
                        <th>Section</th>
                        <th>Teacher</th>
                        
                        
                      </tr>
                    </tfoot>
                  </table>-->   
                  
                  
                  
                  
                  
                  
                  
                </div>
                <!-- /.tab-pane -->
                
                <div class="tab-pane" id="settings">
             
                  
                      
                 
                     @if (count($fgrades)>0  )
                     <table id="" class="table   table-defualt" >
                        <thead>
                          <tr>
                            <th>Subject</th>
                            <th>1st Grading</th>
                            <th>2nd Grading</th>
                            <th>3rd Grading</th>
                            <th>4rt Grading</th>
                            <th>Final Grade</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                          @foreach($fgrades as $fgrade)
                          <tr>
                          <td>{{$fgrade->subject}}</td>
                          <td>{{$fgrade->fgrade}}</td>
                          <td>{{$fgrade->sgrade}}</td>
                          <td>{{$fgrade->tgrade}}</td>
                          <td>{{$fgrade->fortgrade}}</td>
                          <td>{{($fgrade->fgrade+$fgrade->sgrade+$fgrade->tgrade+$fgrade->fortgrade)/4}}</td>
                        </tr>
    
                            @endforeach       
                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Subject</th>
                            <th>1st Grading</th>
                            <th>2nd Grading</th>
                            <th>3rd Grading</th>
                            <th>4rt Grading</th>
                            <th>Final Grade</th>
                            
                          </tr>
                        </tfoot>
                      </table>
                     @else
                     @endif 
                     @if (count($sfgrades)>0 )
                         
                     
                     <table id="" class="table   table-defualt" >
                        <thead>
                          <tr>
                            <th>Subject</th>
                            <th>1st Quarter</th>
                            <th>2nd Quarter</th>
                           
                            <th>Final Grade</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sfgrades as $sfgrade)
                            <tr>
                            <td>{{$sfgrade->subject}}</td>
                            <td>{{$sfgrade->fgrade}}</td>
                            <td>{{$sfgrade->sgrade}}</td>
                            
                            <td>{{($sfgrade->fgrade+$sfgrade->sgrade)/2}}</td>
                          </tr>
      
                              @endforeach  
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Subject</th>
                            <th>1st Quarter</th>
                            <th>2nd Quarter</th>
                           
                            <th>Final Grade</th>
                            
                          </tr>
                        </tfoot>
                      </table>
                      @else
                         
                     @endif
                     
                
                  
                 
                
                  
            
                <!-- /.tab-pane -->
                
              </div>
              <div class="tab-pane" id="settings2">
                @if (count($GradeSevengrades)>0)
                <h3>Grade 7</h3>
                <table id="" class="table   table-defualt" >
                    <thead>
                      <tr>
                        <th>Subject</th>
                        <th>1st Grading</th>
                        <th>2nd Grading</th>
                        <th>3rd Grading</th>
                        <th>4rt Grading</th>
                        <th>Final Grade</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                     
                      @foreach($GradeSevengrades as $GradeSevengrade)
                      <tr>
                      <td>{{$GradeSevengrade->subject}}</td>
                      <td>{{$GradeSevengrade->fgrade}}</td>
                      <td>{{$GradeSevengrade->sgrade}}</td>
                      <td>{{$GradeSevengrade->tgrade}}</td>
                      <td>{{$GradeSevengrade->fortgrade}}</td>
                      <td>{{($GradeSevengrade->fgrade+$GradeSevengrade->sgrade+$GradeSevengrade->tgrade+$GradeSevengrade->fortgrade)/4}}</td>

                    </tr>

                        @endforeach       
                    
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Subject</th>
                        <th>1st Grading</th>
                        <th>2nd Grading</th>
                        <th>3rd Grading</th>
                        <th>4rt Grading</th>
                        <th>Final Grade</th>
                        
                      </tr>
                    </tfoot>
                  </table>
                @else
                    

                @endif
                  @if (count($GradeEightgrades)>0)
                  <h3>Grade 8</h3>
                  <table id="" class="table   table-defualt" >
                      <thead>
                        <tr>
                          <th>Subject</th>
                          <th>1st Grading</th>
                          <th>2nd Grading</th>
                          <th>3rd Grading</th>
                          <th>4rt Grading</th>
                          <th>Final Grade</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                       
                        @foreach($GradeEightgrades as $GradeEightgrade)
                        <tr>
                        <td>{{$GradeEightgrade->subject}}</td>
                        <td>{{$GradeEightgrade->fgrade}}</td>
                        <td>{{$GradeEightgrade->sgrade}}</td>
                        <td>{{$GradeEightgrade->tgrade}}</td>
                        <td>{{$GradeEightgrade->fortgrade}}</td>
                        <td>{{($GradeEightgrade->fgrade+$GradeEightgrade->sgrade+$GradeEightgrade->tgrade+$GradeEightgrade->fortgrade)/4}}</td>
  
                      </tr>
                          @endforeach       
                         
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subject</th>
                          <th>1st Grading</th>
                          <th>2nd Grading</th>
                          <th>3rd Grading</th>
                          <th>4rt Grading</th>
                          <th>Final Grade</th>
                          
                        </tr>
                      </tfoot>
                    </table>   
                  @else
                      
                  @endif
                   @if (count($GradeEightgrades)>0)
                       
                   @else
                       
                   @endif
                      <h3>Grade 9</h3>
                      <table id="" class="table   table-defualt" >
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>1st Grading</th>
                              <th>2nd Grading</th>
                              <th>3rd Grading</th>
                              <th>4rt Grading</th>
                              <th>Final Grade</th>
                             
                            </tr>
                          </thead>
                          <tbody>
                           
                            @foreach($GradeNinegrades as $GradeNinegrade)
                            <tr>
                            <td>{{$GradeNinegrade->subject}}</td>
                            <td>{{$GradeNinegrade->fgrade}}</td>
                            <td>{{$GradeNinegrade->sgrade}}</td>
                            <td>{{$GradeNinegrade->tgrade}}</td>
                            <td>{{$GradeNinegrade->fortgrade}}</td>
                            <td>{{($GradeNinegrade->fgrade+$GradeNinegrade->sgrade+$GradeNinegrade->tgrade+$GradeNinegrade->fortgrade)/4}}</td>
      
                          </tr>
      
                              @endforeach       
                              
                              
                              
                              
                              
                              
                              
                              
                           
                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>Subject</th>
                              <th>1st Grading</th>
                              <th>2nd Grading</th>
                              <th>3rd Grading</th>
                              <th>4rt Grading</th>
                              <th>Final Grade</th>
                              
                            </tr>
                          </tfoot>
                        </table>
                        @if (count($GradeEightgrades)>0)
                            
                        @else
                            
                        @endif
                        <h3>Grade 10</h3>
                        <table id="" class="table   table-defualt" >
                            <thead>
                              <tr>
                                <th>Subject</th>
                                <th>1st Grading</th>
                                <th>2nd Grading</th>
                                <th>3rd Grading</th>
                                <th>4rt Grading</th>
                                <th>Final Grade</th>
                               
                              </tr>
                            </thead>
                            <tbody>
                             
                              @foreach($GradeTengrades as $GradeTengrade)
                              <tr>
                              <td>{{$GradeTengrade->subject}}</td>
                              <td>{{$GradeTengrade->fgrade}}</td>
                              <td>{{$GradeTengrade->sgrade}}</td>
                              <td>{{$GradeTengrade->tgrade}}</td>
                              <td>{{$GradeTengrade->fortgrade}}</td>
                              <td>{{($GradeTengrade->fgrade+$GradeTengrade->sgrade+$GradeTengrade->tgrade+$GradeTengrade->fortgrade)/4}}</td>
        
                            </tr>
        
                                @endforeach       
                                
                                
                                
                                
                                
                                
                                
                                
                             
                              
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Subject</th>
                                <th>1st Grading</th>
                                <th>2nd Grading</th>
                                <th>3rd Grading</th>
                                <th>4rt Grading</th>
                                <th>Final Grade</th>
                                
                              </tr>
                            </tfoot>
                          </table>
                          @if (count($GradeEightgrades)>0)
                              
                          @else
                              
                          @endif
                          <h3>Grade 11</h3>
                          <h4>First Sem</h4>
                          <table id="" class="table   table-defualt" >
                              <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>1st Quarter</th>
                                    <th>2nd Quarter</th>
                                   
                                    <th>Final Grade</th>
                                </tr>
                              </thead>
                              <tbody>
                               
                                  @foreach($GradeEleven1grades as $GradeEleven1grade)
                                  <tr>
                                  <td>{{$GradeEleven1grade->subject}}</td>
                                  <td>{{$GradeEleven1grade->fgrade}}</td>
                                  <td>{{$GradeEleven1grade->sgrade}}</td>
                                  
                                  <td>{{($GradeEleven1grade->fgrade+$GradeEleven1grade->sgrade)/2}}</td>
                                </tr>     
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                    <th>Subject</th>
                                    <th>1st Quarter</th>
                                    <th>2nd Quarter</th>
                                   
                                    <th>Final Grade</th>
                                </tr>
                              </tfoot>
                            </table>
                            @if (count($GradeEightgrades)>0)
                                
                            @else
                                
                            @endif
                            <h4>Second Sem</h4>
                            <table id="" class="table   table-defualt" >
                                <thead>
                                  <tr>
                                      <th>Subject</th>
                                      <th>1st Quarter</th>
                                      <th>2nd Quarter</th>
                                     
                                      <th>Final Grade</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 
                                    @foreach($GradeEleven2grades as $GradeEleven2grade)
                                    <tr>
                                    <td>{{$GradeEleven2grade->subject}}</td>
                                    <td>{{$GradeEleven2grade->fgrade}}</td>
                                    <td>{{$GradeEleven2grade->sgrade}}</td>
                                    
                                    <td>{{($GradeEleven2grade->fgrade+$GradeEleven2grade->sgrade)/2}}</td>
                                  </tr>     
                                  @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                      <th>Subject</th>
                                      <th>1st Quarter</th>
                                      <th>2nd Quarter</th>
                                     
                                      <th>Final Grade</th>
                                  </tr>
                                </tfoot>
                              </table>
                              @if (count($GradeEightgrades)>0)
                                  
                              @else
                                  
                              @endif
                              <h3>Grade 12</h3>
                              <h4>First Sem</h4>
                              <table id="" class="table   table-defualt" >
                                  <thead>
                                    <tr>
                                        <th>Subject</th>
                                        <th>1st Quarter</th>
                                        <th>2nd Quarter</th>
                                       
                                        <th>Final Grade</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   
                                      @foreach($Grade121grades as $Grade121grade)
                                      <tr>
                                      <td>{{$Grade121grade->subject}}</td>
                                      <td>{{$Grade121grade->fgrade}}</td>
                                      <td>{{$Grade121grade->sgrade}}</td>
                                      
                                      <td>{{($Grade121grade->fgrade+$Grade121grade->sgrade)/2}}</td>
                                    </tr>     
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    <tr>
                                        <th>Subject</th>
                                        <th>1st Quarter</th>
                                        <th>2nd Quarter</th>
                                       
                                        <th>Final Grade</th>
                                    </tr>
                                  </tfoot>
                                </table>
                                @if (count($GradeEightgrades)>0)
                                    
                                @else
                                    
                                @endif
                                <h4>Second Sem</h4>
                                <table id="" class="table   table-defualt" >
                                    <thead>
                                      <tr>
                                          <th>Subject</th>
                                          <th>1st Quarter</th>
                                          <th>2nd Quarter</th>
                                         
                                          <th>Final Grade</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                     
                                        @foreach($Grade122grades as $Grade122grade)
                                        <tr>
                                        <td>{{$Grade122grade->subject}}</td>
                                        <td>{{$Grade122grade->fgrade}}</td>
                                        <td>{{$Grade122grade->sgrade}}</td>
                                        
                                        <td>{{($Grade122grade->fgrade+$Grade122grade->sgrade)/2}}</td>
                                      </tr>     
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                      <tr>
                                          <th>Subject</th>
                                          <th>1st Quarter</th>
                                          <th>2nd Quarter</th>
                                         
                                          <th>Final Grade</th>
                                      </tr>
                                    </tfoot>
                                  </table>
                        
                 
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
  
  
  <script>
    $(document).ready(function(){
      var a =$("#fgrade").html();
      
      var b = $("#sgrade").html();
      var c = $('#tgrade').html(); 
      var d = $('#fortgrade').html(); 
      
      
      
      
      console.log(a);
      
      
      var e= (parseInt(a)+ parseInt(b)+ parseInt(c)+parseInt(d))/4;
      console.log(e);
      $('#finalgrade*').html(e); 
      
    });
    
    
    
  </script>
  @endsection