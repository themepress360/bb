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
use App\Designation;
use App\Department;

class DesignationController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designations = Designation::select('designations.name','designations.id','departments.name as dept_name','department_id')->where(['designations.deleted' => '0'])->Join('departments', 'departments.id' , '=', 'designations.department_id')->get()->toArray();
        
        $department = Department::select('id','name')->where(['deleted' => '0'])->get()->toArray();
        return view('admin.employees.designations', compact('designations', 'department'));
    }

    public function adddesignation(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'department_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            //dd($requestData);
            $data['name'] = trim(strtolower($requestData['name']));

            $is_department_exists = Designation::where(['name' => $data['name'], "deleted" => '0'])->first();;
            
             // dd( $is_department_exists);

            if(empty($is_department_exists))
            {    
                $data['name'] = trim(strtolower($requestData['name']));
                $data['deleted'] = '0';
                $data['status']   = '1';
                $data['department_id']   = (int) $requestData['department_id'];
                $add_designation = Designation::create($data);
                if($add_designation)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.designation_add_success'),
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
            }
            else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => trans('messages.designation_exists'),
                    'ref'     => 'error_designation_exists'
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

    public function editdesignation(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:20',
            'department_id' => 'required',
            'designation_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $department = Department::where(['id' => (int) $requestData['department_id'],"deleted" => '0'])->first();
            if(!empty($department))
            {
                $designation = Designation::where(['id' => (int) $requestData['designation_id'],"deleted" => '0'])->first();
                if(!empty($designation))
                {
                    $requestData = $request->all();    
                    $data['name'] = trim(strtolower($requestData['name']));
                    $data['department_id']   = (int) $requestData['department_id'];

                    $edit_designation = Designation::where('id', (int) $requestData['designation_id'])->update($data);
                    if($edit_designation)
                    {
                        $status   = 200;
                        $response = array(
                            'status'  => 'SUCCESS',
                            'message' => trans('messages.designation_edit_success'),
                            'ref'     => 'designation_edit_success',
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
                        'message' => trans('messages.error_invalid_designation_id'),
                        'ref'     => 'error_invalid_designation_id'
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

    public function deletedesignation(Request $request)
    {
        $rules = [
            'designation_id' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $designation = Designation::where(['id' => (int) $requestData['designation_id'],"deleted" => '0'])->first();
            if(!empty($designation))
            {    
                $requestData = $request->all();    
                $data['deleted'] = '1';
                $edit_designation = Designation::where('id', (int) $requestData['designation_id'])->update($data);
                if($edit_designation)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.designation_deleted_success'),
                        'ref'     => 'designation_deleted_success',
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
                    'message' => trans('messages.error_invalid_designation_id'),
                    'ref'     => 'error_invalid_designation_id'
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
