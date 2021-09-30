<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use DB;
class CurriculumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $curriculums =DB::select('SELECT curricula.id, curricula.Cname,curricula.course,curricula.Cdescription,clums.curriculumname FROM curricula
         LEFT JOIN clums on curricula.curriculum=clums.id');
        return view('curriculums.index')->with('curriculums',$curriculums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $clums=DB::select('SELECT id  FROM clums WHERE  status=1');
        return view('curriculums.create')->with('clums',$clums);
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
            'Cname' => 'required|unique:curricula',
           
            'Cdescription' => 'required',    
              ]);
              if (DB::table('curricula') 
              //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
             
              ->where('Cname',$request->get('Cname') )
           
              
              
              ->where('Cdescription',$request->get('Cdescription') )->exists()){
           
                  return redirect('/curriculums/create')->with('ror','curriculum a is already exists');
              }
             
 
         $curriculums = new Curriculum;
        $curriculums ->Cname=$request->get('Cname');
        $curriculums ->course=$request->get('course');
        $curriculums ->Cdescription=$request->get('Cdescription');
        $curriculums ->curriculum=$request->get('clum');
        $curriculums->save(); 
      // return $subjects ;
                return redirect('/curriculums');
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
        
        $curriculums= Curriculum::find($id);
        
        return view('curriculums.edit',compact('curriculums','id'));
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
         $curriculums= Curriculum::find($id);       
          $curriculums ->Cname=$request->get('cname');
          $curriculums ->course=$request->get('course');
         $curriculums ->Cdescription=$request->get('cdesc');
        $curriculums->save(); 
   
                return redirect('/curriculums');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $curriculums= Curriculum::find($id);       
       
              
                try {
                    $curriculums-> delete();
           }
           catch (\Exception $e) {
               return redirect('/curriculums')->with('ror','This item can not be deleted!! ');
           }
           return redirect('/curriculums');
           
    }
}
