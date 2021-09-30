@extends('layouts.master')
@section('content')
<section class="content">
  <div class="">
    
   
            
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
                <div class=""><h2>Assesment</h2></div> 
              
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class=" tab-pane active" id="activity">
                <!-- Post -->
                
                <!-- /.post -->
                
                <!-- Post -->
                
                <!-- /.user-block -->
                  <table class="table   table-defualt">
                    <thead>
                      <th>Enrolled Subject</th>
                      <th>Sectiont</th>
                      <th>Teacher</th>
                    </thead>
                    <tbody>
                        @foreach($ases as $ase)
                      <tr>
                        <td>{{$ase->subject}}</td>
                        <td>{{$ase->name}}</td>
                        <td>{{$ase->fname}} {{$ase->lname}}</td>
                      </tr>
                      @endforeach
                      @foreach($sases as $sase)
                      <tr>
                          <td>{{$sase->subject}}</td>
                          <td>{{$sase->name}}</td>
                          <td>{{$sase->fname}} {{$sase->lname}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <th>Enrolled Subject</th>
                      <th>Sectiont</th>
                      <th>Teacher</th>
                    </tfoot>
                  </table>
                
                   <!-- <div class="row"> 
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
                        
                      </div>-->
                 
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