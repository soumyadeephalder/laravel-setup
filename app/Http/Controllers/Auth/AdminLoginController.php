<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}
   //  public function showLoginForm()
   //  {
   //      return view('auth.admin-login');
   //  }
   //  public function login(Request $request)
   //  {
   //  	//validate
   //  	$this->validate($request ,[
   //  		'email' => 'required|email',
   //  		'password' => 'required|min:6',
   //  	]);
    	
   //  	//attempt
   //  	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
   //  	{
			// //return redirect()->intended(route('/admin/dashboard'));
			// return redirect('/admin/dashboard');
   //  	}
   //  	else
   //  	{
   //      	//ifsuccessfullredirect
   //      	//unsuccessfull
   //      	return redirect()->back()->withInput($request->only('email','remember'));
   //  	}
   //  }
    public function logout()
    {
        Auth::guard('admin')->logout();

        // return "hi";

        return redirect('/admin');
    }

}
