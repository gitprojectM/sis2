<?php

namespace App\Http\Controllers;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;
use App\Teacher;
use App\School_Year;
use App\Section;
use App\Yearlevel;
use App\Section_Name;
use App\Track;
use App\Sem; 
use App\Syperiod;


use DB;


class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
         //$sections = Section::all();
        $sections = DB::select('SELECT `sections`.`id`, `section__names`.`name`, `teachers`.`fname`, `teachers`.`lname`, `tracks`.`tname`, `sems`.`sem`,yearlevels.grade, `school__years`.`Year`
        FROM `sections`
        left JOIN  section__names on sections.sectionname_id=section__names.id 
        left JOIN  teachers on sections.teacher_id=teachers.id 
        left JOIN school__years on sections.school_year_id=school__years.id 
        left JOIN yearlevels on sections.yearlevelid=yearlevels.id
        left JOIN `sems`on sections.semid=sems.id 
        LEFT JOIN tracks on sections.trackid=tracks.id 
        WHERE school__years.status=1 ');
      //return $sections;
        $schoolyears=School_Year::all();
        $teachers=Teacher::all();
        $yearlevel= Yearlevel::all();
    
        return view('sections.index')->with( 'sections',$sections)->with( 'teachers',$teachers)->with( 'schoolyears',$schoolyears);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $syperiods= DB::select('SELECT `syperiods`.`id`, `school__years`.`Year`, `sems`.`sem`
       // FROM `syperiods`, `school__years`, `sems`
       //  WHERE syperiods.status=1 and syperiods.schoolyear_id=school__years.id AND syperiods.sem_id=sems.id');

         $schoolyears=DB::select('SELECT * from school__years where status=1');
        $teachers=Teacher::all();
           $yearlevels=Yearlevel::all();
        $sectionnames = Section_Name::all();
         $tracks=Track::all();
         $sems=DB::select('SELECT * from sems where status=1');
        return view('sections.create')->with( 'teachers',$teachers)
        ->with( 'schoolyears',$schoolyears)
        ->with('yearlevels',$yearlevels)
        ->with('sectionnames',$sectionnames) ->with('tracks',$tracks)->with('sems',$sems);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
   /* if (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
    ->where('teacher_id',$request->get('teacher_id') ) 
    ->where('yearlevelid',$request->get('yearlevelid') ) 
    ->where('school_year_id',$request->get('school_year_id') ) 
    ->where('trackid',$request->get('trackid') ) 
    
    ->where('semid',$request->get('semid'))->exists()){
 
        return redirect('/sections/create')->with('ror',$request->get('sectionname_id').' is already exists');
    }
    
     elseif(DB::table('sections') 
        //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
        ->where('sectionname_id',$request->get('sectionname_id') ) 
       
        ->where('yearlevelid',$request->get('yearlevelid') ) 
        ->where('school_year_id',$request->get('school_year_id') ) 
        ->where('trackid',$request->get('trackid') ) 
        
        ->where('semid',$request->get('semid'))->exists()){
     
            return redirect('/sections/create')->with('ror',$request->get('sectionname_id').' is already exists');
        }
    elseif (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
    ->where('teacher_id',$request->get('teacher_id') ) 
    ->where('yearlevelid',$request->get('school_year_id') ) 
    
    ->where('school_year_id',$request->get('syid') )->exists()){ 
   
        return redirect('/sections/create')->with('ror','Section is already exists');
    }
    elseif (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
     
    ->where('yearlevelid',$request->get('school_year_id') ) 
    
    ->where('school_year_id',$request->get('syid') )->exists()){ 
   
        return redirect('/sections/create')->with('ror',$request->get('sectionname_id').' is already exists');
    }*/ 
    if (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
    ->where('teacher_id',$request->get('teacher_id') ) 
    ->where('yearlevelid',$request->get('yearlevelid') ) 
    ->where('school_year_id',$request->get('school_year_id') ) 
    ->where('trackid',$request->get('trackid') ) 
    
    ->where('semid',$request->get('semid'))->exists()){
 
        return redirect('/sections/create')->with('ror','Section is already exists');
    }
    elseif (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
    ->where('teacher_id',$request->get('teacher_id') ) 
    ->where('yearlevelid',$request->get('yearlevelid') ) 
    
    ->where('school_year_id',$request->get('school_year_id') )->exists()){ 
   
        return redirect('/sections/create')->with('ror','Section is already exists');
       
    } 
    elseif (DB::table('sections') 
    //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sectionname_id',$request->get('sectionname_id') ) 
   // ->where('teacher_id',$request->get('teacher_id') ) 
    ->where('yearlevelid',$request->get('yearlevelid') ) 
    
    ->where('school_year_id',$request->get('school_year_id') )->exists()){ 
   
        return redirect('/sections/create')->with('ror','Section is already exists');
       
    } 
    else{
        $section =new Section;
        $section->sectionname_id=$request->get('sectionname_id');
         $section->teacher_id=$request->get('teacher_id');
          $section->yearlevelid=$request->get('yearlevelid');
        $section ->school_year_id=$request->get('school_year_id');
         $section ->trackid=$request->get('trackid');
           $section ->semid=$request->get('semid');
    
        
    
          $section->save();
            return redirect('/sections'); 
    }      
        
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
         $schoolyears=DB::select('SELECT * from school__years where status=1');
        $sems=DB::select('SELECT * from sems where status=1');
        $teachers=Teacher::all();
       $sectionnames=Section_Name::all();
          $yearlevels=Yearlevel::all();
          $tracks=Track::all();
         $sections= DB::select('SELECT * FROM `sections` 
         left JOIN section__names on sections.sectionname_id=section__names.id 
         left JOIN teachers on sections.teacher_id=teachers.id 
         left JOIN school__years on sections.school_year_id=school__years.id 
         left JOIN yearlevels on sections.yearlevelid=yearlevels.id 
         left JOIN `sems`on sections.semid=sems.id 
         LEFT JOIN tracks on sections.trackid=tracks.id where sections.id=? ',["$id"]); 
         return view('sections.edit',compact(['sections','id']))
         ->with( 'teachers',$teachers)
         ->with( 'schoolyears',$schoolyears)
          ->with('sectionnames',$sectionnames) 
           ->with('yearlevels',$yearlevels)
           ->with('sems',$sems)
           ->with('tracks',$tracks);
        // return view('sections.edit',('sections'$sections))->with( 'teachers',$teachers)->with( 'schoolyears',$schoolyears);   
    }     


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     

         $schoolyear =Section::find($id);
        $schoolyear->sectionname_id=$request->get('sectionname_id');
         $schoolyear->teacher_id=$request->get('teacher_id');
         $schoolyear->yearlevelid=$request->get('yearlevelid');
       $schoolyear ->school_year_id=$request->get('school_year_id');
       $schoolyear ->trackid=$request->get('trackid');
       $schoolyear ->semid=$request->get('semid');

        

          $schoolyear->save();
           return redirect('/sections');

        //return $schoolyear;

                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $section = Section::find($id);
         
       
        try {
            $section->delete();
   }
   catch (\Exception $e) {
    return redirect('/sections')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/sections');
    }

    public function getsections(Request $request)
    {
      $sections = DB::table("section__names")
    
     
         ->where("section__names.yearlevelid",$request->yearlevelid)
       
       
        ->pluck("section__names.name","section__names.id");
        //return $sections;
        return response()->json($sections);

           
    }
}
