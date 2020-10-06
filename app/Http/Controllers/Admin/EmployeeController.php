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
use App\Client;
use App\User as User;
use Hash;
use Mail;
use Storage;
use App\Roles;
use App\Department;
use App\Designation;
use App\Employees;
use App\Experiences;
use App\EducationInformation as EducationInformation;


class EmployeeController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $roles = Roles::where('deleted', '0')->get()->all();
        $departments = Department::where('deleted', '0')->get()->all();
        $designations = Designation::where('deleted', '0')->get()->all();

        $data['employees_list'] = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get()->toArray();
    
           
        // dd($data['employees_list']);

        if(!empty($data['employees_list']))
        {
            foreach ($data['employees_list'] as $key => $employees_list) {

                if(!empty($employees_list['profile_image']))

      $data['employees_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$employees_list['profile_image']);
             //   dd( $data['employees'][$key]['profile_image_url']); 
               
                else
                    $data['employees'][$key]['profile_image_url'] = '';
                
            
        }
    }
       

        return view('admin.employees.index', $data, compact('roles', 'departments', 'designations'));
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employeelist()
    {
      
       $roles = Roles::where('deleted', '0')->get()->all();
        $departments = Department::where('deleted', '0')->get()->all();
        $designations = Designation::where('deleted', '0')->get()->all();

        $data['employees_list'] = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get();;
            
                 if(!empty($data['employees_list']))
        {
            foreach ($data['employees_list'] as $key => $employees_list) {

                if(!empty($employees_list['profile_image']))

      $data['employees_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$employees_list['profile_image']);
             //   dd( $data['employees'][$key]['profile_image_url']); 
               
                else
                    $data['employees'][$key]['profile_image_url'] = '';
                
            
        }
    }
       


        return view('admin.employees.employees-list', $data, compact('roles', 'departments', 'designations'));

       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addEmployee(Request $request)
    {
        $employee_data = $request->all();

        //dd($employee_data);

        $rules = [
            'first_name'   => 'required|string|min:2|max:20',
            'last_name'    => 'required|string|min:2|max:8',
            'email'        => 'required|email',
            'phone_no'     => 'required|string',
            'password'     => 'required|string',
            'department' =>   'required|string',
            'designation' => 'required|string',
            'date_of_joining' => 'required',
            'employee_role'    => 'required|string',
            'gender'       => 'required|in:male,female'
        ];

         $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {

            $requestData = $request->all();
            $data['email'] = trim(strtolower($requestData['email']));


            $is_employee_exists = User::where('email', strtolower($requestData['email']) )->first(); 

           // dd($is_employee_exists);

             if(empty($is_employee_exists))
            {
                $add_employee_data = array(
                    'name'  => trim($requestData['first_name'])." ".trim($requestData['last_name']),
                    'email' => strtolower($data['email']),
                    'password' => Hash::make(trim($requestData['password'])),
                    'phone_no' => trim($requestData['phone_no']),
                    'address'  => '',
                    'state'    => '',
                    'country'  => '',
                    'zip_code' => '',
                    'gender'   => trim($requestData['gender']),
                    'date_of_joining' => date('Y-m-d',strtotime(str_replace('/', '-', $requestData['date_of_joining']))),
                    'dob'      => '',
                    'status'   => '1',
                    'deleted'  => '0',
                    'profile_image' => '',
                    'type'    => 'employee'
                );
                $to_email = $data['email'];
                $to_name = 'Employee Registration';
                $add_employee_data['plain_password'] = trim($requestData['password']); 
                Mail::send('admin.emails.EmployeeRegistration', $add_employee_data, function($message) use ($to_name, $to_email) {
                    $message->to(strtolower($to_email), 'Employee Registration')->subject($to_name);
                });

                $add_employee_user = User::create($add_employee_data);
                if($add_employee_user)
                {
                    $employee_add = array(
                        'status'   => '1',
                        'deleted'  => '0',
                        'role_id' => $requestData['employee_role'],
                        'designation_id'  => $requestData['designation'],
                        'department_id'  =>  $requestData['department'],
                        'user_id' => $add_employee_user['id'],
                    );
                    Employees::create($employee_add);
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.employee_add_success'),
                        'ref'     => 'project_add_success',
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
                    'message' => trans('messages.error_employee_email_exists'),
                    'ref'     => 'error_employee_email_exists'
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

  public function getprofile($id)
    {
     
      $data['mydetail']['id'] = $id;

      $data['educations_informations'] = EducationInformation::where(['user_id' => (int) $data['mydetail']['id'],'deleted' => '0'])->get()->toArray();

     //dd($data['educations_informations']);

      //  dd($id);
      //  $data['employee'] = User::where(['id' => (int) $id,'type' => 'employee',"deleted" => '0'])->first();

        $roles = Roles::where('deleted', '0')->get()->all();
        $departments = Department::where('deleted', '0')->get()->all();
        $designations = Designation::where('deleted', '0')->get()->all();
       
$data['employee'] = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['users.id'=> $id, 'type' => 'employee','users.deleted' => '0'])->first();

       // dd($data['employee']);

        if(!empty($data['employee']))
        {
            $data['employee']['employee_data'] = Employees::where(['user_id' => (int) $id,"deleted" => '0'])->first();

            $name = explode(' ',$data['employee']['name']);

            $data['employee']['first_name'] = isset($name[0]) ? $name[0] : "";
            $data['employee']['last_name'] = isset($name[1]) ? $name[1] : "";
            //$data['client']['prefix'] = clientprefix;
           
            if(!empty($data['employee']['profile_image']))
                $data['employee']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$data['employee']['profile_image']);
              //  dd($data['employee']['profile_image_url']);
               
            else
                
                $data['employee']['profile_image_url'] = '';



     $data['experiences'] = Experiences::where(['user_id' => (int) $data['mydetail']['id'],'deleted' => '0'])->get()->toArray();
               
                return view('admin.employees.profile',$data , compact('roles','departments','designations'));
               
        
    }
}


  public function editEmployee(Request $request)
    {
      
            $requestData = $request->all();
         //   dd($requestData);
           //  dd($requestData['profile_image']);

            $is_employee_exists = User::where(['type' => 'employee','id' => (int) $requestData['id'],"deleted" => '0'])->first();
            //dd($is_employee_exists);

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
                        'date_of_joining' => date('Y-m-d',strtotime(str_replace('/', '-', $requestData['date_of_joining'])))
                    );

               /* Profile Image Save if exists Start */
                    if(!empty($requestData['profile_image']))
                    {
                        if (!empty($is_employee_exists['profile_image'])) {
                            Storage::delete(config('app.folder') . '/' . config('app.profileimagesfolder').'/'.$is_employee_exists['profile_image']);
                        }     
                        $filename = User::uploadImage(config('app.folder').'/'.config('app.profileimagesfolder'),$requestData['profile_image'],400);
                        if($filename) {
                            $edit_user_data['profile_image'] = $filename;
                        }
                    }
                    /* Profile Image Save if exists End */
                    //dd($edit_user_data);
                    if(!empty($requestData['password']))
                    {
                        $edit_user_data['password'] = Hash::make(trim($requestData['password']));
                    }
                    $edit_employee = User::where('id', (int) $requestData['id'])->update($edit_user_data);
                    //dd($edit_client);

                    if($edit_employee)
                    {
                        $employee_data = Employees::where(['user_id' => (int) $requestData['id'],"deleted" => '0'])->first();
                        if(empty($employee_data))
                        {
                            $employee_add = array(
                                'status'   => '1',
                                'deleted'  => '0',
                                'role_id' => $requestData['employee_role'],
                                'designation_id'  => $requestData['designation'],
                                'department_id'  =>  $requestData['department'],
                                'user_id' => $add_employee_user['id'],
                                
                            );
                            Employees::create($employee_add);
                        }
                        else
                        {
                            $employee_edit = array(
                               'role_id' => $requestData['employee_role'],
                                'designation_id'  => $requestData['designation'],
                                'department_id'  =>  $requestData['department'],
                            );
                            $edit_employee = Employees::where('id', (int) $employee_data['id'])->update($employee_edit);
                        }
                        $status   = 200;
                        $response = array(
                            'status'  => 'SUCCESS',
                            'message' => trans('messages.employee_edit_success'),
                            'ref'     => 'employee_edit_success',
                        );
                    }
            
            }else
                    {
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
