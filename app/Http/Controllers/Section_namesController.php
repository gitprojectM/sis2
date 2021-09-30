<?php

namespace App\Http\Controllers;
use App\Section_Name;
use Illuminate\Http\Request;
use DB;
class Section_namesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $sectionnames= DB::select('SELECT section__names.id,section__names.name,yearlevels.grade FROM section__names
          LEFT JOIN yearlevels on section__names.yearlevelid=yearlevels.id');
        return view('sectionnames.index')->with('sectionnames',$sectionnames);
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
            'name' => 'required|unique:section__names',
           
             
              ]);
        if (DB::table('section__names') 
        //->leftJion('teachers','sloads.teachers_id','=','teachers.id' )
       
       
        
        ->where('name',$request->get('name'))->exists()){
     
            return redirect('/sectionnames')->with('ror','section name is already exists');
        }
         $sectionnames = new Section_Name ;
        $sectionnames ->name=$request->get('name');
        $sectionnames ->yearlevelid=$request->get('yearlevelid');
        $sectionnames->save(); 
                return redirect('/sectionnames');
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
         $sectionnames= Section_Name::find($id);
        
        return view('sectionnames.edit',compact('sectionnames','id'));
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
         $sectionnames =Section_Name::find($id) ;
        $sectionnames ->name=$request->get('name');
        $sectionnames->save(); 
                return redirect('/sectionnames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $sectionnames = Section_Name::find($id);
        
       
        try {
            $sectionnames->delete();
   }
   catch (\Exception $e) {  
    return redirect('/sectionnames')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/sectionnames');
    }
}
