<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
	public function index(Request $request)
	{
		
		return view('employees.dashboard.index');
	}
}
