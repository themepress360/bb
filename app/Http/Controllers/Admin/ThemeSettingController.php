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
use App\Setting as Setting;
use Illuminate\Support\Facades\File;
use Storage;
use App\User;

class ThemeSettingController extends CommonController
{
	public function index(Request $request)
	{
        $data = [];
		$data['theme'] = Setting::where(['module' => 'theme','status' => '1','deleted' => '0'])->latest()->first();
        if(!empty($data['theme']))
        {
            $data_images = json_decode($data['theme']['data'],true);
            $data['theme']['website_name'] = $data_images['website_name'];
            $data['theme']['website_logo'] = $data_images['website_logo'];
            $data['theme']['website_image_url'] = User::image_url(config('app.websiteimagesfolder'),$data_images['website_logo']);
        }
        else
        {
            $data['theme']['website_name'] = "";
            $data['theme']['website_image_url'] = '';
            $data['theme']['website_logo'] = "";
        }
        // print_r("<pre>");
        // print_r($data);
        // exit();
        return view('admin.settings.theme-settings.theme-settings',$data);
	}

    public function addthemesetting(Request $request)
    {
        $rules = [
            'module'         => 'required|string|in:theme',
            'website_name'   => 'required|string|min:2|max:50',
            'website_logo'   => 'file|mimes:jpeg,png,jpg|max:5128'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData  = $request->all();
            $themesetting = Setting::where(['module' => 'theme',"deleted" => '0','status' => '1'])->first();
            $website_data = array(
                "status"       => '1',
                "deleted"      => '0',
                "module"       => trim($requestData['module'])
            );
            
            
            if(empty($themesetting))
                $folder_create = Storage::makeDirectory(config('app.folder').'/websitelogo', 777, true, true);
            /* Website Image Save if exists Start */
            if(!empty($themesetting))
                    $data = json_decode($themesetting['data'],true);
            if(!empty($requestData['website_logo']))
            {
                
                if (!empty($data['website_logo'])) {
                    Storage::delete(config('app.folder') . '/' . config('app.websiteimagesfolder').'/'.$data['website_logo']);
                }     
                $websitefilename = User::uploadImage(config('app.folder').'/'.config('app.websiteimagesfolder'),$requestData['website_logo'],400);
                if($websitefilename) 
                    $data['website_logo'] = $websitefilename;
            }
            /* Website Image Save if exists End */

            $data['website_name'] = trim($requestData['website_name']);
            $website_data['data'] = json_encode($data);
            if(!empty($themesetting))
                $theme_setting = Setting::where('id', (int) $themesetting['id'])->update($website_data);
            else
                $theme_setting = Setting::create($website_data);
             if($theme_setting)
            {
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.theme_setting_success'),
                    'ref'     => 'theme_setting_success',
                );
            }
            else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => trans('messages.server_error'),
                    'ref'     => 'server_error'
                );
            }
        } else {
            $status = 400;
            $response = array(
                'status'  => 'FAILED',
                'message' => $validator->messages()->first(),
                'ref'     => 'missing_parameters',
            );
        }
        $data = array_merge(
            [
                "code" => $status,
                "message" =>$response['message']
            ],
            $response
        );
        array_walk_recursive($data, function(&$item){if(is_numeric($item) || is_float($item) || is_double($item)){$item=(string)$item;}});
        return \Response::json($data,200);
    }
}
