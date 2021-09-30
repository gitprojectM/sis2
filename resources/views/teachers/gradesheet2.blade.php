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
            @foreach($sheetnames as $sheetname)
            
            <h3 class="profile-username text-center">{{$sheetname->fname}} {{$sheetname->lname}}</h3>
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
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">First Grading</a></li>
              <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Second Grading</a></li>
            
              
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class=" tab-pane active" id="activity">
                <!-- Post -->
                
                <!-- /.post -->
                
                <!-- Post -->
                
                <!-- /.user-block -->
                <div class=""> 
                      <h3>First Quarter</h3>
                      @foreach($sheetnames as $sheetname)
                       <h5>{{$sheetname->subject}}</h5>
                      @endforeach  
                      <table class="table table-defualt">
                            <thead>
                            <tr class="">
                    
                    <th>ID</th>
                    <th>Student</th>
                    <th>Grade</th>
                    <th>Action</th>
                    
                </tr>
                            </thead>
                            <tbody>
                 @if(count( $sheets)>0)
                 @foreach($sheets as $sheet)
                 <tr> 
                        <td>{{$sheet->id}}</td>
                        <td>{{$sheet->fname}}  {{$sheet->lname}}</td>
                        <td>{{$sheet->grade}} </td>
 
                       <td> <a @can('isadmin')href="{{action('GradesController@individualshowsubject2', $sheets=[$sheet->id])}}"@endcan  @can('isteacher') href="/tgrades/{{$sheet->id}}"@endcan  class=" btn btn-secondary btn-sm"><i class="fa fa-edit"></i>|<i class="fa fa-plus"></i></a></td>
    
                         
                         
                             
                             
                        
                        
                        
    
            @endforeach  
        @else
            <p>No data found</p>
        @endif
                 </tr>
                            </tbody>    
            </table>
                
                <!-- /.post -->
                
                <!-- Post -->
                
                <!-- /.post -->
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane " id="timeline">
                <!-- The timeline -->
                <div class=""> 
                        <h3>Second Quarter</h3>
                        @foreach($sheetnames as $sheetname)
                         <h5>{{$sheetname->subject}}</h5>
                        @endforeach  
                        <table class="table table-defualt">
                              <thead>
                              <tr class="">
                      
                      <th>ID</th>
                      <th>Student</th>
                      <th>Grade</th>
                      <th>Action</th>
                      
                  </tr>
                              </thead>
                              <tbody>
                   @if(count( $sgrades)>0)
                   @foreach($sgrades as $sgrade)
                   <tr> 
                          <td>{{$sgrade->id}}</td>
                          <td>{{$sgrade->fname}}  {{$sgrade->lname}}</td>
                          <td>{{$sgrade->grade}} </td>
   
                         <td> <a @can('isadmin')href="{{action('GradesController@individualshowsubject', $sgrades=[$sgrade->id])}}"@endcan  @can('isteacher') href="/tgrades/{{$sgrade->id}}"@endcan  class=" btn btn-secondary btn-sm"><i class="fa fa-edit"></i>|<i class="fa fa-plus"></i></a></td>
      
                           
                           
                               
                               
                          
                          
                          
      
              @endforeach  
          @else
              <p>No data found</p>
          @endif
                   </tr>
                              </tbody>    
              </table>
                  
                  <!-- /.post -->
                  
                  <!-- Post -->
                  
                  <!-- /.post -->
                </div>
                
              
                
              </div>
              <!-- /.tab-pane -->
              
             
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