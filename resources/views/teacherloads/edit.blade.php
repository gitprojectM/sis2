@extends('layouts.master')
@section('content')
<div class="card card-default"  >
	<div class="card-header bg-secondary	 text-white" >
		  <h1 class="card-title" >Add Loads</h1>
	 

	 
	</div>

	<div class="card-body">

<form method="POST" action="{{action('TeacherloadsController@update', $id)}}">			
         @csrf	
         <input name="_method" type="hidden" value="PATCH">	
	<div> 
	<div class="row">
            <div class="col-4">
                    <label>Grade Level</label>
                    <select class="custom-select" name="yl" id="GRADE" onchange="return showtrack();">
                            <option value="" >=====SELECT GRADE=====</option>
                            @foreach($yearlevels as $yearlevel)
                            <option value="{{$yearlevel->id}}">{{$yearlevel->grade}}</option>
                             @endforeach 
                    </select>
            </div>	
     <div id="dtrack" class="col-4"  style="visibility: hidden">
      <label>Track</label>
      <select class="custom-select" name="track" id="TRACK">     
      </select>
  </div>
  <div  id="dsem" class="col-4" style="visibility: hidden" >
        <label>Semester</label>
        <select class="custom-select" name="sem" id="SEM">
              @foreach($sems as $sem)
              @endforeach 
        </select>
    </div> 
				@foreach($schoolyears as $schoolyear)
                <input type="hidden" id="YEAR" name="year" value=" {{$schoolyear->id}}" > 
				 @endforeach 		
    </div>
	<div class="row">
        <div class="col-4">		
            <label>Section</label>
            <select class="custom-select" name="secid" id="SECTION">
                    @foreach($loads as $load)     
                    <option value="{{$load->section_id}}">{{$load->name}}</option> 
                    @endforeach 	
            </select> 
        </div>	
        <div class="col-4">
                <label>Tearchers Name</label>
                <select onchange="two()" class="custom-select" name="tid" id="teacherid">
                        @foreach($loads as $load)     
                        <option value="{{$load->teachers_id}}">{{$load->fname}} {{$load->lname}}</option> 
                        @endforeach 
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->fname}} {{$teacher->lname}}</option>
                     @endforeach
                </select>
            </div>      	
    </div>
       <div class="row">
            <div class="col-4">
                    <label>Curriculum</label>
                    <select  id="CURRICULUM" class="custom-select" name="" placeholder=""  >
                        <option value="" >=====SELECT CURRICULUM=====</option>
                        @foreach($curriculums as $curriculum)
        
                        <option value="{{$curriculum->id}}">{{$curriculum->Cname}}</option>
                         @endforeach 
                    </select>          
                </div>
                <div class="col-4">
                        <label>Subject</label>
                        <select  id="SUBJECT" class="custom-select" name="sid"  >   
                                @foreach($loads as $load)     
                                <option value="{{$load->subject_id}}">{{$load->subject}}</option> 
                                @endforeach                         
                        </select>                        
                    </div>  
    <br>
    </div>
		<br>
		<div>	
		<input  class="btn btn-secondary" type="submit" value="submit">
	</div>
	</div>
</form>
<!-- /.row -->
</div>
<!-- /.card-body -->

</div>

<script type="text/javascript">
$('#CURRICULUM').change(function(){
var cID = $(this).val();  
    $.ajax({
       type:"GET",
       url:"{{url('get_subjectbycurriculum')}}",
     data:'curriculum_id='+ cID,
       success:function(res){   
        console.log(res) ;
            $("#SUBJECT").empty();
           $("#SUBJECT").append('<option>Select</option>');
            $.each(res,function(key,value){
                $("#SUBJECT").append('<option value="'+key+'">'+value+'</option>');
            });       
       }
    });   
});


