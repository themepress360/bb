<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Request;

class CommonController extends BaseController
{
	protected $template_folder = 'admin';	

	protected function view($template,$vars=array())
	{
		$arr = array_merge($vars,
			array(
				'view'=>$this->template_folder.'.',
				'public'=>'/public/'.$this->template_folder.'/',
				)
			);
		return view($this->template_folder.'.'.$template,$arr)->render();
	}
}
