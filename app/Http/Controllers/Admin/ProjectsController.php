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
        
 $projects = Projects::join('project_members', 'project_members.project_id','=', 'projects.id')->join('departments', 'departments.id','=',"projects.department")->where('is_leaders','1')->where('projects.deleted', '0')->get();
       //   dd($projects);
         
  $project_members = Projects::join('project_members', 'project_members.project_id','=', 'projects.id')->where('is_members','1')->where('projects.deleted', '0')->get()->toArray();
         // dd($project_members);
         
          
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

           //   dd($employee->profile_image);
            
            else
                     $employee->profile_image = '';
           

        }
      }
    
          return view('admin.projects.index', compact('projects','employees','clients' , 'departments','project_members'));
   }


public function projectlist(){

     $projects = Projects::join('project_members', 'project_members.project_id','=', 'projects.id')->where('is_leaders','1')->where('projects.deleted', '0')->get();
         // dd($projects);
         
  $project_members = Projects::join('project_members', 'project_members.project_id','=', 'projects.id')->where('is_members','1')->where('projects.deleted', '0')->get()->toArray();
         //   dd($projects);
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
    
          return view('admin.projects.projects-list', compact('projects','employees','clients' , 'departments','project_members'));

          

      
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
        // $data = $request->all();
        // $members = explode(",",$data['team_members']);
          
       //   $users = User::whereIn('id' , $members)->get();
         // dd($users);

        //  $emails = [];
        //    foreach($users as $user) {
        //      $emails[] = $user->email;
              //do your thing here
        //    }
        //    print_r($emails);
        //    exit();


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
            $mydetail = $request->user();   
            $project_title = strtolower($projectData['project_title']);
                                
        $is_project_exists = Projects::where(['project_title' => strtolower($projectData['project_title']) ,"deleted" => '0'])->first(); 

       // dd($is_project_exists->id);

            if(empty( $is_project_exists)) {

            $folder = Storage::makeDirectory('FileManager/ProjectFolders/' . ucwords($project_title));
            
            $project_data = array(
                'project_title' => strtolower($projectData['project_title']),
                'description'   => strip_tags($projectData['description']),
                'clients'     => $projectData['clients'],
                'start_date'    => $projectData['start_date'],
                'end_date'      => $projectData['end_date'],
                'priority'     =>$projectData['priority'],
                'department'    => $projectData['department'],
                'deleted'  => '0',
                'status'   => '1',
                'added_by' => (int) $mydetail['id'],
                
             );

             $add_project =  Projects::create($project_data);
              

             if($add_project){

                $project_id = Projects::where(['project_title' => strtolower($projectData['project_title']) ,"deleted" => '0'])->first();

               $members = explode(",",$projectData['team_members']);
               $leaders = explode(",",$projectData['team_leaders']);

               if(!empty($leaders)){

                for($i=0; $i<sizeof($leaders); $i++ ){ 

                    $project_leaders = array(
                   
                   'project_id' => $project_id->id,
                   'user_id' => $leaders[$i],
                   'is_members' => '0',
                   'is_leaders' => '1',
                   'deleted'  => '0',
                   'status'   => '1',

                  );
             //  dd($project_members);
                     $add_leaders = Project_members::create($project_leaders);
                   }
                 }

               if(!empty($members)){
            
               for($i=0; $i<sizeof($members); $i++ ){              

               // dd($members[$i]);

               $project_members = array(
                   
                   'project_id' => $project_id->id,
                   'user_id' => $members[$i],
                   'is_members' => '1',
                   'is_leaders' => '0',
                   'deleted'  => '0',
                   'status'   => '1',

                  );
                 
                     $add_members = Project_members::create($project_members);
                       }
                 }
                 $project_data_email = array(
              'project_title' => strtolower($projectData['project_title']),
              'team_leaders' => $projectData['team_leaders'],
              'team_members' => $projectData['team_members'],
              'added_by' => $mydetail['id']
            );

              Projects::EmailAddProject($project_data_email);
               $status   = 200;
               $response = array(
               'status'  => 'SUCCESS',
               'message' => trans('messages.project_add_success'),
               'ref'     => 'project_add_success',
               );
                $team_leaders = User::whereIn('id' , $members)->get();
                $team_members = User::whereIn('id' , $leaders)->get();
             }else
                {
                    $status = 400;
                    $response = array(
                        'status'  => 'FAILED',
                        'message' => trans('messages.server_error'),
                        'ref'     => 'server_error'
                    );
                }



             if(!empty($projectData['project_file'])) {

                $rules = [

                  'project_file'  => 'mimes:gif,png,jpeg,csv,txt,xlx,docs,pdf|max:5120'
                ];

                 $validator = Validator::make($request->all(),$rules);

                 if (!$validator->fails()) 
                     {
                      
                      $path = 'FileManager/ProjectFolders' . $project_title . '/' ; 
                      $fileName = $request->file('project_file')->getClientOriginalName();
                      $upload = $request->file('project_file')->storeAs($path, $fileName) ;

                     }          
                    
                 } 

            }else
            {
                $status = 400;
                $response = array(
                    'status'  => 'FAILED',
                    'message' => trans('messages.error_project_exists'),
                    'ref'     => 'error_project_exists'
                );  
            }
      
        }else {
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