function showtrack() {
		var selectbox= document.getElementById('GRADE');
		var userinput=selectbox.options[selectbox.selectedIndex].value;

		console.log(userinput);
		if(userinput==5){
      document.getElementById('dtrack').style.visibility='visible';
       document.getElementById('dsem').style.visibility='visible';
    }else if(userinput==6){
      document.getElementById('dtrack').style.visibility='visible';
       document.getElementById('dsem').style.visibility='visible';
    }else{
      document.getElementById('dtrack').style.visibility='hidden';
       document.getElementById('dsem').style.visibility='hidden';
    }

		return false;
	}
</script>
<script type="text/javascript">

$('#TRACK').change(function(){
    $("#SEM").empty();
                $("#SEM").append('<option>Select</option>');
              //  $.each(res,function(key,value){
                    $("#SEM").append('<option value="{{$sem->id}}">{{$sem->sem}}</option>');
   });
	



     /* $('#YEAR').click(function(){
    var syID = $(this).val();    
  
   //console.log(ylID+syID);    
    if(syID){
        $.ajax({
           type:"GET",
           url:"{{url('get_yearlevel')}}?school_year_id="+syID,
           success:function(res){   
           if(res){
                $("#GRADE").empty();
                $("#GRADE").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#GRADE").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#GRADE").empty();
            }
           }
        });
    }else{
        $("#GRADE").empty();
      
    }      
   });*/
   $('#GRADE').change(function(){

    var syID = $("#YEAR").val();
    var ylID = $(this).val();  
  
    //console.log(syID + ylID) ; 
        $.ajax({
           type:"GET",
           url:"{{url('get_section')}}",
         data:'yearlevelid='+ ylID,
         data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
           success:function(res){   
            console.log(res) ;
                $("#SECTION,#SECTION2").empty();
               $("#SECTION,#SECTION2").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#SECTION,#SECTION2").append('<option value="'+key+'">'+value+'</option>');
                });       
           }
        });   
   });
    $('#GRADE').change(function(){
    var syID = $("#YEAR").val();
    var ylID = $(this).val();  
  
    //console.log(syID + ylID) ;   
        $.ajax({
           type:"GET",
           url:"{{url('get_track')}}",
         data:'yearlevelid='+ ylID,
         data:'yearlevelid='+ ylID + '&school_year_id='+syID ,    
           success:function(res){   
            console.log(res) ;
                 $("#TRACK").empty();
                $("#TRACK").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#TRACK").append('<option value="'+key+'">'+value+'</option>');
                });        
           }
        });   
   });
    /* $('#TRACK').change(function(){
    var syID = $("#YEAR").val();
     var ylID = $("#GRADE").val();
    var trackID = $(this).val();   
    //console.log(syID + ylID) ;   
        $.ajax({
           type:"GET",
           url:"{{url('get_sembytrack')}}",
         data:'trackid='+ trackID,
         data:'trackid='+ trackID + '&school_year_id='+syID + '&yearlevelid='+ ylID ,    
           success:function(res){   
            console.log(res) ;
                 $("#SEM").empty();
                $("#SEM").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#SEM").append('<option value="'+key+'">'+value+'</option>');
                });
           
         
           }
        });
    
   });*/
      $('#SEM').change(function(){
    var syID = $("#YEAR").val();
     var ylID = $("#GRADE").val();
      var trackID = $('#TRACK').val(); 
    var semID = $(this).val();  
    //console.log(syID + ylID) ;    
        $.ajax({
           type:"GET",
           url:"{{url('get_sectionbysem')}}",
        data:'senmid='+ semID,
         data:'semid='+ semID + '&school_year_id='+syID + '&yearlevelid='+ ylID  +'&trackid='+ trackID ,    
           success:function(res){   
            console.log(res) ;
                 $("#SECTION").empty();
                $("#SECTION").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#SECTION").append('<option value="'+key+'">'+value+'</option>');
                });
           
         
           }
        });
   });
    

   $('#SECTION').change(function(){
       var grade = $(this).val(); 
       console.log(grade);
   });
 </script>



@endsection