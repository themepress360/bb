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
use App\Client;
use App\User as User;
use Hash;
use Mail;
use Storage;
use App\Roles;
use App\Department;
use App\Designation;
use App\Employees;

class ProfileController extends CommonController
{
	public function index(Request $request)
	{
		

      $id = Auth::user()->id;

       

     // dd($id);

        $data['employee'] = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['users.id'=> $id, 'type' => 'employee','users.deleted' => '0'])->first();



     //   $data['employee'] = User::Select('users.*','departments.prefix', 'departments.name as deptartment_name', 'designations.name as designation_name', 'role_name as role')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->first();

      

       // dd($data['employee']);

       //  dd($data['employee']['profile_image']);
            

        if(!empty($data['employee']))
        {
            
             
            $data['employee']['employee_data'] = Employees::where(['user_id' => (int) $data['employee']['id'],"deleted" => '0'])->first();

            $name = explode(' ',$data['employee']['name']);

            $data['employee']['first_name'] = isset($name[0]) ? $name[0] : "";
            $data['employee']['last_name'] = isset($name[1]) ? $name[1] : "";
           
                     
            if(!empty($data['employee']['profile_image']))


     $data['employee']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$data['employee']['profile_image']);


            //dd($data['employee']['profile_image_url']);
               
           else
                
                $data['employee']['profile_image_url'] = '';
               
                return view('employees.profile.index',$data);
               
        
    }

       
	}


public function updateprofile(Request $request)
    {
      
            $requestData = $request->all();
            //dd($requestData);

         //   dd($requestData['profile_image']);

            $is_employee_exists = User::where(['type' => 'employee','id' => (int) $requestData['id'],"deleted" => '0'])->first();
          
            if(!empty($is_employee_exists))
            {  
           
           $edit_user_data = array(
                        'name'  => trim($requestData['first_name'])." ".trim($requestData['last_name']),
                        'phone_no' => trim($requestData['phone_no']),
                        'address'  => trim($requestData['address']),
                        'state'    => trim($requestData['state']),
                        'country'  => trim($requestData['country']),
                        'zip_code' => trim($requestData['zip_code']),
                        'gender'   => trim($requestData['gender']),
                        'dob' => date('Y-m-d',strtotime(str_replace('/', '-', $requestData['dob'])))
                    );
         
                    
                 /* Profile Image Save if exists Start */
                if(!empty($requestData['profile_image']))
                {
                    if (!empty($is_employee_exists['profile_image'])) {
             Storage::delete(config('app.folder') . '/' . config('app.profileimagesfolder').'/'.$is_employee_exists['profile_image']);
                    }     
             $filename = User::uploadImage(config('app.folder').'/'.config('app.profileimagesfolder'),$requestData['profile_image'],400);
            if($filename) 
                   $edit_user_data['profile_image'] = $filename;
                }
                /* Profile Image Save if exists End */
                
                $edit_profile = User::where('id', (int) $requestData['id'])->update($edit_user_data);

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

              }else {
                        $status = 400;
                        $response = array(
                            'status'  => 'FAILED',
                            'message' => trans('messages.server_error'),
                            'ref'     => 'server_error'
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
