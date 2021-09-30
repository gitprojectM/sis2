<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speriod;
use DB;
class SperiodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speriods=Speriod::all();
        return view('speriods.index')->with('speriods',$speriods);
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
        $speriods=Speriod::find($id);
        $speriods->status=$request->get('stat'); 
        if($speriods->status=$request->get('stat')==0)
       {
        $speriods=Speriod::find($id);
        $speriods->status=$request->get('stat'); 
         $speriods->save(); 
      return redirect('/speriods');
       } 
       else{

    
        if (DB::table('speriods')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/speriods')->with('ror', 'Deactivate first the active period');
    }
        $speriods=Speriod::find($id);
        $speriods->status=$request->get('stat'); 
         $speriods->save(); 
      return redirect('/speriods') ->with('success',' successfuly change ');
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
