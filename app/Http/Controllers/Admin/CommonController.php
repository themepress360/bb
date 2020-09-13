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
use View;
use App\Setting as Setting;
use App\User as User;


class CommonController extends BaseController
{
	protected $template_folder = 'admin';	

	public function __construct(Request $request)
	{
		$theme= Setting::where(['module' => 'theme','status' => '1','deleted' => '0'])->latest()->first();
        if(!empty($theme))
        {
            $data_images = json_decode($theme['data'],true);
            $data['theme']['website_name'] = $data_images['website_name'];
            $data['theme']['website_logo'] = $data_images['website_logo'];
            $data['theme']['favicon_logo'] = $data_images['favicon_logo'];
            $data['theme']['website_image_url'] = User::image_url(config('app.websiteimagesfolder'),$data_images['website_logo']);
            $data['theme']['favicon_image_url'] = User::image_url(config('app.websiteimagesfolder'),$data_images['favicon_logo']);
        }
        else
        {
            $data['theme']['website_name'] = "";
            $data['theme']['website_image_url'] = '';
            $data['theme']['favicon_image_url'] = '';
            $data['theme']['website_logo'] = "";
            $data['theme']['favicon_logo'] = "";
        }
		View::share('website_data',$data);
		//View::share('admin.share',$data['share']);
	}

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
