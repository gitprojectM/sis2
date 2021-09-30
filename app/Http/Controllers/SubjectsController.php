<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $subjects = Subject::all();
        return view('subjects.index')->with('subjects',$subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
             return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (DB::table('school__years')->where('status',$request->get('stat') )->exists()) {
 
            return redirect('/set')->with('ror', 'subject has been exist');
    }
        foreach ($request->desc as $key => $v) {
            $subjects =array( 'description'=>$v);
        Subject::insert($subjects);  
        }
       
       // $subjects ->code=$request->get('subcode');
       //  $subjects ->description=$request->get('desc');
       // $subjects->save(); 
      // return $subjects ;
                return redirect('/subjects');
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
        $subjects= Subject::find($id);
        
        return view('subjects.edit',compact('subjects','id'));
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
            $subjects= Subject::find($id);       
          $subjects ->code=$request->get('subcode');
         $subjects ->description=$request->get('desc');
        $subjects->save(); 
   
                return redirect('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $subjects= Subject::find($id);       
        
                
                try {
                    $subjects-> delete();
           }
           catch (\Exception $e) {
            return redirect('/subjects')->with('ror','This item can not be deleted!! ');
           }
           return redirect('/subjects');
           
               
    }
}
