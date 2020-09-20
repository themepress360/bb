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
use App\Department;
use App\Designation;
use App\Employees;
use App\Roles;


class ProjectsController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        
          $clients = User::where(['type' => 'client', "deleted" => '0' ])->get()->all();        
          $departments = Department::where('deleted', '0')->get()->all();
         
         // $roles = Roles::where('deleted', '0')->get()->all();

       //   $team_lead = Employees::join('roles' , 'roles.id', '=' , 'employees.role_id' )->where('role_name' , 'team lead')->get();
     
 $employees = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get();

        

         if(!empty($employees) )
        {

            foreach( $employees as $key => $employee){

             //   dd($employee->profile_image);

               if(!empty($employee->profile_image))

                $employee->profile_image = User::image_url(config('app.profileimagesfolder'),$employee->profile_image);
            
             else
                     $employee->profile_image = '';

            }

        }
    
          return view('admin.projects.index', compact('employees','clients' , 'departments'));
   }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addmembers(Request $request)
    {
         $id = $request->all();
          $clients = User::where(['type' => 'client', "deleted" => '0' ])->get()->all();        
          $departments = Department::where('deleted', '0')->get()->all();
          $employees = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get();

         $employee = User::where(['id' => $id, 'type' => 'employee','users.deleted' => '0'])->first();
        
        //dd($employee);

        if(!empty($employee) )
        {

          
            //    dd($employee->profile_image);

               if(!empty($employee->profile_image))

                $employee->profile_image = User::image_url(config('app.profileimagesfolder'),$employee->profile_image);

           // dd($employee->profile_image);
            
              else  $employee->profile_image = '';

          

        }

        return view('admin.projects.index', compact('employee','clients','departments', 'employees'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
