@extends('layouts.master')
@section('content')
<section class="content">
  <div class="">
    
   
            
      <!-- /.col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><h2>Records</h2></li>
              
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class=" tab-pane active" id="timeline">
                <!-- Post -->
             
              
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
                      @if (count($GradeNinegrades)>0)
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
                            @else
                          
                      @endif
                      @if (count($GradeTengrades)>0)
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
                              @else
                          
                              @endif
                              @if (count($GradeEleven1grades)>0)
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
                                @else
                          
                                @endif
                                @if (count($GradeEleven2grades)>0)
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
                                  @else
                          
                                  @endif
                                  @if (count($Grade121grades)>0)
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
                                    @else
                          
                                    @endif
                                    @if (count($Grade122grades)>0)
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
                                      @else
                          
                                      @endif
                            
                     
                
                
               
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