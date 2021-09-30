<?php 
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Teacherload;
use App\Section;
use App\Subject;
use App\Section_Name; 
use App\School_Year;
use App\Yearlevel;
use App\CurriculumSubject;
use App\Curriculum;
use App\Sload;
use DB;


class TeacherloadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $teacherloads=DB::select('SELECT teacherloads.id,
         teachers.fname,
         teachers.lname,
         curriculum_subjects.subject,
         section__names.name,
          yearlevels.grade 
          FROM teacherloads 
          LEFT JOIN teachers on teacherloads.teachers_id=teachers.id 
          LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id 
          LEFT JOIN sections ON teacherloads.section_id=sections.id 
          LEFT JOIN section__names ON sections.sectionname_id=section__names.id 
          LEFT JOIN school__years ON sections.school_year_id=school__years.id 
          LEFT JOIN sems on sections.semid=sems.id 
          LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
           WHERE school__years.status=1'); 
                    return view('teacherloads.index')->with( 'teacherloads',$teacherloads);
                }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $yearlevels=Yearlevel::all();
           $sems=DB::select('SELECT * from sems where status=1');
        $schoolyears=DB::select('SELECT * from school__years where status=1');
        $curriculumsubjects=DB::select('SELECT `curriculum_subjects`.`id`, `curriculum_subjects`.`subject`, `curricula`.`Cname`
        FROM `curriculum_subjects`, `curricula` WHERE curriculum_subjects.curriculum_id=curricula.id');
         $sections=DB::select('SELECT `sections`.`id`, `section__names`.`name`
            FROM `sections`, `section__names` WHERE sections.sectionname_id=section__names.id');
        $teachers=Teacher::all();
        $curriculums=Curriculum::all();
       // return $subjects;
        return view('teacherloads.create')->with( 'teachers',$teachers) ->with( 'sections',$sections)->with( 'curriculumsubjects',$curriculumsubjects) ->with( 'schoolyears',$schoolyears) ->with('yearlevels',$yearlevels)->with('sems',$sems)->with('curriculums',$curriculums);

    }

    /**
     * Store a newly created resource in storage.
     * @param $exception
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $this->validate($request, [ 
            'teachers_id' => 'required',
            'subject_id' => 'required',
            'section_id' => 'required',
            
            
        ]);

        if (DB::table('teacherloads') 
        //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
       
        ->where('subject_id',$request->get('subject_id') ) 
        
        ->where('section_id',$request->get('section_id'))->exists()){
     
            return redirect('/teacherloads/create')->with('ror','subject and section is already asigned');
        }
        if($request->get('yl')==5 || $request->get('yl')==6 )
        {
            $teacherloads =new Sload;
            $teacherloads->teachers_id=$request->get('teachers_id');
             $teacherloads->subject_id=$request->get('subject_id');
           $teacherloads ->section_id=$request->get('section_id');
             $teacherloads->save();
              return redirect('/teacherloads');
   
        }
        else
        {
            $teacherloads =new Teacherload;
            $teacherloads->teachers_id=$request->get('teachers_id');
             $teacherloads->subject_id=$request->get('subject_id');
           $teacherloads ->section_id=$request->get('section_id');
             $teacherloads->save();
              return redirect('/teacherloads');
        }
          
          


 
   // if($teacherloads){

        // return redirect()->route('teacherloads.create',['Teacherload'=>$teacherloads->id])->with('error','id not exist');
    //}




 
 
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
        $yearlevels=Yearlevel::all();
        $sems=DB::select('SELECT * from sems where status=1');
     $schoolyears=DB::select('SELECT * from school__years where status=1');
     $curriculumsubjects=DB::select('SELECT `curriculum_subjects`.`id`, `curriculum_subjects`.`subject`, `curricula`.`Cname`
     FROM `curriculum_subjects`, `curricula` WHERE curriculum_subjects.curriculum_id=curricula.id');
      $sections=DB::select('SELECT `sections`.`id`, `section__names`.`name`
         FROM `sections`, `section__names` WHERE sections.sectionname_id=section__names.id');
     $teachers=Teacher::all();
     $curriculums=Curriculum::all();

             $loads=DB::select('SELECT teacherloads.id,
              teacherloads.teachers_id,
             teacherloads.subject_id,
              teacherloads.section_id,
             teachers.fname,
             teachers.lname,
             curriculum_subjects.subject,
             section__names.name,
              yearlevels.grade 
              FROM teacherloads 
              LEFT JOIN teachers on teacherloads.teachers_id=teachers.id 
              LEFT JOIN curriculum_subjects ON teacherloads.subject_id=curriculum_subjects.id 
              LEFT JOIN sections ON teacherloads.section_id=sections.id 
              LEFT JOIN section__names ON sections.sectionname_id=section__names.id 
              LEFT JOIN school__years ON sections.school_year_id=school__years.id 
              LEFT JOIN sems on sections.semid=sems.id 
              LEFT JOIN yearlevels ON sections.yearlevelid=yearlevels.id
               WHERE teacherloads.id=?' ,["$id"]);
        return view('teacherloads.edit',compact(['teacherloads','id']))->with( 'teachers',$teachers) ->with( 'sections',$sections)->with( 'curriculumsubjects',$curriculumsubjects) ->with( 'schoolyears',$schoolyears) ->with('yearlevels',$yearlevels)->with('sems',$sems)->with('curriculums',$curriculums)->with('loads',$loads); 
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
        $teacherloads=Teacherload::find($id); 
       // $teacherloads->id=$request->get('class_id');
         $teacherloads->teachers_id=$request->get('tid');
          $teacherloads->subject_id=$request->get('sid');
        $teacherloads ->section_id=$request->get('secid');
        

          $teacherloads->save();
            return redirect('/teacherloads'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacherloads=Teacherload::find($id);
         
        
        try {
            $teacherloads->delete();
   }
   catch (\Exception $e) {
    return redirect('/teacherloads')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/teacherloads');
    }
    public function getstat(Request $request)
    {
        
         $mun = DB::table("yearlevels")
     ->where("id",$request->id)
        ->pluck("status","id");
         
        return response()->json($mun);
    }
    public function getstatus(Request $request)
    {
        
         $mun = DB::table("curricula")
     ->where("status",$request->status)
        ->pluck("Cname","id");
         
        return response()->json($mun);
    }
    public function getmajorid(Request $request)
    {
        
         $mun = DB::table("teachers")
     ->where("id",$request->id)
        ->pluck("majorid","id");
         
        return response()->json($mun);
    }
}
