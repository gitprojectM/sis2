<?php

namespace App\Http\Controllers;
use App\Sem;
use DB;

use Illuminate\Http\Request;

class SemsController extends Controller
{
    public function index()
    { 
        $sems=Sem::all();
        return view('sems.index')->with('sems',$sems);  
    }
    public function update(Request $request,$id)
    {
        $sems=Sem::find($id);
        $sems->status=$request->get('stat'); 
        if($sems->status=$request->get('stat')==0)
       {
        $sems=Sem::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/sems');
       } 
       else{

    
        if (DB::table('sems')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/sems')->with('ror', 'Deactivate first the active semester');
    }
        $sems=Sem::find($id);
        $sems->status=$request->get('stat'); 
         $sems->save(); 
      return redirect('/sems') ->with('success',' successfuly change ');
    }
    }
}
