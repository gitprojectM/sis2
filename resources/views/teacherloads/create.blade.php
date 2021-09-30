@extends('layouts.master')
@section('content')
<div class="card card-default"  >
	<div class="card-header bg-secondary	 text-white" >
		  <h1 class="card-title" >Add Loads</h1>
	 

	 
	</div>

	<div class="card-body">

<form method="POST" action="{{url('teacherloads') }}">			
		 @csrf		
	<div> 
	<div class="row">
            <div class="col-4">
                    <label>Tearchers Name</label>
                    <select class="custom-select {{$errors->has('teachers_id')?'is-invalid':''}}" name="teachers_id" id="teacherid">
                        <option value="" >=====SELECT TEARCHER=====</option>
                        @foreach($teachers as $teacher)
                        <option value="{{$teacher->id}}">{{$teacher->fname}} {{$teacher->lname}}</option>
                         @endforeach
                    </select>
                    @if ($errors->has('teachers_id'))
                    <span class="invalid-feedback">
                            <h6>{{$errors->first('teachers_id')}}</h6>
                    </span>
                        
                    @endif 
                </div>      
           
	</div>
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
                    <select class="custom-select  {{$errors->has('section_id')?'is-invalid':''}}" name="section_id" id="SECTION">      
                    </select> 
                    @if ($errors->has('section_id'))
                    <span class="invalid-feedback">
                            <h6>{{$errors->first('section_id')}}</h6>
                    </span>
                        
                    @endif 
                </div>	
            <div class="col-4">
                    <label>Curriculum Program</label>
                    <select  id="CURRICULUM" class="custom-select" name="" placeholder=""  >
                       
                    </select>          
                </div>
                <div class="col-4">
                        <label>Subject</label>
                        <select  id="SUBJECT" class="custom-select  {{$errors->has('subject_id')?'is-invalid':''}}" name="subject_id"  >                           
                        </select>
                        @if ($errors->has('subject_id'))
                        <span class="invalid-feedback">
                                <h6>{{$errors->first('subject_id')}}</h6>
                        </span>
                            
                        @endif                         
                    </div>  
    <br>
    <input type="hidden" id="status" value="">
    <input type="hidden" id="majorid" value="">
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
var mID = $('#majorid').val(); 
    $.ajax({
       type:"GET",
       url:"{{url('get_subjectbycurriculum')}}",
     data:'curriculum_id='+ cID,
     data:'curriculum_id='+ cID+ '&majorid='+ mID,    
       success:function(res){   
        console.log(res) ;
            $("#SUBJECT").empty();
           $("#SUBJECT").append('<option value="">Select</option>');
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
                $("#SEM").append('<option value="">Select</option>');
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
               $("#SECTION,#SECTION2").append('<option value="">Select</option>');
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
                $("#TRACK").append('<option value="">Select</option>');
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
                $("#SECTION").append('<option value="">Select</option>');
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
   $('#GRADE').change(function(){
			var studID = $(this).val();
			$.ajax({
				type:"GET",
				url:"{{url('get_stat')}}",
				data:'id='+ studID,  
				success:function(res){   
					console.log(res) ;
					$("#status").empty();
				//	$("#student").append('<option>Select</option>');
					$.each(res,function(key,value){
						$("#status").val(value)
					
					});
					
					
				}
			});
			
		});
        $(document).ready(function(){
        $('#SECTION').change(function(){
  
            var ylID = $("#status").val();
  
    //console.log(syID + ylID) ;   
        $.ajax({
           type:"GET",
           url:"{{url('get_status')}}",
         data:'status='+ ylID,
       
           success:function(res){   
            console.log(res) ;
                 $("#CURRICULUM").empty();
                $("#CURRICULUM").append('<option value="">Select</option>');
                $.each(res,function(key,value){
                    $("#CURRICULUM").append('<option value="'+key+'">'+value+'</option>');
                });        
           }
        });   
   });
});
$('#teacherid').change(function(){
			var studID = $(this).val();
			$.ajax({
				type:"GET",
				url:"{{url('get_majorid')}}",
				data:'id='+ studID,  
				success:function(res){   
					console.log(res) ;
					$("#majorid").empty();
				//	$("#student").append('<option>Select</option>');
					$.each(res,function(key,value){
						$("#majorid").val(value)
					
					});
					
					
				}
			});
			
		});
 </script>



@endsection