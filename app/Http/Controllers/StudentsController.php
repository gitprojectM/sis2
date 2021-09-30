<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;
use DB;


class StudentsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $ages=DB::select( "SELECT * , YEAR(CURDATE()) - YEAR(birth_date) AS age FROM students");
        $students=Student::all();
        return view('students.index')->with( 'students',$students)->with('ages',$ages);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    
    {
        $provinces=DB::select('SELECT * FROM `refregion`');
        return view('students.create')->with('provinces',$provinces);  
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StudentRequest $request)
    {
      
       
           
            
            //if (DB::table('students')->where('id',$request->get('id') )->exists()) {
                
                // return redirect('/students/create')->with('errors',$request->get('id').' is already exists');
                //}
                
                
                $student = new Student;
                $student ->id=$request->get('id');
                $student ->fname=$request->get('fname');
                $student ->lname=$request->get('lname');
                $student ->mname=$request->get('mname');
                $student ->sex=$request->get('sex');
                $student ->birth_date=$request->get('birth_date');
                $student ->status=$request->get('status');
                $student ->etnic_group=$request->get('etnic_group');
                $student ->religion=$request->get('religion');
                $student ->street=$request->get('street');
                $student ->barangay=$request->get('barangay');
                $student ->municipality=$request->get('municipality');
                $student ->province=$request->get('province');
                $student ->mothers_tongue=$request->get('mothers_tongue');
                $student ->dialect=$request->get('dialect');
                $student ->schoolid=$request->get('schoolid');
                $student ->grade_level=$request->get('grade_level');
                $student ->school_name=$request->get('school_name');
                $student ->adviser_name=$request->get('adviser_name');
                $student ->father_fname=$request->get('father_fname');
                $student ->father_lname=$request->get('father_lname');
                $student ->father_mname=$request->get('father_mname');
                $student ->mother_fname=$request->get('mother_fname');
                $student ->mother_lname=$request->get('mother_lname');
                $student ->mother_mname=$request->get('mother_mname');
                $student ->guardianfname=$request->get('guardianfname');
                $student ->guardianlname=$request->get('guardianlname');
                $student ->guardianmname=$request->get('guardianmname');
                $student ->relationship=$request->get('relationship');
                $student ->pcontact=$request->get('pcontact');      
               
                
                
                $student->save(); 
                return redirect('/students')->with('success',$request->get('id'). ' successfuly added');
                
                
                
                
                
                
                
            }
            
            
            /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function show($id)
            {
                $students=DB::select("SELECT students.id,students.barangay,students.province,students.municipality,students.fname,students.lname,students.mname,students.sex,students.birth_date,students.status,students.etnic_group,students.religion,students.street,students.mothers_tongue,students.dialect,students.schoolid,students.grade_level,students.school_name,students.adviser_name,students.father_fname,students.father_lname,students.father_mname,students.mother_fname,students.mother_lname,students.mother_mname,students.guardianfname,students.guardianlname,students.guardianmname,students.relationship,students.pcontact, refprovince.provDesc,refcitymun.citymunDesc,refbrgy.brgyDesc FROM students 
                LEFT join refprovince on students.province=refprovince.id
                LEFT JOIN refcitymun on students.municipality=refcitymun.id
                LEFT JOIN refbrgy on students.barangay=refbrgy.id WHERE students.id=?",["$id"]);
                $ages=DB::select( "SELECT * , YEAR(CURDATE()) - YEAR(birth_date) AS age FROM students where id=?",["$id"] );
                $ases=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname  
                FROM studentsubjects 
                left JOIN registrations on studentsubjects.reg_id=registrations.id 
                left JOIN students on registrations.student_id=students.id 
                left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                JOIN teachers on teacherloads.teachers_id=teachers.id 
                left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                JOIN sections on registrations.section_id=sections.id 
                JOIN section__names ON sections.sectionname_id=section__names.id 
                left JOIN school__years ON sections.school_year_id=school__years.id 
                WHERE school__years.status=1 and students.id=?" ,["$id"]);
                 $sases=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname  
                 FROM sstudentsubjects 
                 left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
                 left JOIN students on sregistrations.student_id=students.id 
                 left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                 JOIN teachers on sloads.teachers_id=teachers.id 
                 left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                 JOIN sections on sloads.section_id=sections.id 
                 JOIN section__names ON sections.sectionname_id=section__names.id 
                 left JOIN school__years ON sections.school_year_id=school__years.id 
                 WHERE school__years.status=1 and students.id=?" ,["$id"]);
              
                $fgrades=DB::select("SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                FROM studentsubjects 
               left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                 left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                 left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                 left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                
                   
              
                left JOIN registrations on studentsubjects.reg_id=registrations.id 
                left JOIN students on registrations.student_id=students.id 
                left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                JOIN teachers on teacherloads.teachers_id=teachers.id 
                left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
                 JOIN sections on teacherloads.section_id=sections.id 
                 JOIN section__names ON sections.sectionname_id=section__names.id 
                 left JOIN school__years ON sections.school_year_id=school__years.id 
                 WHERE school__years.status=1 and students.id=?",["$id"]);
                 $sfgrades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                 FROM sstudentsubjects 
                left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                  left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                 
                 left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
                 left JOIN students on sregistrations.student_id=students.id 
                 left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                 JOIN teachers on sloads.teachers_id=teachers.id 
                 left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
                  JOIN sections on sloads.section_id=sections.id 
                  JOIN section__names ON sections.sectionname_id=section__names.id 
                  left JOIN school__years ON sections.school_year_id=school__years.id 
                  left JOIN sems on sections.semid=sems.id
                  WHERE  sems.status=1 AND school__years.status=1 and students.id=?",["$id"]);
                 
                  
                    $studs=DB::select("SELECT yearlevels.grade,yearlevels.status, section__names.name,teachers.fname,teachers.lname 
                    FROM registrations 
                    left JOIN students on registrations.student_id=students.id 
                    JOIN sections on registrations.section_id=sections.id 
                    LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id 
                    LEFT JOIN teachers on sections.teacher_id=teachers.id 
                    JOIN section__names ON sections.sectionname_id=section__names.id 
                    left JOIN school__years ON sections.school_year_id=school__years.id
                    WHERE school__years.status=1 and students.id=?" ,["$id"]);
                     $sstuds=DB::select("SELECT yearlevels.grade,yearlevels.status, section__names.name,teachers.fname,teachers.lname 
                     FROM sregistrations 
                     left JOIN students on sregistrations.student_id=students.id 
                     JOIN sections on sregistrations.section_id=sections.id 
                     LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id 
                     LEFT JOIN teachers on sections.teacher_id=teachers.id 
                     JOIN section__names ON sections.sectionname_id=section__names.id 
                     left JOIN school__years ON sections.school_year_id=school__years.id
                      left JOIN sems on sections.semid=sems.id
                     WHERE  sems.status=1 and school__years.status=1 and students.id=?" ,["$id"]);

                    //record
                    

                    $GradeSevengrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                    FROM studentsubjects 
                   left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                     left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                     left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                     left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                   
                   
                      
                    LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                  
                   
                    LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                    left JOIN registrations on studentsubjects.reg_id=registrations.id
                    LEFT JOIN students on registrations.student_id=students.id
                    LEFT JOIN sections on registrations.section_id=sections.id
                     left JOIN school__years on sections.school_year_id=school__years.id
                   
                     LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                    
                     WHERE  yearlevels.id=1  AND  students.id=?",["$id"]);
                 $GradeEightgrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                 FROM studentsubjects 
                left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                  left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                  left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                  left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                
                
                   
                 LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
               
                
                 LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                 left JOIN registrations on studentsubjects.reg_id=registrations.id
                 LEFT JOIN students on registrations.student_id=students.id
                 LEFT JOIN sections on registrations.section_id=sections.id
                  left JOIN school__years on sections.school_year_id=school__years.id
                
                  LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                 
                  WHERE  yearlevels.id=2  AND  students.id=?",["$id"]);
                     $GradeNinegrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                     FROM studentsubjects 
                    left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                      left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                      left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                      left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                    
                    
                       
                     LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                   
                    
                     LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                     left JOIN registrations on studentsubjects.reg_id=registrations.id
                     LEFT JOIN students on registrations.student_id=students.id
                     LEFT JOIN sections on registrations.section_id=sections.id
                      left JOIN school__years on sections.school_year_id=school__years.id
                    
                      LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                     
                      WHERE  yearlevels.id=3  AND  students.id=?",["$id"]);
                         $GradeTengrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                         FROM studentsubjects 
                        left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                          left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                          left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                          left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                        
                        
                           
                         LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                       
                        
                         LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                         left JOIN registrations on studentsubjects.reg_id=registrations.id
                         LEFT JOIN students on registrations.student_id=students.id
                         LEFT JOIN sections on registrations.section_id=sections.id
                          left JOIN school__years on sections.school_year_id=school__years.id
                        
                          LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                         
                          WHERE  yearlevels.id=4  AND  students.id=?",["$id"]);
                           $GradeEleven1grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                           FROM sstudentsubjects 
                          left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                            left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                            
                           LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                     
                           LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                           left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                           LEFT JOIN students on sregistrations.student_id=students.id
                           LEFT JOIN sections on sregistrations.section_id=sections.id
                            left JOIN school__years on sections.school_year_id=school__years.id
                          
                            LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                           LEFT JOIN sems ON sections.semid=sems.id
                            WHERE sems.id=1 AND  yearlevels.id=5  AND  students.id=?",["$id"]);
                            $GradeEleven2grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                            FROM sstudentsubjects 
                           left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                             left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                             
                            LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                      
                            LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                            left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                            LEFT JOIN students on sregistrations.student_id=students.id
                            LEFT JOIN sections on sregistrations.section_id=sections.id
                             left JOIN school__years on sections.school_year_id=school__years.id
                           
                             LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                            LEFT JOIN sems ON sections.semid=sems.id
                             WHERE sems.id=2 AND  yearlevels.id=5  AND  students.id=?",["$id"]);
                             $Grade121grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                             FROM sstudentsubjects 
                            left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                              left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                              
                             LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                       
                             LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                             left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                             LEFT JOIN students on sregistrations.student_id=students.id
                             LEFT JOIN sections on sregistrations.section_id=sections.id
                              left JOIN school__years on sections.school_year_id=school__years.id
                            
                              LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                             LEFT JOIN sems ON sections.semid=sems.id
                              WHERE sems.id=1 AND  yearlevels.id=6  AND  students.id=?",["$id"]);
                              $Grade122grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                              FROM sstudentsubjects 
                             left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                               left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                               
                              LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                        
                              LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                              left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                              LEFT JOIN students on sregistrations.student_id=students.id
                              LEFT JOIN sections on sregistrations.section_id=sections.id
                               left JOIN school__years on sections.school_year_id=school__years.id
                             
                               LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                              LEFT JOIN sems ON sections.semid=sems.id
                               WHERE sems.id=2 AND  yearlevels.id=6  AND  students.id=?",["$id"]);
                   return view('students.show')
                   ->with('students',$students)
                   ->with('ages',$ages)
                  ->with('ases',$ases)
                  ->with('sases',$sases)
                   ->with('fgrades',$fgrades)
                   ->with('sfgrades',$sfgrades)
                   ->with('sstuds',$sstuds)
                  ->with('studs',$studs)
                  ->with('GradeSevengrades',$GradeSevengrades)
                  ->with('GradeEightgrades',$GradeEightgrades)
                  ->with('GradeNinegrades',$GradeNinegrades)
                  ->with('GradeTengrades',$GradeTengrades)
                  ->with('GradeEleven2grades',$GradeEleven2grades)
                  ->with('GradeEleven1grades',$GradeEleven1grades)
                  ->with('Grade121grades',$Grade121grades)
                  ->with('Grade122grades',$Grade122grades);

                 
                  
                
            } 
            /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function edit($id)
            {
                $provinces=DB::select('SELECT * FROM `refregion`');
                $students=DB::select("SELECT students.id,students.barangay,students.province,students.municipality,students.fname,students.lname,students.mname,students.sex,students.birth_date,students.status,students.etnic_group,students.religion,students.street,students.mothers_tongue,students.dialect,students.schoolid,students.grade_level,students.school_name,students.adviser_name,students.father_fname,students.father_lname,students.father_mname,students.mother_fname,students.mother_lname,students.mother_mname,students.guardianfname,students.guardianlname,students.guardianmname,students.relationship,students.pcontact, refprovince.provDesc,refcitymun.citymunDesc,refbrgy.brgyDesc FROM students 
                LEFT join refprovince on students.province=refprovince.id
                LEFT JOIN refcitymun on students.municipality=refcitymun.id
                LEFT JOIN refbrgy on students.barangay=refbrgy.id WHERE students.id=?",["$id"]);
                // $students = DB::select('SELECT * FROM students where $id = lrn limit 1');
                // return $students;
                return view('students.edit',compact('students','id'))->with('provinces',$provinces);
                // return view('students.edit')->with('student', $student); 
                //  return view('posts.edit')->with('post', $post);
                //$passport = \App\Passport::find($id);
                //return view('edit',compact('passport','id'));
                
                
                
                
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
                $student= Student::find($id);
                $student ->id=$request->get('id');
                $student ->fname=$request->get('fname');
                $student ->lname=$request->get('lname');
                $student ->mname=$request->get('mname');
                $student ->sex=$request->get('sex');
                $student ->birth_date=$request->get('birth_date');
                $student ->status=$request->get('status');
                $student ->etnic_group=$request->get('etnic_group');
                $student ->religion=$request->get('religion');
                $student ->street=$request->get('street');
                $student ->barangay=$request->get('barangay');
                $student ->municipality=$request->get('municipality');
                $student ->province=$request->get('province');
                $student ->mothers_tongue=$request->get('mothers_tongue');
                $student ->dialect=$request->get('dialect');
                $student ->schoolid=$request->get('schoolid');
                $student ->grade_level=$request->get('grade_level');
                $student ->school_name=$request->get('school_name');
                $student ->adviser_name=$request->get('adviser_name');
                $student ->father_fname=$request->get('father_fname');
                $student ->father_lname=$request->get('father_lname');
                $student ->father_mname=$request->get('father_mname');
                $student ->mother_fname=$request->get('mother_fname');
                $student ->mother_lname=$request->get('mother_lname');
                $student ->mother_mname=$request->get('mother_mname');
                $student ->guardianfname=$request->get('guardianfname');
                $student ->guardianlname=$request->get('guardianlname');
                $student ->guardianmname=$request->get('guardianmname');
                $student ->relationship=$request->get('relationship');
                $student ->pcontact=$request->get('pcontact');      
                
                
                $student->save(); 
                return redirect('/students');
            }
            
            /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return \Illuminate\Http\Response
            */
            public function destroy($id)
            {
                $student = Student::find($id);
                
                
                
                try {
                    $student->delete();
                }
                catch (\Exception $e) {
                    return redirect('/students')->with('ror','This item can not be deleted!! ');
                }
                return redirect('/students');
            }
            public function profile(Request $request,$id)
            {   
                if($request->user()->user_id==$id){
                $student=Student::find($id);
                $ages=DB::select( "SELECT * , YEAR(CURDATE()) - YEAR(birth_date) AS age FROM students where id=?",["$id"] );
                $ases=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname  
                FROM studentsubjects 
                left JOIN registrations on studentsubjects.reg_id=registrations.id 
                left JOIN students on registrations.student_id=students.id 
                left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                JOIN teachers on teacherloads.teachers_id=teachers.id 
                left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                JOIN sections on registrations.section_id=sections.id 
                JOIN section__names ON sections.sectionname_id=section__names.id 
                left JOIN school__years ON sections.school_year_id=school__years.id 
                WHERE school__years.status=1 and students.id=?" ,["$id"]);
                 $sases=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname  
                 FROM sstudentsubjects 
                 left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
                 left JOIN students on sregistrations.student_id=students.id 
                 left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                 JOIN teachers on sloads.teachers_id=teachers.id 
                 left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                 JOIN sections on sloads.section_id=sections.id 
                 JOIN section__names ON sections.sectionname_id=section__names.id 
                 left JOIN school__years ON sections.school_year_id=school__years.id 
                 WHERE school__years.status=1 and students.id=?" ,["$id"]);
                  $studs=DB::select("SELECT yearlevels.grade,yearlevels.status, section__names.name,teachers.fname,teachers.lname 
                  FROM registrations 
                  left JOIN students on registrations.student_id=students.id 
                  JOIN sections on registrations.section_id=sections.id 
                  LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id 
                  LEFT JOIN teachers on sections.teacher_id=teachers.id 
                  JOIN section__names ON sections.sectionname_id=section__names.id 
                  left JOIN school__years ON sections.school_year_id=school__years.id
                  WHERE school__years.status=1 and students.id=?" ,["$id"]);
                   $sstuds=DB::select("SELECT yearlevels.grade,yearlevels.status, section__names.name,teachers.fname,teachers.lname 
                   FROM sregistrations 
                   left JOIN students on sregistrations.student_id=students.id 
                   JOIN sections on sregistrations.section_id=sections.id 
                   LEFT JOIN yearlevels on sections.yearlevelid=yearlevels.id 
                   LEFT JOIN teachers on sections.teacher_id=teachers.id 
                   JOIN section__names ON sections.sectionname_id=section__names.id 
                   left JOIN school__years ON sections.school_year_id=school__years.id
                    left JOIN sems on sections.semid=sems.id
                   WHERE  sems.status=1 and school__years.status=1 and students.id=?" ,["$id"]);
                return view('students.profile')
                ->with('student',$student)
                ->with('ages',$ages)
               ->with('ases',$ases)
               ->with('sases',$sases)
               
                ->with('sstuds',$sstuds)
               ->with('studs',$studs);
            } 
            else{
        
                return redirect('noPermission');
        
            }   
            }
            public function enrolled_subject(Request $request,$id)
            {   
                if($request->user()->user_id==$id){
                    $ases=DB::select("SELECT DISTINCT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade,registrations.id 
                    FROM registrations
                    LEFT JOIN studentsubjects on registrations.id=studentsubjects.reg_id
                    LEFT JOIN students on registrations.student_id=students.id
                   
                    left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                   left JOIN teachers on teacherloads.teachers_id=teachers.id 
                    left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                    left JOIN sections on registrations.section_id=sections.id 
                    left JOIN section__names ON sections.sectionname_id=section__names.id 
                    left JOIN school__years ON sections.school_year_id=school__years.id 
                    LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                    WHERE school__years.status=1 and students.id=?" ,["$id"]);
                    $sases=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname  
                    FROM sstudentsubjects 
                    left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
                    left JOIN students on sregistrations.student_id=students.id 
                    left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                    JOIN teachers on sloads.teachers_id=teachers.id 
                    left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                    JOIN sections on sloads.section_id=sections.id 
                    JOIN section__names ON sections.sectionname_id=section__names.id 
                    left JOIN school__years ON sections.school_year_id=school__years.id 
                    WHERE school__years.status=1 and students.id=?" ,["$id"]);
               return view('students.enrolled_subject')->with('sases',$sases) ->with('ases',$ases);
                
            } 
            else{
        
                return redirect('noPermission');
        
            }
            }
            public function studrecord(Request $request,$id)
            {   
                if($request->user()->user_id==$id){
                    $GradeSevengrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                    FROM studentsubjects 
                   left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                     left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                     left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                     left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                   
                   
                      
                    LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                  
                   
                    LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                    left JOIN registrations on studentsubjects.reg_id=registrations.id
                    LEFT JOIN students on registrations.student_id=students.id
                    LEFT JOIN sections on registrations.section_id=sections.id
                     left JOIN school__years on sections.school_year_id=school__years.id
                   
                     LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                    
                     WHERE  yearlevels.id=1  AND  students.id=?",["$id"]);
                 $GradeEightgrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                 FROM studentsubjects 
                left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                  left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                  left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                  left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                
                
                   
                 LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
               
                
                 LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                 left JOIN registrations on studentsubjects.reg_id=registrations.id
                 LEFT JOIN students on registrations.student_id=students.id
                 LEFT JOIN sections on registrations.section_id=sections.id
                  left JOIN school__years on sections.school_year_id=school__years.id
                
                  LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                 
                  WHERE  yearlevels.id=2  AND  students.id=?",["$id"]);
                     $GradeNinegrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                     FROM studentsubjects 
                    left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                      left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                      left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                      left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                    
                    
                       
                     LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                   
                    
                     LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                     left JOIN registrations on studentsubjects.reg_id=registrations.id
                     LEFT JOIN students on registrations.student_id=students.id
                     LEFT JOIN sections on registrations.section_id=sections.id
                      left JOIN school__years on sections.school_year_id=school__years.id
                    
                      LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                     
                      WHERE  yearlevels.id=3  AND  students.id=?",["$id"]);
                         $GradeTengrades=DB::select(" SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                         FROM studentsubjects 
                        left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                          left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                          left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                          left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                        
                        
                           
                         LEFT JOIN teacherloads ON studentsubjects.teacherload_id=teacherloads.id
                       
                        
                         LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id
                         left JOIN registrations on studentsubjects.reg_id=registrations.id
                         LEFT JOIN students on registrations.student_id=students.id
                         LEFT JOIN sections on registrations.section_id=sections.id
                          left JOIN school__years on sections.school_year_id=school__years.id
                        
                          LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                         
                          WHERE  yearlevels.id=4  AND  students.id=?",["$id"]);
                           $GradeEleven1grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                           FROM sstudentsubjects 
                          left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                            left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                            
                           LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                     
                           LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                           left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                           LEFT JOIN students on sregistrations.student_id=students.id
                           LEFT JOIN sections on sregistrations.section_id=sections.id
                            left JOIN school__years on sections.school_year_id=school__years.id
                          
                            LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                           LEFT JOIN sems ON sections.semid=sems.id
                            WHERE sems.id=1 AND  yearlevels.id=5  AND  students.id=?",["$id"]);
                            $GradeEleven2grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                            FROM sstudentsubjects 
                           left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                             left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                             
                            LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                      
                            LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                            left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                            LEFT JOIN students on sregistrations.student_id=students.id
                            LEFT JOIN sections on sregistrations.section_id=sections.id
                             left JOIN school__years on sections.school_year_id=school__years.id
                           
                             LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                            LEFT JOIN sems ON sections.semid=sems.id
                             WHERE sems.id=2 AND  yearlevels.id=5  AND  students.id=?",["$id"]);
                             $Grade121grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                             FROM sstudentsubjects 
                            left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                              left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                              
                             LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                       
                             LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                             left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                             LEFT JOIN students on sregistrations.student_id=students.id
                             LEFT JOIN sections on sregistrations.section_id=sections.id
                              left JOIN school__years on sections.school_year_id=school__years.id
                            
                              LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                             LEFT JOIN sems ON sections.semid=sems.id
                              WHERE sems.id=1 AND  yearlevels.id=6  AND  students.id=?",["$id"]);
                              $Grade122grades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                              FROM sstudentsubjects 
                             left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                               left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                               
                              LEFT JOIN sloads ON sstudentsubjects.sloads=sloads.id
                        
                              LEFT JOIN curriculum_subjects ON sloads.subject_id=curriculum_subjects.id
                              left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id
                              LEFT JOIN students on sregistrations.student_id=students.id
                              LEFT JOIN sections on sregistrations.section_id=sections.id
                               left JOIN school__years on sections.school_year_id=school__years.id
                             
                               LEFT join yearlevels on sections.yearlevelid=yearlevels.id
                              LEFT JOIN sems ON sections.semid=sems.id
                               WHERE sems.id=2 AND  yearlevels.id=6  AND  students.id=?",["$id"]);
               return view('students.record')->with('GradeSevengrades',$GradeSevengrades)
               ->with('GradeEightgrades',$GradeEightgrades)
               ->with('GradeNinegrades',$GradeNinegrades)
               ->with('GradeTengrades',$GradeTengrades)
               ->with('GradeEleven2grades',$GradeEleven2grades)
               ->with('GradeEleven1grades',$GradeEleven1grades)
               ->with('Grade121grades',$Grade121grades)
               ->with('Grade122grades',$Grade122grades);

                
            } 
            else{
        
                return redirect('noPermission');
        
            }
            }
            public function current_grade(Request $request,$id)
            {   
                if($request->user()->user_id==$id){
                    $fgrades=DB::select("SELECT curriculum_subjects.subject,firstgradings.grade as fgrade, secondgradings.grade AS sgrade, thirdgradings.grade as tgrade, fortgradings.grade AS fortgrade
                    FROM studentsubjects 
                   left JOIN firstgradings on firstgradings.studentsubject_id=studentsubjects.id 
                     left JOIN secondgradings on secondgradings.studentsubject_id=studentsubjects.id 
                     left JOIN thirdgradings on thirdgradings.studentsubject_id=studentsubjects.id 
                     left JOIN fortgradings on fortgradings.studentsubject_id=studentsubjects.id 
                    
                       
                  
                    left JOIN registrations on studentsubjects.reg_id=registrations.id 
                    left JOIN students on registrations.student_id=students.id 
                    left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                    JOIN teachers on teacherloads.teachers_id=teachers.id 
                    left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id
                     JOIN sections on teacherloads.section_id=sections.id 
                     JOIN section__names ON sections.sectionname_id=section__names.id 
                     left JOIN school__years ON sections.school_year_id=school__years.id 
                     WHERE school__years.status=1 and students.id=?",["$id"]);
                     $sfgrades=DB::select("SELECT curriculum_subjects.subject,firstquarters.grade as fgrade, secondquarters.grade AS sgrade
                     FROM sstudentsubjects 
                    left JOIN firstquarters on firstquarters.studentsubject_id=sstudentsubjects.id 
                      left JOIN secondquarters on secondquarters.studentsubject_id=sstudentsubjects.id 
                     
                     left JOIN sregistrations on sstudentsubjects.reg_id=sregistrations.id 
                     left JOIN students on sregistrations.student_id=students.id 
                     left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                     JOIN teachers on sloads.teachers_id=teachers.id 
                     left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id
                      JOIN sections on sloads.section_id=sections.id 
                      JOIN section__names ON sections.sectionname_id=section__names.id 
                      left JOIN school__years ON sections.school_year_id=school__years.id 
                      left JOIN sems on sections.semid=sems.id
                      WHERE  sems.status=1 AND school__years.status=1 and students.id=?",["$id"]);
               return view('students.current_grade')   ->with('fgrades',$fgrades)
               ->with('sfgrades',$sfgrades);
                
            } 
            else{
        
                return redirect('noPermission');
        
            }
            }
            public function previewsubject(Request $request,$id)
            {   
                if($request->user()->user_id==$id){
                    $Grade7subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade,registrations.id 
                    FROM registrations
                    LEFT JOIN studentsubjects on registrations.id=studentsubjects.reg_id
                    LEFT JOIN students on registrations.student_id=students.id
                   
                    left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                   left JOIN teachers on teacherloads.teachers_id=teachers.id 
                    left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                    left JOIN sections on registrations.section_id=sections.id 
                    left JOIN section__names ON sections.sectionname_id=section__names.id 
                    left JOIN school__years ON sections.school_year_id=school__years.id 
                    LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                    WHERE yearlevels.id=1 and students.id=?",["$id"]);
                    
                      $Grade8subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade,registrations.id 
                      FROM registrations
                      LEFT JOIN studentsubjects on registrations.id=studentsubjects.reg_id
                      LEFT JOIN students on registrations.student_id=students.id
                     
                      left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                     left JOIN teachers on teacherloads.teachers_id=teachers.id 
                      left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                      left JOIN sections on registrations.section_id=sections.id 
                      left JOIN section__names ON sections.sectionname_id=section__names.id 
                      left JOIN school__years ON sections.school_year_id=school__years.id 
                      LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                      WHERE yearlevels.id=2 and students.id=?",["$id"]);
                       $Grade9subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade,registrations.id 
                       FROM registrations
                       LEFT JOIN studentsubjects on registrations.id=studentsubjects.reg_id
                       LEFT JOIN students on registrations.student_id=students.id
                      
                       left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                      left JOIN teachers on teacherloads.teachers_id=teachers.id 
                       left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                       left JOIN sections on registrations.section_id=sections.id 
                       left JOIN section__names ON sections.sectionname_id=section__names.id 
                       left JOIN school__years ON sections.school_year_id=school__years.id 
                       LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                       WHERE yearlevels.id=3 and students.id=?",["$id"]);
                        $Grade10subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade,registrations.id 
                        FROM registrations
                        LEFT JOIN studentsubjects on registrations.id=studentsubjects.reg_id
                        LEFT JOIN students on registrations.student_id=students.id
                       
                        left JOIN teacherloads on studentsubjects.teacherload_id=teacherloads.id 
                       left JOIN teachers on teacherloads.teachers_id=teachers.id 
                        left JOIN curriculum_subjects on teacherloads.subject_id=curriculum_subjects.id 
                        left JOIN sections on registrations.section_id=sections.id 
                        left JOIN section__names ON sections.sectionname_id=section__names.id 
                        left JOIN school__years ON sections.school_year_id=school__years.id 
                        LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                        WHERE yearlevels.id=4 and students.id=?",["$id"]);
                        $Grade111subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade
                        FROM sregistrations
                        LEFT JOIN sstudentsubjects on sregistrations.id=sstudentsubjects.reg_id
                        LEFT JOIN students on sregistrations.student_id=students.id
                       
                        left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                       left JOIN teachers on sloads.teachers_id=teachers.id 
                        left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                        left JOIN sections on sloads.section_id=sections.id 
                        left JOIN section__names ON sections.sectionname_id=section__names.id 
                        left JOIN school__years ON sections.school_year_id=school__years.id 
                        LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                        LEFT JOIN sems on sections.semid=sems.id
                        WHERE sems.id=1 and yearlevels.id=5 and students.id=?",["$id"]);
                         $Grade112subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade
                         FROM sregistrations
                         LEFT JOIN sstudentsubjects on sregistrations.id=sstudentsubjects.reg_id
                         LEFT JOIN students on sregistrations.student_id=students.id
                        
                         left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                        left JOIN teachers on sloads.teachers_id=teachers.id 
                         left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                         left JOIN sections on sloads.section_id=sections.id 
                         left JOIN section__names ON sections.sectionname_id=section__names.id 
                         left JOIN school__years ON sections.school_year_id=school__years.id 
                         LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                         LEFT JOIN sems on sections.semid=sems.id
                         WHERE sems.id=2 and yearlevels.id=5 and students.id=?",["$id"]);
                          $Grade121subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade
                          FROM sregistrations
                          LEFT JOIN sstudentsubjects on sregistrations.id=sstudentsubjects.reg_id
                          LEFT JOIN students on sregistrations.student_id=students.id
                         
                          left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                         left JOIN teachers on sloads.teachers_id=teachers.id 
                          left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                          left JOIN sections on sloads.section_id=sections.id 
                          left JOIN section__names ON sections.sectionname_id=section__names.id 
                          left JOIN school__years ON sections.school_year_id=school__years.id 
                          LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                          LEFT JOIN sems on sections.semid=sems.id
                          WHERE sems.id=1 and yearlevels.id=6 and students.id=?",["$id"]);
                        
                        $Grade122subjects=DB::select("SELECT curriculum_subjects.subject, section__names.name,teachers.fname,teachers.lname,yearlevels.grade
                        FROM sregistrations
                        LEFT JOIN sstudentsubjects on sregistrations.id=sstudentsubjects.reg_id
                        LEFT JOIN students on sregistrations.student_id=students.id
                       
                        left JOIN sloads on sstudentsubjects.sloads=sloads.id 
                       left JOIN teachers on sloads.teachers_id=teachers.id 
                        left JOIN curriculum_subjects on sloads.subject_id=curriculum_subjects.id 
                        left JOIN sections on sloads.section_id=sections.id 
                        left JOIN section__names ON sections.sectionname_id=section__names.id 
                        left JOIN school__years ON sections.school_year_id=school__years.id 
                        LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
                        LEFT JOIN sems on sections.semid=sems.id
                        WHERE sems.id=2 and yearlevels.id=6 and students.id=?",["$id"]);
               return view('students.previewsubject')->with('Grade7subjects',$Grade7subjects) 
               ->with('Grade8subjects',$Grade8subjects) 
               ->with('Grade9subjects',$Grade9subjects) 
               ->with('Grade10subjects',$Grade10subjects)
               ->with('Grade111subjects',$Grade111subjects)
               ->with('Grade112subjects',$Grade112subjects)
               ->with('Grade121subjects',$Grade121subjects)
               ->with('Grade122subjects',$Grade122subjects)
               ;
                
            } 
            else{
        
                return redirect('noPermission');
        
            }
            }
           
            public function getprovince(Request $request)
    {
        
         $province = DB::table("refprovince")
     ->where("regCode",$request->regCode)
        ->pluck("provDesc","id");
         
        return response()->json($province);
    }
    public function getmun(Request $request)
    {
        
         $mun = DB::table("refcitymun")
     ->where("provCode",$request->provCode)
        ->pluck("citymunDesc","id");
         
        return response()->json($mun);
    }
    public function getbrgy(Request $request)
    {
        
         $mun = DB::table("refbrgy")
     ->where("citymunCode",$request->citymunCode)
        ->pluck("brgyDesc","id");
         
        return response()->json($mun);
    }
    
                   
           
        }
        