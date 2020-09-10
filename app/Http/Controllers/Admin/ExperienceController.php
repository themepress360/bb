<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Validator;
use Input;
use Auth;
use Redirect;
use Illuminate\Http\Request;
use Storage;
use Illuminate\Support\Facades\File;
use App\Experiences;

class ExperienceController extends CommonController
{
    public function save(Request $request)
    {
        $rules = [
            'expirences'      => 'required|Array'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $user = $request->user();
            $experiences_exists = Experiences::where(['user_id' => (int) $user['id'],'deleted' => '0'])->get()->toArray();
            if(!empty($experiences_exists))
            {
                $delete_experiences = Experiences::where('user_id', (int) $user['id'])->update(['deleted' => '1']);
            }
            foreach($requestData['expirences'] as $key => $experience)
            {
                $data['company_name'] = trim(strtolower($experience['company_name']));
                $data['location']   = trim(strtolower($experience['location']));
                $data['job_position'] = trim(strtolower($experience['job_position']));
                $data['period_from'] = trim(strtolower($experience['period_from']));
                $data['period_to'] = trim(strtolower($experience['period_to']));
                $data['deleted'] = '0';
                $data['status']   = '1';
                $data['user_id'] = (int) $user['id'];
                $add_experience_information = Experiences::create($data);
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.experience_add_success'),
                    'ref'     => 'experience_add_success',
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

