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
use App\User as User;

class ProfileController extends CommonController
{
	public function index(Request $request)
	{
	    $data['mydetail'] = $request->user();
	    $name = explode(' ',$data['mydetail']['name']);
	    $data['mydetail']['first_name'] = $name[0];
	    $data['mydetail']['last_name'] = $name[1];
	    if(!empty($data['mydetail']['profile_image']))
	    	$data['mydetail']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$data['mydetail']['profile_image']);
	    else
	    	$data['mydetail']['profile_image_url'] = '';
	    return view('admin.profile.index',$data);
	}
	public function editprofile(Request $request)
	{
		print_r('akber');
		exit();
	}
}
