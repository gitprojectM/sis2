<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username = 'username';
    protected $redirectTo= '/dashboard';
    protected $guard ='web';
    public function getLogin()

    {
        if (Auth::guard('web')->check())
         {
           return redirect()->route('dashboard');
        }
    	
        return view('login');
    }
    
    public function postLogin(Request $request)

    {
      

    	$auth = Auth::guard('web')->attempt(['username'=>$request->username,'password'=>$request->password,'active'=>1]);
    	if ($auth)
    	 {

    		return redirect()->route('dashboard')->with('success','Successfuly login ');
        }
      
            return redirect()->route('/')->with('ror','Somethings wrong in user ID and password!!');
      
    	
    }
    public function getLogout()
    {
    	Auth:: guard('web')->logout();
    		return redirect()->route('/');
    }

}
   