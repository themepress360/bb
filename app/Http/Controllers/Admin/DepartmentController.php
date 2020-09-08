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
use App\Department;

class DepartmentController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::where(['deleted' => '0'])->get()->toArray();
        return view('admin.employees.departments', compact('departments'));
    }

    public function adddepartment(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:20'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();    
            $data['name'] = trim(strtolower($requestData['name']));
            $data['deleted'] = '0';
            $data['status']   = '1';
            $add_department = Department::create($data);
            if($add_department)
            {
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.department_add_success'),
                    'ref'     => 'department_add_success',
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

    public function editdepartment(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:20',
            'department_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $department = Department::where(['id' => (int) $requestData['department_id'],"deleted" => '0'])->first();
            if(!empty($department))
            {
                
                $requestData = $request->all();    
                $data['name'] = trim(strtolower($requestData['name']));
                
                $edit_department = Department::where('id', (int) $requestData['department_id'])->update($data);
                if($edit_department)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.department_edit_success'),
                        'ref'     => 'department_edit_success',
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
                    'message' => trans('messages.error_invalid_department_id'),
                    'ref'     => 'error_invalid_department_id'
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

    public function deletedepartment(Request $request)
    {
        $rules = [
            'department_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $department = Department::where(['id' => (int) $requestData['department_id'],"deleted" => '0'])->first();
            if(!empty($department))
            {    
                $requestData = $request->all();    
                $data['deleted'] = '1';
                $edit_department = Department::where('id', (int) $requestData['department_id'])->update($data);
                if($edit_department)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.department_deleted_success'),
                        'ref'     => 'department_deleted_success',
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
                    'message' => trans('messages.error_invalid_department_id'),
                    'ref'     => 'error_invalid_department_id'
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
