<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <script src="{{ mix('js/app.js') }}"></script>
  
  <script src="/jquery.min.js"></script>
  
  
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>{{ config('app.name', 'GNHS') }}</title>
  
  <link rel="stylesheet" href="/css/app.css">
  
  <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
  <link rel="stylesheet" href="/dataTables.bootstrap4.css">
  
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../../plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://unpkg.com/ionicons@4.4.6/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  
</head>


<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        
        
      </ul>
      
      <!-- SEARCH FORM -->
      
      <div class="input-group input-group-sm ">
        
        
      </div>
    </form>
    <ul class="navbar-nav">
      
      
      
    </ul>
    
  </nav>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/img/LOGO2.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
      <span class="brand-text font-weight-light">GNHSsis</span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/black-male-user-symbol.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
          <a href="#" class="d-block">{{Auth::user()->name}} </a>
          
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      
      <nav class="mt-2 " >
        
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
            @can('isadmin')
            <li class="nav-item">
              <a href="/dashboard" class="nav-link {{Request::is('dashboard')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/registers/create" class="nav-link {{Request::is('registers/create')?'active':''}}">
                <i class="nav-icon fas fa-address-card   "></i>
                <p>
                  Register Student
                </p>
              </a>
            </li>
            
            <li class="nav-item has-treeview {{Request::is('students','teachers','sections','tracks','sectionnames','teacherloads','curriculums','curriculumsubjects','registers','index2')?'menu-open':''}}">
              <a href="#" class="nav-link {{Request::is('students','teachers','sections','tracks','sectionnames','teacherloads','curriculums','curriculumsubjects','registers','index2')?'active':''}}">
                <i class=" fa fa-table nav-icon "></i>
                <p>
                  Table
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/students" class="nav-link {{Request::is('students')?'active':''}}">
                    <i class="fa fa-user nav-icon"></i>
                    <p>Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/teachers" class="nav-link {{Request::is('teachers')?'active':''}}" >
                    <i class="fas fa-user-tie  nav-icon"></i>
                    <p>Teacher</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/registers" class="nav-link {{Request::is('registers')?'active':''}}" >
                      <i class="fas fa-users  nav-icon"></i>
                      <p>Juniors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/index2" class="nav-link {{Request::is('index2')?'active':''}}" >
                        <i class="fas fa-users  nav-icon"></i>
                        <p>Seniors</p>
                      </a>
                    </li>
                <li class="nav-item">
                  <a href="/sections" class="nav-link {{Request::is('sections')?'active':''}}">
                    <i class=" 	fas fa-chalkboard nav-icon"></i>
                    <p>Section</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/tracks" class="nav-link {{Request::is('tracks')?'active':''}}">
                    <i class=" fas fa-road nav-icon"></i>
                    <p>Track</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/sectionnames" class="nav-link {{Request::is('sectionnames')?'active':''}} ">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Section Name</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/teacherloads" class="nav-link {{Request::is('teacherloads')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Class Subject</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/curriculums" class="nav-link {{Request::is('curriculums')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Curriculum Program</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/curriculumsubjects" class="nav-link {{Request::is('curriculumsubjects')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Curriculum Subjects</p>
                  </a>
                </li>
                
              </ul>
            </li> 
            
            
            <li class="nav-item has-treeview  {{Request::is('students/create','teachers/create','sections/create','positions/create','curriculumsubjects/create','curriculums/create','schoolyears','teacherloads/create','clums','majors')?'menu-open':''}} ">
              <a href="#" class="nav-link {{Request::is('students/create','teachers/create','sections/create','positions/create','curriculumsubjects/create','curriculums/create','schoolyears','teacherloads/create','clums','majors')?'active':''}}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                  Forms
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/students/create" class="nav-link {{Request::is('students/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Student</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/teachers/create" class="nav-link {{Request::is('teachers/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Teacher</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/majors" class="nav-link {{Request::is('majors')?'active':''}}">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add Teacher Major</p>
                    </a>
                  </li>
                <li class="nav-item">
                  <a href="/sections/create" class="nav-link {{Request::is('sections/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Section</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/positions/create" class="nav-link {{Request::is('positions/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Position</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/curriculumsubjects/create" class="nav-link {{Request::is('curriculumsubjects/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Subject</p>
                  </a>
                </li> 
                <li class="nav-item">
                  <a href="/curriculums/create" class="nav-link {{Request::is('curriculums/create')?'active':''}}">
                    <i class="fa fa-plus nav-icon"></i>
                    <p>Add Programs</p>
                  </a>
                </li>  
                <li class="nav-item">
                    <a href="/schoolyears" class="nav-link  {{Request::is('schoolyears')?'active':''}}">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>add school Year</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/teacherloads/create" class="nav-link  {{Request::is('teacherloads/create')?'active':''}}">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>Add Loads</p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/clums" class="nav-link  {{Request::is('clums')?'active':''}}">
                        <i class="fa fa-plus nav-icon"></i>
                        <p>Add Curriculum</p>
                      </a>
                    </li>    
              </ul>
            </li>
            <li class="nav-item has-treeview  {{Request::is('sems','set','periods','set_curriculum','changepassword','speriods'  )?'menu-open':''}} ">
              <a href="#" class="nav-link {{Request::is('periods','sems','set','set_curriculum','changepassword','speriods' )?'active':''}}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Setting
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/periods" class="nav-link {{Request::is('periods')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Set Period</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/set_curriculum" class="nav-link {{Request::is('set_curriculum')?'active':''}}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Set Currriculum</p>
                    </a>
                  </li>
                <li class="nav-item">
                  <a href="/sems" class="nav-link {{Request::is('sems')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Set Semester</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="/speriods" class="nav-link {{Request::is('speriods')?'active':''}}">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Set Quarter</p>
                    </a>
                  </li>
                <li class="nav-item">
                  <a href="/set " class="nav-link {{Request::is('set')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Set School Year</p>
                  </a>
                </li>
                
               
                  <li class="nav-item">
                      <a href="/changepassword" class="nav-link  {{Request::is('changepassword')?'active':''}}">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Change Password</p>
                      </a>
                    </li>
                
              </ul>
              
            </li>
           
           
            <li class="nav-item has-treeview  {{Request::is('grades')?'menu-open':''}} ">
              <a href="#" class="nav-link  {{Request::is('grades')?'active':''}}">
                <i class=" fas fa-user-cog nav-icon  "></i>
                <p>
                  Transaction
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
               
                <li class="nav-item">
                  <a href="/grades" class="nav-link {{Request::is('grades')?'active':''}}">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>Grades</p>
                  </a>
                </li>
               
              </ul>
            </li>
            @endcan
              
            @can('isteacher') 
            <li class="nav-item has-treeview  {{Request::is('grades')?'menu-open':''}} ">
                <a href="#" class="nav-link  {{Request::is('grades')?'active':''}}">
                  <i class=" fas fa-user-cog nav-icon  "></i>
                  <p>
                    Transaction
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                 
                 
                  <li class="nav-item">
                    <a href="/loads/{{Auth::user()->user_id}}" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Grades</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                  <a href="/tshow/{{Auth::user()->user_id}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Profile
                      
                    </p>
                  </a>
                  
                </li>
              @endcan
            
              @can('isstudent') 
              <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                  <a href="{{action('StudentsController@profile',Auth::user()->user_id)}}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                      Profile
                      
                    </p>
                  </a>
                  
                </li>
              <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                  <a href="/enrolled_subject/{{Auth::user()->user_id}}" class="nav-link ">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                      Assesment
                    </p>
                  </a>
                  
                </li>
            <li class="nav-item {{Request::is('#')?'menu-open':''}}">
              <a href="/current_grade/{{Auth::user()->user_id}}" class="nav-link ">
                <i class="nav-icon fas fa-file"></i>
                <p>
                 Current Grades
                  
                </p>
              </a>
              
            </li>
            <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                <a href="/previewsubject/{{Auth::user()->user_id}}" class="nav-link ">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                  Previews Subject
                    
                  </p>
                </a>
                
              </li>
            <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                <a href="/studrecord/{{Auth::user()->user_id}}" class="nav-link {{Request::is('#')?'active':''}}">
                  <i class="nav-icon fas fa-file"></i>
                  <p>
                   Records
                    
                  </p>
                </a>
                
              </li>
              <li class="nav-item {{Request::is('#')?'menu-open':''}}">
                  <a href="/changepassword" class="nav-link {{Request::is('changepassword')?'active':''}}">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                     Change Password
                      
                    </p>
                  </a>
                  
                </li>
                
                @endcan
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link"
              
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"> </i> &nbsp;  &nbsp; Log out </a> 
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
              </form>
              
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    
    <!-- Content Wrapper. Contains page content -->
    
    <div class="content-wrapper">
     
    
      
      <!-- Main content -->
      <div class="content">
        <br>
        @include('partials.ror')
        @include('partials.success')
        <div class="container-fluid">
          @yield('content')
          
          
          
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    
    
    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
    
      </div>
      <!-- Default to the left -->
      <strong>Copyright &copy;</strong> All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->
  
  
  <!-- AdminLTE App
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="/js/app.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    
    
    <script>
      $(document).ready(function() {
        $('.xample').select2();
      });
      
      $(document).ready(function() {
        $('#example').DataTable();
      } );
    </script>
    
    
    
    
    
    
  </body>
  </html>
  