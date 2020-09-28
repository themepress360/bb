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
use App\EducationInformation;
use App\Employees;


class EducationInformationController extends CommonController
{
    public function save(Request $request)
    {
                   
     
        $rules = [
            'education_informations'      => 'required|Array'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $user = $request->user();
            $information_exists = EducationInformation::where(['user_id' => (int) $user['id'],'deleted' => '0'])->get()->toArray();
            if(!empty($information_exists))
            {
                $delete_education_information = EducationInformation::where('user_id', (int) $user['id'])->update(['deleted' => '1']);
            }
            foreach($requestData['education_informations'] as $key => $education_information)
            {
                $data['institute'] = trim(strtolower($education_information['institute']));
                $data['subject']   = trim(strtolower($education_information['subject']));
                $data['start_date'] = trim(strtolower($education_information['start_date']));
                $data['complete_date'] = trim(strtolower($education_information['complete_date']));
                $data['degree'] = trim(strtolower($education_information['degree']));
                $data['grade'] = trim(strtolower($education_information['grade']));
                $data['deleted'] = '0';
                $data['status']   = '1';
                $data['user_id'] = (int) $user['id'];
                $add_education_information = EducationInformation::create($data);
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.education_information_add_success'),
                    'ref'     => 'education_information_add_success',
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


    public function saveEmpEducation(Request $request)
    {
      
      
      $rules = [
            'education_informations'      => 'required|Array'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $user = $request->emp_id;
            $information_exists = EducationInformation::where(['user_id' => (int) $user,'deleted' => '0'])->get()->toArray();
            if(!empty($information_exists))
            {
                $delete_education_information = EducationInformation::where('user_id',  $user)->update(['deleted' => '1']);
            }
            foreach($requestData['education_informations'] as $key => $education_information)
            {
                $data['institute'] = trim(strtolower($education_information['institute']));
                $data['subject']   = trim(strtolower($education_information['subject']));
                $data['start_date'] = trim(strtolower($education_information['start_date']));
                $data['complete_date'] = trim(strtolower($education_information['complete_date']));
                $data['degree'] = trim(strtolower($education_information['degree']));
                $data['grade'] = trim(strtolower($education_information['grade']));
                $data['deleted'] = '0';
                $data['status']   = '1';
                $data['user_id'] = $user;
                $add_education_information = EducationInformation::create($data);
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.education_information_add_success'),
                    'ref'     => 'education_information_add_success',
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
