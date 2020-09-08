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
use Storage;
use Illuminate\Support\Facades\File;

class ProfileController extends CommonController
{
	public function index(Request $request)
	{
	    $data['mydetail'] = $request->user();
	    $name = explode(' ',$data['mydetail']['name']);
	    $data['mydetail']['first_name'] = isset($name[0]) ? $name[0] : "";
	    $data['mydetail']['last_name'] = isset($name[1]) ? $name[1] : "";
	    if(!empty($data['mydetail']['profile_image']))
	    	$data['mydetail']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$data['mydetail']['profile_image']);
	    else
	    	$data['mydetail']['profile_image_url'] = '';
	    return view('admin.profile.index',$data);
	}
	public function editprofile(Request $request)
	{
	    $rules = [
            'first_name'      => 'required|string|min:2|max:20',
            'last_name'       => 'required|string|min:2|max:20',
            'address'         => 'required|string|min:2|max:100',
            'state'           => 'required|string|min:2|max:30',
            'country'         => 'required|string|min:2|max:30',
            'pin_code'        => 'required|string|min:2|max:10',
            'gender'          => 'required|in:male,female',
            'phone_no'        => 'required|string',
            'profile_image'   => 'file|mimes:jpeg,png,jpg|max:5128',
            'user_id'         => 'required|string',
            'dob'             => 'required|string',
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $user = User::where(['id' => (int) $requestData['user_id'],"deleted" => '0'])->first();
            if(!empty($user))
            {
                
                $data['name'] = $requestData['first_name']." ".$requestData['last_name'];
                $data['address'] = $requestData['address'];
                $data['phone_no'] = $requestData['phone_no'];
                $data['state'] = $requestData['state'];
                $data['country'] = $requestData['country'];
                $data['pin_code'] = $requestData['pin_code'];
                $data['gender'] = $requestData['gender'];
                $data['dob'] = date("Y-m-d", strtotime(str_replace('/', '-', $requestData['dob'])));
                
                /* Profile Image Save if exists Start */
                if(!empty($requestData['profile_image']))
                {
                    if (!empty($user['profile_image'])) {
                        Storage::delete(config('app.folder') . '/' . config('app.profileimagesfolder').'/'.$user['profile_image']);
                    }     
                    $filename = User::uploadImage(config('app.folder').'/'.config('app.profileimagesfolder'),$requestData['profile_image'],400);
                    if($filename) 
                        $data['profile_image'] = $filename;
                }
                /* Profile Image Save if exists End */
                
                $edit_profile = User::where('id', (int) $requestData['user_id'])->update($data);
                if($edit_profile)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.profile_edit_success'),
                        'ref'     => 'profile_edit_success',
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
            }
            else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => trans('messages.error_invalid_user_id'),
                    'ref'     => 'error_invalid_user_id'
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
