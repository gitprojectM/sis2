<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clum;
use DB;
class ClumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clums=Clum::all();
        return view('clums.index')->with('clums',$clums);
    }
    public function get_clum()
    {
        $clums=Clum::all();
        return view('clums.set')->with('clums',$clums);
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
        $this->validate($request, [ 
            'name' => 'required',
            
          
        ]);
      if (DB::table('clums')->where('curriculumname',$request->get('name') )->exists()) {
 
        return redirect('/clums')->with('ror',$request->get('name').' is already exists');
}
         $clums = new Clum;
        $clums ->curriculumname=$request->get('name');
        $clums->save(); 
                return redirect('/clums')->with('success',$request->get('name'). ' successfuly added');
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
        $sems=Clum::find($id);
        $sems->status=$request->get('stat'); 
        if($sems->status=$request->get('stat')==0)
       {
        $sems=Clum::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/set_curriculum');
       } 
       else{

    
        if (DB::table('clums')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/set_curriculum')->with('ror', 'Deactivate first the active school year');
    }
        $sems=Clum::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/set_curriculum') ->with('success',' successfuly change ');
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
        $clums = Clum::find($id);
      
      
       try {
             $clums->delete(); 
    }
    catch (\Exception $e) {
        return redirect('/clums')->with('ror','This item can not be deleted!! ');
    }
    return redirect('/clums');
    }
}
