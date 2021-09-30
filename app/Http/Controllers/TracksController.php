<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Track;
use DB;
class TracksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
                 $tracks=Track::all();
        return view('tracks.index')->with('tracks',$tracks);
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
      if (DB::table('tracks')->where('tname',$request->get('name') )->exists()) {
 
        return redirect('/tracks')->with('ror',$request->get('name').' is already exists');
}
         $tracks = new Track ;
        $tracks ->tname=$request->get('name');
        $tracks->save(); 
                return redirect('/tracks')->with('success',$request->get('sy'). ' successfuly added');
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
         $tracks= Track::find($id);
        
        return view('tracks.edit',compact('tracks','id'));
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
          $tracks =Track::find($id) ;
        $tracks ->tname=$request->get('name');
        $tracks->save(); 
                return redirect('/tracks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tracks = Track::find($id);
        
       
        try {
            $tracks->delete();
   }
   catch (\Exception $e) {
       return redirect('/tracks')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/tracks');
   
    }
}
