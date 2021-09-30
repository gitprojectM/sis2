<?php 

namespace App\Http\Controllers;
use App\Position;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $positions=Position::all();
        return view('positions.create')->with('positions',$positions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
        
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pname' => 'required|unique:positions|max:255',
            
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

    
            
        
     
        Position::create([
            'pname' => $request->get('pname'),
            
          ]);
           
        return redirect('/positions/create')->with('success', 'Positon name created successfully.');
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
         $positions= Position::find($id);
        
        return view('positions.edit',compact('positions','id'));
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
         $positions =Position::find($id) ;
        $positions ->pname=$request->get('name');
        $positions->save(); 
                return redirect('/positions/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $positions = Position::find($id);
        
       
    try {
            $positions->delete();
   }
   catch (\Exception $e) {
    return redirect('/positions/create')->with('ror','This item can not be deleted!! ');
   }
   return redirect('/positions/create');
}
}
