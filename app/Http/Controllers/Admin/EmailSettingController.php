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
use App\EmailSetting as EmailSetting;

class EmailSettingController extends CommonController
{
	public function index(Request $request)
	{
		$data['emailconfigure'] =EmailSetting::where(['status' => '1','deleted' => '0'])->latest()->first()->toArray();
		return view('admin.settings.email.email-settings',$data);
	}

	public function emailconfigure(Request $request)
	{
		$rules = [
            'smtp_host'      	=> 'required|string',
            'smtp_user'    		=> 'required|string',
            'smtp_password' 	=> 'required|string',
            'smtp_port' 		=> 'required|string',
            'smtp_security' 	=> 'required|string|in:ssl,tls',
            'smtp_authentication_domain' => 'required|string',
            'smtp_from_email' => 'required|string',
            'smtp_from_name' => 'required|string',
            'type' => 'required|string|in:smtp'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
        	$requestData = $request->all();
			$emailServices =EmailSetting::where(['status' => '1','deleted' => '0'])->latest()->first();
	        $email_data = array(
	        	"smtp_host" => trim($requestData['smtp_host']),
	        	"smtp_user" => trim($requestData['smtp_user']),
	        	"smtp_password" => trim($requestData['smtp_password']),
	        	"smtp_port" => trim($requestData['smtp_port']),
	        	"smtp_security" => trim($requestData['smtp_security']),
	        	"smtp_authentication_domain" => trim($requestData['smtp_authentication_domain']),
                "smtp_from_email" => trim($requestData['smtp_from_email']),
                "smtp_from_name" => trim($requestData['smtp_from_name'])
	        );
	        $data['data'] = json_encode($email_data);
	        $data['type'] = trim(trim($requestData['type']));
	        $data['status'] = '1';
	        $data['deleted'] = '0';
	        if (empty($emailServices)) 
	        	$email_configure = EmailSetting::create($data);
	        else
	        	$email_configure = EmailSetting::where('id', (int) $emailServices['id'])->update($data);
	        if($email_configure)
            {
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.emailconfigure_success'),
                    'ref'     => 'designation_add_success',
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
