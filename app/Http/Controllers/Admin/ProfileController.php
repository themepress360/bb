<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class ProfileController extends CommonController
{
	public function index(Request $request)
	{
	    $data['mydetail'] = $request->user();
	    return view('admin.profile.index',$data);
	}
}
