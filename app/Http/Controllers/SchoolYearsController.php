<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School_Year;
use DB;

class SchoolYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $schoolyears=School_Year::all();
        return view('schoolyears.index')->with('schoolyears',$schoolyears);
    }

    public function get_sy()
    {
        $schoolyears=School_Year::all();
        return view('schoolyears.set')->with('schoolyears',$schoolyears);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        
        //if($schoolyear) {
          //  return redirect('/schoolyears')->with('success', 'is already added');
            # code...
        //}
        
     // $schoolyear = DB::table('school__years')->where('year', $request->get('sy'))->first();
       
       //DB::table('school__years')->where('Year',$request->get('sy') )->exists();
      
       //return $schoolyear;
      // echo $schoolyear->year;
        
      if (DB::table('school__years')->where('Year',$request->get('sy') )->exists()) {
 
        return redirect('/schoolyears')->with('ror',$request->get('sy').' is already exists');
}

     $schoolyear = new School_Year;
   
       $schoolyear ->Year=$request->get('sy');
        $schoolyear->save();
     return redirect('/schoolyears') ->with('success',$request->get('sy'). ' successfuly added');
          
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
       
        $sems=School_Year::find($id);
        $sems->status=$request->get('stat'); 
        if($sems->status=$request->get('stat')==0)
       {
        $sems=School_Year::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/set');
       } 
       else{

    
        if (DB::table('school__years')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/set')->with('ror', 'Deactivate first the active school year');
    }
        $sems=School_Year::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/set') ->with('success',' successfuly change ');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clums = School_Year::find($id);
       
      
        
        try {
            $clums->delete();
   }
   catch (\Exception $e) {
    return redirect('/schoolyears')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/schoolyears');
    }
    
}
