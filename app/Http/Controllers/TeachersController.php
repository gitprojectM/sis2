<?php 

namespace App\Http\Controllers;
use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;
use App\Teacher;
use App\Position;
use App\Major;
use DB;
class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
       $teachers= DB::select(' SELECT `teachers`.`id`, `teachers`.`fname`, `positions`.`pname`,majors.major , `teachers`.`lname`, `teachers`.`mname`, `teachers`.`sex`
        FROM `teachers` 
        left join `positions` on teachers.position_id=positions.id
        left join majors on teachers.majorid=majors.id');
        return view('teachers.index')->with( 'teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions=Position::all();
        $majors=Major::all();
        return view('teachers.create')->with('positions',$positions)->with('majors',$majors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $teacher =new Teacher;
        $teacher ->id=$request->get('id');
        $teacher->position_id=$request->get('position_id');
        $teacher->majorid=$request->get('majorid');
         $teacher->fname=$request->get('fname');
        $teacher ->lname=$request->get('lname');
        $teacher->mname=$request->get('mname');
        $teacher->sex=$request->get('sex');
         $teacher ->birth_date=$request->get('birth_date');
      

          $teacher->save(); 
                return redirect('/teachers');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachers= DB::select('SELECT teachers.id,teachers.fname,
        teachers.lname,teachers.mname,teachers.sex,
        teachers.birth_date, positions.pname,
       YEAR(CURDATE()) - YEAR(birth_date) AS age 
        FROM `teachers`
         LEFT JOIN positions on teachers.position_id=positions.id 
         
         WHERE teachers.id=?',["$id"]) ;
          $sections= DB::select('SELECT section__names.name FROM sections
          left JOIN section__names on sections.sectionname_id=section__names.id
          LEFT JOIN teachers on sections.teacher_id=teachers.id
          LEFT JOIN school__years on sections.school_year_id=school__years.id
          WHERE school__years.status=1 and teachers.id=?',["$id"]) ;
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
               $steacherloads= DB::select ('SELECT DISTINCT  sloads.id, `teachers`.`fname`,
               `teachers`.`lname`,
                section__names.name,
                 `curriculum_subjects`.`subject`,
                 sems.sem,
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
                  WHERE sems.status=1 and school__years.status=1   and  teachers.id=?',["$id"]);
              $records= DB::select('SELECT teacherloads.id,curriculum_subjects.subject,section__names.name,yearlevels.grade, school__years.Year
              FROM teacherloads
              LEFT JOIN sections on teacherloads.section_id =sections.id
              LEFT JOIN school__years ON sections.school_year_id=school__years.id
              LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
              LEFT JOIN section__names on sections.sectionname_id=section__names.id
              LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id
              LEFT join teachers on teacherloads.teachers_id=teachers.id
              WHERE teachers.id=?',["$id"]);
                $srecords= DB::select('SELECT sloads.id,curriculum_subjects.subject,section__names.name,sems.sem,yearlevels.grade, school__years.Year
                FROM sloads
                LEFT JOIN sections on sloads.section_id =sections.id
                LEFT JOIN school__years ON sections.school_year_id=school__years.id
                LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
                LEFT JOIN section__names on sections.sectionname_id=section__names.id
                LEFT JOIN sems on sections.semid=sems.id
                LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id
                LEFT join teachers on sloads.teachers_id=teachers.id
                WHERE teachers.id=?',["$id"]);
        return view('teachers.show')->with('teachers',$teachers)
        ->with('teacherloads',$teacherloads)
        ->with('steacherloads',$steacherloads)
        ->with('records',$records)
        ->with('srecords',$srecords)
        ->with('sections',$sections);
       // return view('teachers.gradesheet')->with('teachers',$teachers);
    }
    public function record($id)
    {
        $teachers=DB::select('SELECT DISTINCT curriculum_subjects.subject,  teachers.fname,teachers.lname,teachers.mname 
        FROM teacherloads 
        LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id 
        left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
        JOIN sections on teacherloads.section_id=sections.id 
        JOIN section__names ON sections.sectionname_id=section__names.id 
        left JOIN school__years ON sections.school_year_id=school__years.id 
        WHERE teacherloads.id=?',["$id"]);
        $teacherloads= DB::select ('SELECT DISTINCT students.fname,students.lname,students.mname,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
        FROM	studentsubjects
        left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                    left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                    left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                    left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
    
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE studentsubjects.teacherload_id=?',["$id"]);
             
       return view('teachers.record')->with('teacherloads',$teacherloads)->with('teachers',$teachers);
        
       
    }
    public function record2($id)
    {
        $teachers=DB::select('SELECT curriculum_subjects.subject,  teachers.fname,teachers.lname,teachers.mname 
        FROM sloads 
        LEFT JOIN teachers ON sloads.teachers_id=teachers.id 
        left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
        JOIN sections on sloads.section_id=sections.id 
        JOIN section__names ON sections.sectionname_id=section__names.id 
        left JOIN school__years ON sections.school_year_id=school__years.id 
        WHERE sloads.id=?',["$id"]);
        $teacherloads= DB::select ('SELECT DISTINCT students.fname,students.lname,students.mname,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
        FROM	sstudentsubjects
        left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                    left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                   
    
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE sstudentsubjects.sloads=?',["$id"]);
             
       return view('teachers.record2')->with('teacherloads',$teacherloads)->with('teachers',$teachers);
        
       
    }
    public function trecord(Request $request,$id)
    {
        if(DB::table('teacherloads') 
    ->join('teachers','teacherloads.teachers_id','=','teachers.id' )
    ->where('teacherloads.id',$id )
    ->where('teachers.id',$request->user()->user_id ) ->exists()){

        $teachers=DB::select('SELECT DISTINCT curriculum_subjects.subject,  teachers.fname,teachers.lname,teachers.mname 
        FROM teacherloads 
        LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id 
        left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
        JOIN sections on teacherloads.section_id=sections.id 
        JOIN section__names ON sections.sectionname_id=section__names.id 
        left JOIN school__years ON sections.school_year_id=school__years.id 
        WHERE teacherloads.id=?',["$id"]);
        $teacherloads= DB::select ('SELECT DISTINCT students.fname,students.lname,students.mname,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
        FROM	studentsubjects
        left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                    left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                    left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                    left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
    
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE studentsubjects.teacherload_id=?',["$id"]);
             
       return view('teachers.record')->with('teacherloads',$teacherloads)->with('teachers',$teachers);
        }   
       else{
        return redirect('noPermission');
    }
    }
    public function trecord2(Request $request,$id)
    {
        if(DB::table('sloads') 
        ->join('teachers','sloads.teachers_id','=','teachers.id' )
        ->where('sloads.id',$id ) 
        ->where('teachers.id',$request->user()->user_id )->exists()){
        $teachers=DB::select('SELECT curriculum_subjects.subject,  teachers.fname,teachers.lname,teachers.mname 
        FROM sloads 
        LEFT JOIN teachers ON sloads.teachers_id=teachers.id 
        left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
        JOIN sections on sloads.section_id=sections.id 
        JOIN section__names ON sections.sectionname_id=section__names.id 
        left JOIN school__years ON sections.school_year_id=school__years.id 
        WHERE sloads.id=?',["$id"]);
        $teacherloads= DB::select ('SELECT DISTINCT students.fname,students.lname,students.mname,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
        FROM	sstudentsubjects
        left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                    left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                   
    
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE sstudentsubjects.sloads=?',["$id"]);
             
       return view('teachers.record2')->with('teacherloads',$teacherloads)->with('teachers',$teachers);
        }
       else{
        return redirect('noPermission');
    }  
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $majors=Major::all();
         $positions=Position::all();
         $teachers= DB::select(' SELECT *, positions.pname   FROM `teachers` 
         left join `positions` on teachers.position_id=positions.id
         left join majors on teachers.majorid=majors.id WHERE teachers.id=?',["$id`"]) ;
        //return $teachers;
        return view('teachers.edit',compact(['teachers','id']))
        ->with('positions',$positions)
        ->with('majors',$majors);
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
         $teacher =Teacher::find($id);
      
         $teacher->fname=$request->get('fname');
            $teacher->position_id=$request->get('position_id');
            $teacher->majorid=$request->get('majorid');
        $teacher ->lname=$request->get('lname');
        $teacher->mname=$request->get('mname');
        $teacher->sex=$request->get('sex');
         $teacher ->birth_date=$request->get('birth_date');
        
           // return $teacher;
          $teacher->save(); 
                return redirect('/teachers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $teachers = Teacher::find($id);
        
      
        try {
            $teachers->delete();
   }
   catch (\Exception $e) {
    return redirect('/teachers')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/teachers');
    }
    public function gradesheet($id)
    {  
        $sheetnames= DB::select('SELECT DISTINCT curriculum_subjects.subject,teachers.fname,teachers.lname
        FROM	studentsubjects
       
    
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
    $sheets= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,firstgradings.grade 
    FROM studentsubjects 
    left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
   
    left JOIN registrations on studentsubjects.reg_id=registrations.id 
    left JOIN students on registrations.student_id=students.id 
    left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
    LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
    left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
     JOIN sections on teacherloads.section_id=sections.id 
     JOIN section__names ON sections.sectionname_id=section__names.id 
     left JOIN school__years ON sections.school_year_id=school__years.id 
     WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
      $sgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,secondgradings.grade 
      FROM studentsubjects 
      left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
     
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
        $tgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,thirdgradings.grade 
        FROM studentsubjects 
        left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
       
        left JOIN registrations on studentsubjects.reg_id=registrations.id 
        left JOIN students on registrations.student_id=students.id 
        left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
        LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
        left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
         JOIN sections on teacherloads.section_id=sections.id 
         JOIN section__names ON sections.sectionname_id=section__names.id 
         left JOIN school__years ON sections.school_year_id=school__years.id 
         WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
          $fgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,fortgradings.grade 
          FROM studentsubjects 
          left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id
         
          left JOIN registrations on studentsubjects.reg_id=registrations.id 
          left JOIN students on registrations.student_id=students.id 
          left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
          LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
          left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
           JOIN sections on teacherloads.section_id=sections.id 
           JOIN section__names ON sections.sectionname_id=section__names.id 
           left JOIN school__years ON sections.school_year_id=school__years.id 
           WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
            
        return view('teachers.gradesheet')->with('sheets',$sheets)
        ->with('sheetnames',$sheetnames)
        ->with('sgrades',$sgrades)
        ->with('tgrades',$tgrades)
        ->with('fgrades',$fgrades);
        
        //return $sheets;
    } public function gradesheet2($id)
    {  
        $sheetnames= DB::select('SELECT DISTINCT curriculum_subjects.subject,teachers.fname,teachers.lname
        FROM	sstudentsubjects
       
    
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  sloads.id=?',["$id"]);
    $sheets= DB::select('SELECT sstudentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,firstquarters.grade 
    FROM sstudentsubjects 
    left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
   
    left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
    left JOIN students on sregistrations.student_id=students.id 
    left JOIN sloads on sstudentsubjects.sloads=sloads.id 
    LEFT JOIN teachers ON sloads.teachers_id=teachers.id
    left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
     JOIN sections on sloads.section_id=sections.id 
     JOIN section__names ON sections.sectionname_id=section__names.id 
     left JOIN school__years ON sections.school_year_id=school__years.id 
     WHERE school__years.status=1 and  sloads.id=?',["$id"]);
      $sgrades= DB::select('SELECT sstudentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,secondquarters.grade 
      FROM sstudentsubjects 
      left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
     
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  sloads.id=?',["$id"]);
        
        return view('teachers.gradesheet2')->with('sheets',$sheets)
        ->with('sheetnames',$sheetnames)
        ->with('sgrades',$sgrades);
        
        
        //return $sheets;
    }
   
    public function tshow(Request $request, $id)
    {   if($request->user()->user_id==$id){
        $teachers= DB::select('SELECT DISTINCT teachers.id,teachers.fname,teachers.lname,
        teachers.mname,teachers.sex,teachers.birth_date, positions.pname, 
        YEAR(CURDATE()) - YEAR(birth_date) AS age FROM `teachers` 
        LEFT JOIN positions on teachers.position_id=positions.id 
        WHERE teachers.id=?',["$id"]) ;
        $sections= DB::select('SELECT section__names.name FROM sections
        left JOIN section__names on sections.sectionname_id=section__names.id
        LEFT JOIN teachers on sections.teacher_id=teachers.id
        LEFT JOIN school__years on sections.school_year_id=school__years.id
        WHERE school__years.status=1 and teachers.id=?',["$id"]) ;
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
               $steacherloads= DB::select ('SELECT DISTINCT  sloads.id, `teachers`.`fname`,
               `teachers`.`lname`,
                section__names.name,
                 `curriculum_subjects`.`subject`,
                 sems.sem,
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
                  WHERE sems.status=1 and school__years.status=1   and  teachers.id=?',["$id"]);
              $records= DB::select('SELECT teacherloads.id,curriculum_subjects.subject,section__names.name,yearlevels.grade, school__years.Year
              FROM teacherloads
              LEFT JOIN sections on teacherloads.section_id =sections.id
              LEFT JOIN school__years ON sections.school_year_id=school__years.id
              LEFT JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
              LEFT JOIN section__names on sections.sectionname_id=section__names.id
              LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id
              LEFT join teachers on teacherloads.teachers_id=teachers.id
              WHERE teachers.id=?',["$id"]);
                $srecords= DB::select('SELECT sloads.id,curriculum_subjects.subject,section__names.name,sems.sem,yearlevels.grade, school__years.Year
                FROM sloads
                LEFT JOIN sections on sloads.section_id =sections.id
                LEFT JOIN school__years ON sections.school_year_id=school__years.id
                LEFT JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
                LEFT JOIN section__names on sections.sectionname_id=section__names.id
                LEFT JOIN sems on sections.semid=sems.id
                LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id
                LEFT join teachers on sloads.teachers_id=teachers.id
                WHERE teachers.id=?',["$id"]);
        return view('teachers.show')->with('teachers',$teachers)
        ->with('teacherloads',$teacherloads)
        ->with('steacherloads',$steacherloads)
        ->with('records',$records)
        ->with('srecords',$srecords)
        ->with('sections',$sections);;
       // return view('teachers.gradesheet')->with('teachers',$teachers);
    } 
    else{

        return redirect('noPermission');

    }
    }
    public function tgradesheet(Request $request,$id)
    {  
        if(DB::table('teacherloads') 
        ->join('teachers','teacherloads.teachers_id','=','teachers.id' )
        ->where('teacherloads.id',$id )
        ->where('teachers.id',$request->user()->user_id ) ->exists()){
      
        $sheetnames= DB::select('SELECT DISTINCT curriculum_subjects.subject,teachers.fname,teachers.lname
        FROM	studentsubjects
       
    
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
    $sheets= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,firstgradings.grade 
    FROM studentsubjects 
    left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
   
    left JOIN registrations on studentsubjects.reg_id=registrations.id 
    left JOIN students on registrations.student_id=students.id 
    left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
    LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
    left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
     JOIN sections on teacherloads.section_id=sections.id 
     JOIN section__names ON sections.sectionname_id=section__names.id 
     left JOIN school__years ON sections.school_year_id=school__years.id 
     WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
      $sgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,secondgradings.grade 
      FROM studentsubjects 
      left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
     
      left JOIN registrations on studentsubjects.reg_id=registrations.id 
      left JOIN students on registrations.student_id=students.id 
      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
      LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
       JOIN sections on teacherloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
        $tgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,thirdgradings.grade 
        FROM studentsubjects 
        left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
       
        left JOIN registrations on studentsubjects.reg_id=registrations.id 
        left JOIN students on registrations.student_id=students.id 
        left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
        LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
        left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
         JOIN sections on teacherloads.section_id=sections.id 
         JOIN section__names ON sections.sectionname_id=section__names.id 
         left JOIN school__years ON sections.school_year_id=school__years.id 
         WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
          $fgrades= DB::select('SELECT studentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,fortgradings.grade 
          FROM studentsubjects 
          left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id
         
          left JOIN registrations on studentsubjects.reg_id=registrations.id 
          left JOIN students on registrations.student_id=students.id 
          left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
          LEFT JOIN teachers ON teacherloads.teachers_id=teachers.id
          left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
           JOIN sections on teacherloads.section_id=sections.id 
           JOIN section__names ON sections.sectionname_id=section__names.id 
           left JOIN school__years ON sections.school_year_id=school__years.id 
           WHERE school__years.status=1 and  teacherloads.id=?',["$id"]);
            
        return view('teachers.gradesheet')->with('sheets',$sheets)
        ->with('sheetnames',$sheetnames)
        ->with('sgrades',$sgrades)
        ->with('tgrades',$tgrades)
        ->with('fgrades',$fgrades);
       
        //return $sheets;
        }
        else{
            return redirect('noPermission');
        }
    } 

    public function tgradesheet2(Request $request,$id)
    {    if(DB::table('sloads') 
        ->join('teachers','sloads.teachers_id','=','teachers.id' )
        ->where('sloads.id',$id ) 
        ->where('teachers.id',$request->user()->user_id )->exists()){
      
        $sheetnames= DB::select('SELECT DISTINCT curriculum_subjects.subject,teachers.fname,teachers.lname
        FROM	sstudentsubjects
       
    
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  sloads.id=?',["$id"]);
    $sheets= DB::select('SELECT sstudentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,firstquarters.grade 
    FROM sstudentsubjects 
    left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
   
    left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
    left JOIN students on sregistrations.student_id=students.id 
    left JOIN sloads on sstudentsubjects.sloads=sloads.id 
    LEFT JOIN teachers ON sloads.teachers_id=teachers.id
    left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
     JOIN sections on sloads.section_id=sections.id 
     JOIN section__names ON sections.sectionname_id=section__names.id 
     left JOIN school__years ON sections.school_year_id=school__years.id 
     WHERE school__years.status=1 and  sloads.id=?',["$id"]);
      $sgrades= DB::select('SELECT sstudentsubjects.id,students.fname,students.lname,curriculum_subjects.subject,secondquarters.grade 
      FROM sstudentsubjects 
      left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
     
      left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
      left JOIN students on sregistrations.student_id=students.id 
      left JOIN sloads on sstudentsubjects.sloads=sloads.id 
      LEFT JOIN teachers ON sloads.teachers_id=teachers.id
      left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
       JOIN sections on sloads.section_id=sections.id 
       JOIN section__names ON sections.sectionname_id=section__names.id 
       left JOIN school__years ON sections.school_year_id=school__years.id 
       WHERE school__years.status=1 and  sloads.id=?',["$id"]);
        
        return view('teachers.gradesheet2')->with('sheets',$sheets)
        ->with('sheetnames',$sheetnames)
        ->with('sgrades',$sgrades);
        
    }
    else{
        return redirect('noPermission');
    }
    }
   
        //return $sheets;
  

}
