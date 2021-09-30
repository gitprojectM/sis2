<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School_Year;
use App\Section;
use App\Student;
use App\Registration;
use App\Section_Name;
use App\Yearlevel;  
use App\Studentsubject;
use App\Teacherload;
use App\Subject;
use App\Sregistration;
use App\Sstudentsubject;
use DB;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $juniors=DB::select('SELECT students.id,students.fname,students.lname,students.mname,students.sex,section__names.name FROM registrations LEFT JOIN students on registrations.student_id=students.id LEFT join sections on registrations.section_id=sections.id LEFT JOIN school__years on sections.school_year_id=school__years.id LEFT JOIN section__names on sections.sectionname_id=section__names.id WHERE school__years.status=1 ');
        return view('registers.index')->with( 'juniors',$juniors); 
    }

public function index2()
    { 
        $juniors=DB::select('SELECT students.id,students.fname,students.lname,students.mname,students.sex,section__names.name,tracks.tname
        FROM sregistrations
        LEFT JOIN students on sregistrations.student_id=students.id
        LEFT join sections on sregistrations.section_id=sections.id
        LEFT JOIN school__years on sections.school_year_id=school__years.id
        LEFT JOIN section__names on sections.sectionname_id=section__names.id
        LEFT JOIN sems on sections.semid=sems.id
        LEFT JOIN tracks on sections.trackid=tracks.id
        WHERE sems.status=1 AND school__years.status=1');
        return view('registers.index2')->with( 'juniors',$juniors); 
    }
    public function junior($id)
    { 
        $juniors=DB::select('SELECT students.id,students.fname,students.lname,students.mname,students.sex,section__names.name 
        FROM registrations 
        LEFT JOIN students on registrations.student_id=students.id 
        LEFT join sections on registrations.section_id=sections.id 
        LEFT JOIN school__years on sections.school_year_id=school__years.id 
        LEFT JOIN section__names on sections.sectionname_id=section__names.id
         WHERE school__years.status=1 AND sections.id=?',["$id"]);
        return view('registers.junior')->with( 'juniors',$juniors); 
    }
    public function senior($id)
    { 
        $juniors=DB::select('SELECT students.id,students.fname,students.lname,students.mname,students.sex,section__names.name,tracks.tname
        FROM sregistrations
        LEFT JOIN students on sregistrations.student_id=students.id
        LEFT join sections on sregistrations.section_id=sections.id
        LEFT JOIN school__years on sections.school_year_id=school__years.id
        LEFT JOIN section__names on sections.sectionname_id=section__names.id
        LEFT JOIN sems on sections.semid=sems.id
        LEFT JOIN tracks on sections.trackid=tracks.id
        WHERE sems.status=1 AND school__years.status=1 and sections.id=?',["$id"]);
        return view('registers.senior')->with( 'juniors',$juniors); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $teacherloads= DB::select('SELECT sloads.id,curriculum_subjects.subject 
        FROM sloads 
        left JOIN sections ON sloads.section_id=sections.id 
        LEFT JOIN school__years ON sections.school_year_id=school__years.id 
        LEFT JOIN sems on sections.semid=sems.id 
        LEFT join curriculum_subjects ON sloads.subject_id=curriculum_subjects.id 
        WHERE school__years.status=1 AND sems.status=1');
        $sems=DB::select('SELECT * from sems where status=1');
        $subjects=Subject::all();
        $students=Student::all();
         $schoolyears=DB::select('SELECT * from school__years where status=1');
        $sections=Section::all();
        $yearlevels=Yearlevel::all();
        return view('registers.create')
        ->with( 'sections',$sections)
        ->with( 'schoolyears',$schoolyears)
        ->with( 'students',$students)
        ->with('yearlevels',$yearlevels)
        ->with('sems',$sems)
        ->with('subjects',$subjects)
        ->with('teacherloads',$teacherloads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'studid' => 'required|max:12|min:12',
            'section' => 'required',   
          
        ]);
        if (DB::table('registrations') 
        //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
       
        ->where('student_id',$request->get('studid') ) 
        
        ->where('section_id',$request->get('section'))->exists()){
     
            return redirect('/registers/create')->with('ror','the student is already registered');
        } 
        if(DB::table('sregistrations') 
        //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
        ->join('sections','sregistrations.section_id','=','sections.id' )
        ->where('student_id',$request->get('studid') ) 
        ->where('sections.semid',$request->get('sem') )
        ->where('section_id',$request->get('section'))->exists()){
     
            return redirect('/registers/create')->with('ror','the student is already registered');
        } 
        
       
        if(DB::table('sregistrations') 
        ->join('sections','sregistrations.section_id','=','sections.id' )
       

       // ->leftJion('school__years','sections.school_year_id','=','school__years.id' )
       
        ->where('student_id',$request->get('studid') ) 
        ->where('sections.semid',$request->get('sem') )
        //->where('section_id',$request->get('section'))
        ->where('sections.school_year_id',$request->get('year') )->exists()){
     
            return redirect('/registers/create')->with('ror','the student is already registered');
        } 
        if(DB::table('registrations') 
        ->join('sections','registrations.section_id','=','sections.id' )

       // ->leftJion('school__years','sections.school_year_id','=','school__years.id' )
       
        ->where('student_id',$request->get('studid') ) 
        
        //->where('section_id',$request->get('section'))
        ->where('sections.school_year_id',$request->get('year') )->exists()){
     
            return redirect('/registers/create')->with('ror','the student is already registered');
        } 
        
        if($request->get('ylid')==5 || $request->get('ylid')==6 ){
            $registers = new Sregistration ;
            $registers ->student_id=$request->get('studid');
            $registers ->Section_id=$request->get('section');
            if($registers->save()){
                $id=$registers->id;
                foreach($request->tid as $A){
                    $data= array('reg_id'=>$id,
                    'sloads'=>$A);
                        Sstudentsubject::insert($data); 
                }
            } 
                    return redirect('/registers/create');
        }
        else{
            $registers = new Registration ;
            $registers ->student_id=$request->get('studid');
            $registers ->Section_id=$request->get('section');
            if($registers->save()){
                $id=$registers->id;
                foreach($request->tid as $A){
                    $data= array('reg_id'=>$id,
                    'teacherload_id'=>$A);
                        Studentsubject::insert($data); 
                }
            } 
                    return redirect('/registers/create');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getstudentname(Request $request)
    {
        
         $sections = DB::table("students")
     
     ->where("id",$request->id)
         //->where("sections.yearlevelid",$request->yearlevelid)

        ->pluck("fname","lname");
          // return $sections;
        return response()->json($sections);
    }
      public function get__sections(Request $request)
    {
        
         $sections = DB::table("sections")
      ->join('section__names','sections.sectionname_id','=','section__names.id' )
     ->where("sections.school_year_id",$request->school_year_id)
         //->where("sections.yearlevelid",$request->yearlevelid)
         
        ->pluck("section__names.name","sections.id");
          // return $sections;
        return response()->json($sections);
    }

    public function get__yearlevels(Request $request)
    {
        $yearlevels = DB::table("sections")
      ->join('yearlevels','sections.yearlevelid','=','yearlevels.id' )
         ->where("sections.school_year_id",$request->school_year_id)
        ->pluck("yearlevels.grade","sections.yearlevelid");
          
       return response()->json($yearlevels);
    }
    public function getsubject(Request $request)
    {
        
         $teacherloads = DB::table("teacherloads")
      ->join('curriculum_subjects','teacherloads.subject_id','=','curriculum_subjects.id' )
     ->where("teacherloads.section_id",$request->section_id)
         //->where("sections.yearlevelid",$request->yearlevelid)
         
        ->pluck("curriculum_subjects.subject","teacherloads.id");
          // return $sections;
        return response()->json($teacherloads);
    }
    public function getsubject2(Request $request)
    {
        
         $sloads = DB::table("sloads")
      ->join('curriculum_subjects','sloads.subject_id','=','curriculum_subjects.id' )
     ->where("sloads.section_id",$request->section_id)
         //->where("sections.yearlevelid",$request->yearlevelid)
        ->pluck("curriculum_subjects.subject","sloads.id");
          // return $sections;
        return response()->json($sloads);
    }
    public function getsubject3(Request $request)
    {
        
         $sloads = DB::table("sloads")
      ->join('curriculum_subjects','sloads.subject_id','=','curriculum_subjects.id' )
      ->join('sections','sloads.section_id','=','sections.id' )
      ->join('school__years','sections.school_year_id','=','school__years.id' )
      ->join('sems','sections.semid','=','sems.id')
      ->join('yearlevels','sections.yearlevelid','=','yearlevels.id' )
     ->where("school__years.status",'=',1)
     ->where("sems.status",'=',1)
     ->where("sections.yearlevelid",$request->yearlevelid)

         //->where("sections.yearlevelid",$request->yearlevelid)
        ->pluck("curriculum_subjects.subject","sloads.id");
          // return $sections;
        return response()->json($sloads);
    }
    public function getyear(Request $request)
    {
        
         $years = DB::table("yearlevels")
     ->where("status",$request->status)
        ->pluck("grade","id");
          // return $sections;
        return response()->json($years);
    }
    public function getjuniorsections(Request $request)
    {
      $sections = DB::table("sections")
      ->join('section__names','sections.sectionname_id','=','section__names.id' )
     
         ->where("sections.yearlevelid",$request->yearlevelid)
         ->where("sections.school_year_id",$request->school_year_id)
       
        ->pluck("section__names.name","sections.id");
        //return $sections;
        return response()->json($sections);

           
    }

}
