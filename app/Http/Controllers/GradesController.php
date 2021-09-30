<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Grade;
use App\Firstgrading;
use App\Secondgrading;
use App\Thirdgrading;
use App\Fourtgrading;
use App\Firstquarter;
use App\Secondquarter;
use App\Sgrade;
use DB;
class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers= DB::select(' SELECT DISTINCT `teachers`.`id`, `teachers`.`fname`, `teachers`.`lname`, `teachers`.`mname`
         FROM studentsubjects
         left join teacherloads on studentsubjects.teacherload_id=teacherloads.id
         left join teachers on teacherloads.teachers_id=teachers.id  
         left JOIN sections on teacherloads.section_id=sections.id
         left join school__years on sections.school_year_id=school__years.id 
         where school__years.status=1  ');
        return view('grades.index')->with( 'teachers',$teachers);
    } 
    public function teacherload(Request $request,$id)
    {
      if($request->user()->user_id==$id){
        $teacherloads= DB::select ('SELECT DISTINCT  teacherloads.id, `teachers`.`fname`,
         `teachers`.`lname`,
          section__names.name,
           `curriculum_subjects`.`subject`,
           yearlevels.grade,
           teacherloads.subject_id
            FROM studentsubjects
            left join teacherloads on studentsubjects.teacherload_id=teacherloads.id
            left JOIN sections on teacherloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
            LEFT JOIN section__names on sections.sectionname_id=section__names.id 
            LEFT JOIN `teachers` on teacherloads.teachers_id=teachers.id 
            LEFT join yearlevels on sections.yearlevelid=yearlevels.id
            left join school__years on sections.school_year_id=school__years.id
            WHERE school__years.status=1 and  teachers.id=?',["$id"]) ;
             $sloads= DB::select ('SELECT DISTINCT  sloads.id, `teachers`.`fname`,
             `teachers`.`lname`,
              section__names.name,
               `curriculum_subjects`.`subject`,
               yearlevels.grade,
               sloads.subject_id
                FROM sstudentsubjects
                left join sloads on sstudentsubjects.sloads=sloads.id
                left JOIN sections on sloads.section_id=sections.id 
                LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                LEFT JOIN section__names on sections.sectionname_id=section__names.id 
                LEFT JOIN `teachers` on sloads.teachers_id=teachers.id 
                LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                left join school__years on sections.school_year_id=school__years.id
                left join sems on sections.semid=sems.id       
                WHERE sems.status=1 and school__years.status=1   and  teachers.id=?',["$id"]) ;
            $teachers=Teacher::find($id);
        return view('grades.show')->with('teacherloads',$teacherloads)->with('teachers',$teachers)->with('sloads',$sloads);
    } 
    else{

        return redirect('noPermission');

    }
 }
  
    public function teacherinputgrade(Request $request,$id)
    {
     
    if(DB::table('teacherloads') 
    ->join('teachers','teacherloads.teachers_id','=','teachers.id' )
    ->where('teacherloads.id',$id )
    ->where('teachers.id',$request->user()->user_id ) ->exists()){
        $periods=DB::select('SELECT * from periods where status=1');
        $loads=DB::select('SELECT DISTINCT  studentsubjects.id,registrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
        FROM studentsubjects
        RIGHT join registrations on studentsubjects.reg_id=registrations.id 
        LEFT JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id
        left JOIN sections on teacherloads.section_id=sections.id 
        LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
        LEFT JOIN students on registrations.student_id=students.id
        left join school__years on sections.school_year_id=school__years.id
        WHERE school__years.status=1 and  studentsubjects.teacherload_id=?',["$id"]);
         // return $loads; 
          return view('grades.showsubject')->with('loads',$loads)->with('periods',$periods);
        }  
    }
    public function steacherinputgrade(Request $request,$id)
    {
     
    if(DB::table('sloads') 
    ->join('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sloads.id',$id ) 
    ->where('teachers.id',$request->user()->user_id )->exists()){
        $speriods=DB::select('SELECT * from speriods where status=1');
        $sloads=DB::select('SELECT DISTINCT sstudentsubjects.id,sregistrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
        FROM sstudentsubjects RIGHT join sregistrations on sstudentsubjects.reg_id=sregistrations.id 
        LEFT JOIN sloads on sstudentsubjects.sloads=sloads.id 
        left JOIN sections on sloads.section_id=sections.id 
        LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
        LEFT JOIN students on sregistrations.student_id=students.id 
        left join school__years on sections.school_year_id=school__years.id 
        WHERE school__years.status=1 and sstudentsubjects.sloads=?',["$id"]);
         // return $loads; 
          return view('grades.sshowsubject')->with('sloads',$sloads)->with('speriods',$speriods);
        }  
    }
    public function individualinputgrade(Request $request,$id)
    {
     
    if(DB::table('sloads') 
    ->join('teachers','sloads.teachers_id','=','teachers.id' )
    ->where('sloads.id',$id ) 
    ->where('teachers.id',$request->user()->user_id )->exists()){
        $speriods=DB::select('SELECT * from speriods where status=1');
        $sloads=DB::select('SELECT DISTINCT sstudentsubjects.id,sregistrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
        FROM sstudentsubjects RIGHT join sregistrations on sstudentsubjects.reg_id=sregistrations.id 
        LEFT JOIN sloads on sstudentsubjects.sloads=sloads.id 
        left JOIN sections on sloads.section_id=sections.id 
        LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
        LEFT JOIN students on sregistrations.student_id=students.id 
        left join school__years on sections.school_year_id=school__years.id 
        WHERE school__years.status=1 and sstudentsubjects.sloads=?',["$id"]);
         // return $loads; 
          return view('grades.tssshowsubject')->with('sloads',$sloads)->with('speriods',$speriods);
        }  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $status=$request->get('pid');
        $grade=$request->get('grade.*');
      
      

     

     if($status==1){
        foreach ($request->ssid as $key => $v){
            $this->validate($request, [ 
                'grade.*' => 'required',    
            ]);
           
            Firstgrading::updateOrCreate(
                ['studentsubject_id'=>$v ],
                [  'grade'=>$request->grade[$key]]
            );
           
            }
            return back()->with('success', 'You have succesfully input grades'); 

     }
 
   

    else if($status==2){
        foreach ($request->ssid as $key => $v){
            $this->validate($request, [ 
                'grade.*' => 'required',    
            ]);
           
            Secondgrading::updateOrCreate(
                ['studentsubject_id'=>$v ],
                [  'grade'=>$request->grade[$key]]
            );
           
            }
            return back()->with('success', 'You have succesfully input grades'); 

     }
     else if($status==3){
        foreach ($request->ssid as $key => $v){
            $this->validate($request, [ 
                'grade.*' => 'required',    
            ]);
           
            Thirdgrading::updateOrCreate(
                ['studentsubject_id'=>$v ],
                [  'grade'=>$request->grade[$key]]
            );
           
            }
            return back()->with('success', 'You have succesfully input grades'); 

     }
     else if($status==4){
        foreach ($request->ssid as $key => $v){
            $this->validate($request, [ 
                'grade.*' => 'required',    
            ]);
           
            Fourtgrading::updateOrCreate(
                ['studentsubject_id'=>$v ],
                [  'grade'=>$request->grade[$key]]
            );
           
            }
            return back()->with('success', 'You have succesfully input grades'); 

     }
       /* foreach ($request->ssid as $key => $v){
            $this->validate($request, [ 
                'grade.*' => 'required',    
            ]);
           
            Grade::updateOrCreate(
                ['studentsubject_id'=>$v ],
                [  'grade'=>$request->grade[$key]]
            );
           
            }
            return back()->with('success', 'You have succesfully input grades'); */

       
    }

    public  function store2(Request $request)
    {  
    
        $status=$request->get('pid');

        if($status==1){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Firstgrading::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
      
   
       else if($status==2){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Secondgrading::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
        else if($status==3){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Thirdgrading::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
        else if($status==4){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Fourtgrading::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
          

      
        
          
    }
    public function sstore(Request $request)
    {
        
        $status=$request->get('pid');

        if($status==1){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Firstquarter::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
      
   
       else if($status==2){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Secondquarter::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
        
    }
    public function sstore2(Request $request)
    {
        $status=$request->get('pid');

        if($status==1){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Firstquarter::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
        }
      
   
       else if($status==2){
           foreach ($request->ssid as $key => $v){
               $this->validate($request, [ 
                   'grade.*' => 'required',    
               ]);
              
               Secondquarter::updateOrCreate(
                   ['studentsubject_id'=>$v ],
                   [  'grade'=>$request->grade[$key]]
               );
              
               }
               return back()->with('success', 'You have succesfully input grades'); 
   
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

        $teacherloads= DB::select ('SELECT DISTINCT  teacherloads.id, `teachers`.`fname`,
         `teachers`.`lname`,
          section__names.name,
           `curriculum_subjects`.`subject`,
           yearlevels.grade,
           teacherloads.subject_id
            FROM studentsubjects 
            left join teacherloads on studentsubjects.teacherload_id=teacherloads.id
            left JOIN sections on teacherloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
            LEFT JOIN section__names on sections.sectionname_id=section__names.id 
            LEFT JOIN `teachers` on teacherloads.teachers_id=teachers.id 
            LEFT join yearlevels on sections.yearlevelid=yearlevels.id
            left join school__years on sections.school_year_id=school__years.id
            left join sems on sections.semid=sems.id   
            WHERE school__years.status=1   and  teachers.id=?',["$id"]);
              $sloads= DB::select ('SELECT DISTINCT  sloads.id, `teachers`.`fname`,
              `teachers`.`lname`,
               section__names.name,
                `curriculum_subjects`.`subject`,
                yearlevels.grade,
                sloads.subject_id
                 FROM sstudentsubjects
                 left join sloads on sstudentsubjects.sloads=sloads.id
                 left JOIN sections on sloads.section_id=sections.id 
                 LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                 LEFT JOIN section__names on sections.sectionname_id=section__names.id 
                 LEFT JOIN `teachers` on sloads.teachers_id=teachers.id 
                 LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                 left join school__years on sections.school_year_id=school__years.id
                 left join sems on sections.semid=sems.id       
                 WHERE sems.status=1 and school__years.status=1   and  teachers.id=?',["$id"]) ;
            $teachers=Teacher::find($id);
        return view('grades.show')->with('teacherloads',$teacherloads)->with('teachers',$teachers)->with('sloads',$sloads);

    }

    public function showsubject($id)
    { 
            $periods=DB::select('SELECT * from periods where status=1');
            $loads=DB::select('SELECT DISTINCT  studentsubjects.id,registrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
            FROM studentsubjects
            RIGHT join registrations on studentsubjects.reg_id=registrations.id 
            LEFT JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id
            left JOIN sections on teacherloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
            LEFT JOIN students on registrations.student_id=students.id
            left join school__years on sections.school_year_id=school__years.id
            WHERE school__years.status=1 and  studentsubjects.teacherload_id=?',["$id"]);
             // return $loads;
              return view('grades.showsubject')->with('loads',$loads)->with('periods',$periods);


    }
    public function individualshowsubject($id)
    { 
            $speriods=DB::select('SELECT * from periods where status=1');
            $sloads= DB::select('SELECT DISTINCT  studentsubjects.id,registrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
            FROM studentsubjects
            RIGHT join registrations on studentsubjects.reg_id=registrations.id 
            LEFT JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id
            left JOIN sections on teacherloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
            LEFT JOIN students on registrations.student_id=students.id
            left join school__years on sections.school_year_id=school__years.id
            WHERE school__years.status=1 and  studentsubjects.id=?',["$id"]);
             // return $loads;
              return view('grades.tssshowsubject')->with('sloads',$sloads)->with('speriods',$speriods);


    }
    public function individualshowsubject2($id)
    { 
            $speriods=DB::select('SELECT * from speriods where status=1');
            $sloads= DB::select('SELECT DISTINCT  sstudentsubjects.id,sregistrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
            FROM sstudentsubjects
            RIGHT join sregistrations on sstudentsubjects.reg_id=sregistrations.id 
            LEFT JOIN sloads on sstudentsubjects.sloads=sloads.id
            left JOIN sections on sloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
            LEFT JOIN students on sregistrations.student_id=students.id
            left join school__years on sections.school_year_id=school__years.id
            WHERE school__years.status=1 and  sstudentsubjects.id=?',["$id"]);
             // return $loads;
              return view('grades.tssshowsubject2')->with('sloads',$sloads)->with('speriods',$speriods);


    }
    public function sshowsubject($id)
    { 
            $speriods=DB::select('SELECT * from speriods where status=1');
            $sloads=DB::select('SELECT DISTINCT  sstudentsubjects.id,sregistrations.student_id, students.fname, students.lname,curriculum_subjects.subject 
            FROM sstudentsubjects
            RIGHT join sregistrations on sstudentsubjects.reg_id=sregistrations.id 
            LEFT JOIN sloads on sstudentsubjects.sloads=sloads.id
            left JOIN sections on sloads.section_id=sections.id 
            LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
            LEFT JOIN students on sregistrations.student_id=students.id
            left join school__years on sections.school_year_id=school__years.id
            left join sems on sections.semid=sems.id
            WHERE school__years.status=1 and sems.status=1 and sstudentsubjects.sloads=?',["$id"]);
             // return $loads;
              return view('grades.sshowsubject')->with('sloads',$sloads)->with('speriods',$speriods);


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
}
