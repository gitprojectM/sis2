<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    
use App\User;
use DB;
use Auth;
use App\Role;
use App\Student;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        $users=DB::select('SELECT users.id, users.user_id,roles.name,users.name AS uname ,users.active FROM users JOIN roles ON users.role_id=roles.id');
       return view('users.index')->with('users',$users);
    }
    public function changepassword2()
    {
        return view('users.changepassword');
    }
    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

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
        $users =new User;
        $users ->user_id=$request->get('userid');
        $users->name=$request->get('name');
         $users->role_id=$request->get('role');
         $users->username=$request->get('username');
         //'password' => Hash::make($users['password']);
        $users ->password=bcrypt($request->get('password'));
        $users->remember_token=str_random(10);
        $users->save(); 
        return redirect('/users'); 
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
        $roles=Role::all();
        $teachers= DB::select('SELECT * FROM `teachers` WHERE teachers.id=?',["$id"]) ;
        return view('users.create',compact(['teachers','id']))->with('roles',$roles);
    }
    public function edit2($id)
    {
        $student= Student::find($id);
   
        return view('users.studaccount',compact('student','id'));
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
        $sems=User::find($id);
        $sems->active=$request->get('stat'); 
        if($sems->status=$request->get('stat')==0)
       {
        $sems=User::find($id);
        $sems->active=$request->get('stat'); 
         $sems->save(); 
      return redirect('/users');
       } 
       else{

    
        
        $sems=User::find($id);
        $sems->active=$request->get('stat'); 
         $sems->save(); 
      return redirect('/users');
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
