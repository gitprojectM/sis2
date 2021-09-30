<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School_Year;
use App\Section;
use App\Section_Name;
use App\Yearlevel;
use App\Track;
use DB;

class SamplesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $sections= Section::all();
        $yearlevels=Yearlevel::all();
        $sems=DB::select('SELECT * from sems where status=1');
     //  $school_years= DB::table("school__years")->pluck("Year","id");
     $school_years=DB::select('SELECT * from school__years where status=1');
        return view('samples.index',compact('school_years',$school_years))->with('yearlevels',$yearlevels)->with('sems',$sems);
           // return $school_years;
        //$countries = DB::table("countries")->pluck("name","id");
            //return view('index',compact('countries'));

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
    public function getyearlevels(Request $request)
    {
        $yearlevels = DB::table("sections")
      ->join('yearlevels','sections.yearlevelid','=','yearlevels.id' )
         ->where("sections.school_year_id",$request->school_year_id)
        ->pluck("yearlevels.grade","sections.yearlevelid");
          
       return response()->json($yearlevels);
    }

   
    public function getsections(Request $request)
    {
      $sections = DB::table("sections")
      ->join('section__names','sections.sectionname_id','=','section__names.id' )
     
         ->where("sections.yearlevelid",$request->yearlevelid)
         ->where("sections.school_year_id",$request->school_year_id)
       
        ->pluck("section__names.name","sections.id");
        //return $sections;
        return response()->json($sections);

           
    }
     public function gettrack(Request $request)
    {
      $sections = DB::table("sections")
      ->join('tracks','sections.trackid','=','tracks.id' )
     
         ->where("sections.yearlevelid",$request->yearlevelid)
         ->where("sections.school_year_id",$request->school_year_id)
        ->pluck("tracks.tname","sections.trackid");
          // return $sections;
        return response()->json($sections);
    }
     public function getsembytrack(Request $request)
    {
      $sections = DB::table("sections")
      ->join('sems','sections.semid','=','sems.id' )
           ->where("sections.trackid",$request->trackid)
         ->where("sections.yearlevelid",$request->yearlevelid)
         ->where("sections.school_year_id",$request->school_year_id)
       
        ->pluck("sems.sem","sections.semid");
          // return $sections;
        return response()->json($sections);

           
    }
     public function getsectionbysem(Request $request)
    {
      $sections = DB::table("sections")
     ->join('section__names','sections.sectionname_id','=','section__names.id' )
         ->where("sections.semid",$request->semid)
         ->where("sections.trackid",$request->trackid)
         ->where("sections.yearlevelid",$request->yearlevelid)
         ->where("sections.school_year_id",$request->school_year_id)
       
             ->pluck("section__names.name","sections.id");
          // return $sections;
        return response()->json($sections);

           
    }
    public function getsubjectbycurriculum(Request $request)
    {
        $curriculumsubjects = DB::table("curriculum_subjects")
        ->where("curriculum_id",$request->curriculum_id)
        ->where("majorid",$request->majorid)
        ->pluck("subject","id");
      return response()->json($curriculumsubjects);
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
}
