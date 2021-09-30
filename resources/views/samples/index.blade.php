   @extends('layouts.master')
@section('content')

<div class="">
<h1>Add loads</h1>
<form method="POST" action="">
				 
		 @csrf		 
	<div>
		  
	<div class="row">		
		<div class="col-4">
            <label>year</label>
            @foreach($school_years as $school_year)
            <input type="text" id="YEAR" name="year" value=" {{$school_year->id}}" > 
            @endforeach
          
			
		</div>
        <div class="col-4">
			<label>Year level</label>
			<select class="form-control" name="section" id="GRADE"  onchange="return showtrack();">
				
                @foreach($yearlevels as $yearlevel)
            <option value="{{$yearlevel->id}}">{{$yearlevel->grade}}</option>
                @endforeach 
                </select>				 
		
		</div>
		<div class="col-4">
			<label>section</label>
			<select class="form-control" name="section" id="SECTION">
				
						 
                </select>				 
		
		</div>
	</div>	
  <div class="row">
     <div id="dtrack" class="col-4"  style="visibility: hidden">
      <label>Track</label>
      <select class="form-control" name="track" id="TRACK">
        
         
      </select>
  </div>
  <div  id="dsem" class="col-4" style="visibility: hidden" >
      <label>Semester</label>
      <select class="form-control" name="sem" id="SEM">
        
            @foreach($sems as $sem)
            
                @endforeach 
        
         
      </select>
  </div>
</div>

		<br>
	</div>
	</div>
</form>
</div>

<script type="text/javascript">

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
     
    /* $('#YEAR').change(function(){
    var syID = $(this).val();    
    if(syID){
        $.ajax({
           type:"GET",
           url:"{{url('get_section')}}?school_year_id="+syID,
           success:function(res){               
            if(res){
                $("#SECTION").empty();
                $("#SECTION").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#SECTION").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#SECTION").empty();
            }
        });
    }else{
        $("#SECTION").empty();
      
    }      
   });*/
 
  /* $('#YEAR').change(function(){
    var syID =  $(this).val();    
  
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
                 $("#SECTION").empty();
                $("#SECTION").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#SECTION").append('<option value="'+key+'">'+value+'</option>');
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
   $('#TRACK').change(function(){
    $("#SEM").empty();
                $("#SEM").append('<option>Select</option>');
              //  $.each(res,function(key,value){
                    $("#SEM").append('<option value="{{$sem->id}}">{{$sem->sem}}</option>');
   });
   
      $('#SEM').click(function(){
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
    
 </script>




@endsection