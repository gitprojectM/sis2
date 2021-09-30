<section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-2">
            
            </div>
            <div class="col-sm-10">
              <ol class="breadcrumb float-sm-right">
                
                  <li class="nav-item d-none d-sm-inline-block">
                      <a class="nav-link" href="/set"> SY: @foreach($schoolyears as $schoolyear)  {{$schoolyear->Year}} @endforeach</a> 
                       
                     </li>
                     <li class="nav-item d-none d-sm-inline-block">
                         <a class="nav-link" href="/sems">@foreach($sems as $sem)  {{$sem->sem}} @endforeach</a> 
                          
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                                <a class="nav-link" href="/set">@foreach($junior_periods as $junior_period)  {{$junior_period->period}} @endforeach</a> 
                                 
                               </li>
                               <li class="nav-item d-none d-sm-inline-block">
                                    <a class="nav-link" href="/set_curriculum">@foreach($senior_periods as $senior_period)  {{$senior_period->speriod}} @endforeach</a> 
                                     
                                   </li>
                                  </li>
                                  <li class="nav-item d-none d-sm-inline-block">
                                       <a class="nav-link" href="/set">@foreach($clums as $clums)  {{$clums->curriculumname}} @endforeach</a> 
                                        
                                      </li>
                       
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>