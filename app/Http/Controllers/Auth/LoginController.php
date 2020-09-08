<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use  Session;

class LoginController extends BaseController
{
	// public function __construct()
	// {
	//     $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
	// }

    public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
    		return Redirect::to('login')
        		->withErrors($validator) // send back all errors to the login form
        		->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
    		// create our user data for the authentication
    		$userdata = array(
        		'email'     => Input::get('email'),
        		'password'  => Input::get('password')
    		);

    		// attempt to do the login
    		if (Auth::attempt($userdata)) {
    			$user = Auth::user();
    			if($user['status'] == 1 && $user['deleted'] == 0)
	        	{
	        		
	        		// validation successful!
	        		// redirect them to the secure section or whatever
	        		// return Redirect::to('secure');
	        		// for now we'll just echo success (even though echoing in a controller is bad)
	        		if($user['type'] == "admin")
	        			return Redirect::to('admin/dashboard');
	        		elseif($user['type'] == "client")
	        			return Redirect::to('client/dashboard');
	        		else
	        			return Redirect::to('employee/dashboard');
	        	}
	        	else
	        	{
	        		return Redirect::back()->withErrors([trans('messages.error_account_status')])->withInput(Input::except('password'));
	        	}
    		} else {        
        		// validation not successful, send back to form 
        		return Redirect::back()->withErrors([trans('messages.error_invalid_credentials')])->withInput(Input::except('password'));
        		//return Redirect::to('login')->withErrors($data);
    		}
		}
	}

	public function show_login()
	{
		return view('auth.login');
	}
	public function doLogout(Request $request)
	{
		//$user =  $request->user();
		//$request->session()->flush();
		//$request->session()->regenerate();
		//print_r("akber");
		//print_r("<br>"."----------");
	    //$user =  $request->user();
	    //print_r($_SESSION);
	    Auth::logout(); // log the user out of our application
	    //$user =  $request->user();
	   
	    
	    return Redirect::to('/login'); // redirect the user to the login screen
	}
}
