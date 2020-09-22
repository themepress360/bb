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
use App\Projects;
use App\Project_members;





class ProjectsController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        
          $clients = Client::where("deleted" , '0' )->get()->all();        
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
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addprojects(Request $request)
    {
        $data = $request->all();
       
       // dd(sizeof($members));

        $rules = [

            'project_title'   => 'required|string|min:2|max:50',
            'clients'    =>  'required',
            'start_date' => 'required',
            'end_date'     => 'required',
            'priority'     => 'required',
            'department' =>   'required',
            'team_leaders' => 'required',
            'team_members' => 'required',
            'description'  => 'required'
        ];

         $validator = Validator::make($request->all(),$rules);

         if (!$validator->fails()) 
        {
            $projectData =  $request->all();
            $project_title = $request['project_title'];
          //  dd($project_title);
            $folder = Storage::makeDirectory('FileManager/' . $project_title);
                   
            $project_data = array(
                'project_title' => $projectData['project_title'],
                'description'   => $projectData['description'],
                'clients'     => $projectData['clients'],
                'start_date'    => $projectData['start_date'],
                'end_date'      => $projectData['end_date'],
                'priority'     =>$projectData['priority'],
                'department'    => $projectData['department'],
             );

              //  dd($projectData['project_file']);

             if(!empty($projectData['project_file'])) {

                $rules = [

                  'project_file'  => 'mimes:gif,png,jpeg,csv,txt,xlx,docs,pdf|max:5120'
                ];

                 $validator = Validator::make($request->all(),$rules);

                 if (!$validator->fails()) 
                     {
                      
                       $filePath = Storage::disk('local')->path('FileManager'. $project_title );

                       //dd($filePath);

                        $file = $request['project_file']->store($filePath);

                       // Projects::Create($project_data);

                      // $path =   storage_path() . 'FileManager/' . $project_title ;


                     }


             }

                   

        }

       
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
