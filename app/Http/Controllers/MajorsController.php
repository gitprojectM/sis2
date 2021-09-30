<?php

namespace App\Http\Controllers;
use App\Major;
use DB;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $majors=Major::all();
        return view('majors.index')->with('majors',$majors);
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
      if (DB::table('majors')->where('major',$request->get('name') )->exists()) {
 
        return redirect('/majors')->with('ror',$request->get('name').' is already exists');
}
         $majors = new Major ;
        $majors ->major=$request->get('name');
        $majors->save(); 
                return redirect('/majors')->with('success',$request->get('sy'). ' successfuly added');
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
        $majors= Major::find($id);
        
        return view('majors.edit',compact('majors','id'));
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
        $majors =Major::find($id) ;
        $majors ->major=$request->get('name');
        $majors->save(); 
                return redirect('/majors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $majors = Major::find($id);
        
       
        try {
            $majors->delete();
   }
   catch (\Exception $e) {
       return redirect('/majors')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/majors');
    }
}
