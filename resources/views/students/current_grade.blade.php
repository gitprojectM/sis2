@extends('layouts.master')
@section('content')
<section class="content">
  <div class="">
    
   
            
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link " href="#timeline" data-toggle="tab">Current Grades</a></li>
              
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class=" tab-pane active" id="activity">
                <!-- Post -->
               
             
                  
                      
                 
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
                    @endif 
               
                 
                
               
                 
           
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