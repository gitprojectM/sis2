<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Period; 
use DB;

class PeriodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods=Period::all();
        return view('periods.index')->with('periods',$periods);
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
        //
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
        $periods=Period::find($id);
        $periods->status=$request->get('stat'); 
        if($periods->status=$request->get('stat')==0)
       {
        $periods=Period::find($id);
        $periods->status=$request->get('stat'); 
         $periods->save(); 
      return redirect('/periods');
       } 
       else{

    
        if (DB::table('periods')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/periods')->with('ror', 'Deactivate first the active period');
    }
        $periods=Period::find($id);
        $periods->status=$request->get('stat'); 
         $periods->save(); 
      return redirect('/periods') ->with('success',' successfuly change ');
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
        //
    }
}
