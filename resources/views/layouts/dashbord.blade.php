@extends('layouts.master')
@section('content')
@include('setup.section')

<h1></h1>
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h4>Junior Students</h4>
        @foreach ($students as $student)
        <h3> {{$student->student}} </h3>
        @endforeach
        </div>
        <div class="icon">
          <i class="icon ion-md-people"></i>
        </div>
        <a href="/registers" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
          <h4>Senior Students</h4>
          @foreach ($seniorstudents as $seniorstudent)
          <h3> {{$seniorstudent->senior}} </h3>
          @endforeach
          </div>
          <div class="icon">
            <i class="icon ion-md-people"></i>
          </div>
          <a href="/index2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
            <h4>Total Students</h4>
            @foreach ($totalstudents as $totalstudent)
            <h3> {{$totalstudent->tstudent}} </h3>
            @endforeach
            </div>
            <div class="icon">
              <i class="icon ion-md-school"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
              <h4>Total Teachers</h4>
              @foreach ($totalteachers as $totalteacher)
              <h3> {{$totalteacher->teachers}} </h3>
              @endforeach
              </div>
              <div class="icon">
                <i class="icon ion-md-person"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
  </div> 
  <div class="row">
    
      <div class="col-lg-4 col-6">
          <h2>Junior Sections</h2>
      @foreach ($totalsections as $totalsection)
    <div class="">
      <!-- small box -->
     
      <div class="small-box bg-secondary">
        <div class="inner">
        <h4>{{$totalsection->name}}</h4>
      
        <h3>  </h3>
       
        </div>
        <div class="icon">
          <i class="icon ion-md-business"></i>
        </div>
        <a href="/junior/{{$totalsection->id}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endforeach
      </div>
    <div class="col-lg-3 col-6">
        <h2>Senior Sections</h2>
        @foreach ($totalssections as $totalssection)
        <div class="">
          <!-- small box -->
         
          <div class="small-box bg-gray">
            <div class="inner">
            <h4>{{$totalssection->name}}</h4>
          
            <h3>  </h3>
           
            </div>
            <div class="icon">
              <i class="icon ion-md-business"></i>
            </div>
            <a href="/senior/{{$totalssection->id}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>
  </div>



@endsection
