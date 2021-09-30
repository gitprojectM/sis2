<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurriculumSubject;
use App\Subject;
use App\Curriculum;
use DB;

class CurriculumSubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $curriculumsubjects=DB::select('SELECT `curriculum_subjects`.`id`,curriculum_subjects.subject, `curricula`.`Cname`, `curricula`.`Cdescription` FROM `curriculum_subjects`, `curricula` WHERE curriculum_subjects.curriculum_id=curricula.id' );
       // return $curriculumsubjects;
        return view('curriculumsubjects.index')->with( 'curriculumsubjects',$curriculumsubjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::all();
        $curriculums=Curriculum::all();
         return view('curriculumsubjects.create')->with('subjects',$subjects)->with('curriculums',$curriculums);
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
            'subject[]' => 'required|unique:curriculum_subjects',
           
            'curriculum_id[]' => 'required',    
              ]);
        if (DB::table('curriculum_subjects')
        ->where('subject[]',$request->get('subject')) 

        ->where('curriculum_id[]',$request->get('curriculum_id') ) ->exists()){
     
 
            return redirect('/curriculumsubjects/create')->with('ror','Subject is already exists');
        }
 
         foreach ($request->subject as $key => $v) {
            $curriculumsubjects =array( 'subject'=>$v,
            'curriculum_id'=>$request->cid[$key]
        );
        CurriculumSubject::insert($curriculumsubjects);  
        }
          
    
        
  
          //$curriculumsubjects->save();
           return redirect('/curriculumsubjects');
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
        $subjects=DB::select('SELECT * FROM `curriculum_subjects`,`curricula` WHERE curriculum_subjects.curriculum_id=curricula.id');
        $curriculums=Curriculum::all();
         $curriculumsubjects=DB::select('SELECT * FROM `curriculum_subjects`,`curricula` WHERE curriculum_subjects.id=? AND curriculum_subjects.curriculum_id=curricula.id',["$id"]);
          return view('curriculumsubjects.edit',compact('curriculumsubjects','id'))->with('curriculumsubjects',$curriculumsubjects)->with('subjects',$subjects)->with('curriculums',$curriculums); 
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
       
       
         $curriculumsubjects = CurriculumSubject::find($id); 
        $curriculumsubjects->subject=$request->get('sid');
         $curriculumsubjects->curriculum_id=$request->get('cid');
  
          $curriculumsubjects->save();
           return redirect('/curriculumsubjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $curriculumsubjects = CurriculumSubject::find($id);
        
       
        try {
            $curriculumsubjects->delete();
   }
   catch (\Exception $e) {
       return redirect('/curriculumsubjects ')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/curriculumsubjects');
    }
}
