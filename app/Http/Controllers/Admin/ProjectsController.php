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
use App\Tasks;
use App\Projects;
use App\Project_members;
use App\Task_members;
use App\Task_boards;
use App\TaskHistory;
use App\TaskHistoryFileUploads;





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
       //  dd($projects);
         
  $project_members = Projects::join('project_members', 'project_members.project_id','=', 'projects.id')->where('is_members','1')->where('projects.deleted', '0')->get()->toArray();
         // dd($project_members);
         
          
          $clients = Client::where("deleted" , '0' )->get()->all();        
          $departments = Department::where('deleted', '0')->get()->all();
         
         // $roles = Roles::where('deleted', '0')->get()->all();

       //   $team_lead = Employees::join('roles' , 'roles.id', '=' , 'employees.role_id' )->where('role_name' , 'team lead')->get();
     
 $employees = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get();
 
  //  dd($employees);
       
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
              'added_by' => (int) $mydetail['id'] 
            );
            $add_project =  Projects::create($project_data);
            if($add_project){
              $project_id = Projects::where(['project_title' => strtolower($projectData['project_title']) ,"deleted" => '0'])->first();
              $members = explode(",",$projectData['team_members']);
              $leaders = explode(",",$projectData['team_leaders']);
              if(!empty($leaders)){
                for($i=0; $i<sizeof($leaders); $i++ )
                { 
                  $project_leaders = array(   
                    'project_id' => $project_id->id,
                    'user_id' => $leaders[$i],
                    'is_members' => '0',
                    'is_leaders' => '1',
                    'deleted'  => '0',
                    'status'   => '1',
                  );
                  $add_leaders = Project_members::create($project_leaders);
                }
              }
              if(!empty($members)){
                for($i=0; $i<sizeof($members); $i++ ){              
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

    public function getdepartmentmembers(Request $request)
    {
      $rules = [
        'department_id'    => 'required'
      ];

      $validator = Validator::make($request->all(),$rules);

      if (!$validator->fails()) 
      {
        $requestData =  $request->all();
        $custom_validation = Department::getdepartmentmembersValidation($requestData);
        if($custom_validation['status'])
        {
          $mydetail = $request->user();
          
          /* To get all team leads of this departments START */
          $data['team_leads'] = User::select(['roles.role_name as role','users.profile_image as profile_image','users.id as user_id','users.name as name'])->where(['roles.role_name' => 'team lead','employees.department_id' => (int) $requestData['department_id']])->join('employees', 'users.id', '=', 'employees.user_id')->join('roles', 'roles.id', '=', 'employees.role_id')->get()->toArray();
          if(!empty($data['team_leads']))
          {
            foreach ($data['team_leads'] as $key => $team_lead) 
            {
              $data['team_leads'][$key]['profile_image_url'] = "";
                if(!empty($team_lead['profile_image']))
                    $data['team_leads'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$team_lead['profile_image']);
            }
          }
          /* To get all team leads of this departments End */

          /* To get all team members of this departments START */
          $data['team_members'] = User::select(['roles.role_name as role','users.profile_image as profile_image','users.id as user_id','users.name as name'])->where(['roles.role_name' => 'employee','employees.department_id' => (int) $requestData['department_id']])->join('employees', 'users.id', '=', 'employees.user_id')->join('roles', 'roles.id', '=', 'employees.role_id')->get()->toArray();
          
          if(!empty($data['team_members']))
          {
            foreach ($data['team_members'] as $key => $team_member) 
            {
              $data['team_members'][$key]['profile_image_url'] = "";
                if(!empty($team_member['profile_image']))
                    $data['team_members'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$team_member['profile_image']);
            }
          }
          /* To get all team members of this departments End */

          $status   = 200;
          $response = array(
            'status'  => 'SUCCESS',
            'message' => trans('messages.getdepartment_success'),
            'ref'     => 'getdepartment_success',
            'data'    => $data
          );
        }
        else
        {
          $status = 400;
          $response = array(
            'status'  => 'FAILED',
            'message' => $custom_validation['message'],
            'ref'     => $custom_validation['ref']
          );
        }
      }
      else {
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

    public function getprojectmembersleaders(Request $request)
    {
      $rules = [
        'project_id'    => 'required'
      ];

      $validator = Validator::make($request->all(),$rules);

      if (!$validator->fails()) 
      {
        $requestData =  $request->all();
        $custom_validation = Projects::getprojectmembersleadersValidation($requestData);
        if($custom_validation['status'])
        {
          $mydetail = $request->user();
          
          /* To get all team leads and members of this project START */
          
          $data['project_members']  = Project_members::select(['roles.role_name as role','users.profile_image as profile_image','users.id as user_id','users.name as name'])->join('users', 'users.id','=', 'project_members.user_id')->join('employees', 'users.id', '=', 'employees.user_id')->join('roles', 'roles.id', '=', 'employees.role_id')->where(['project_members.project_id' => (int) $requestData['project_id'],'project_members.status' => '1' , 'project_members.deleted' => '0'])->get()->toArray();
          if(!empty($data['project_members']))
          {
            foreach ($data['project_members'] as $key => $project_member) 
            {
              $data['project_members'][$key]['profile_image_url'] = "";
                if(!empty($project_member['profile_image']))
                    $data['project_members'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$project_member['profile_image']);
            }
          }
          /* To get all team leads and members of this project End */

          $status   = 200;
          $response = array(
            'status'  => 'SUCCESS',
            'message' => trans('messages.getprojectmembersleaders_success'),
            'ref'     => 'getprojectmembersleaders_success',
            'data'    => $data
          );
        }
        else
        {
          $status = 400;
          $response = array(
            'status'  => 'FAILED',
            'message' => $custom_validation['message'],
            'ref'     => $custom_validation['ref']
          );
        }
      }
      else {
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
    public function getproject($id)
    {
        $project = Projects::where(['id' => $id , 'deleted'=>'0'])->first();

        $created_by = User::where(['id' => $project->added_by, 'deleted' => '0'])->first();
       
        $project_leaders = Project_members::Select('project_members.*', 'designations.name as designation', 'users.name as user_name', 'roles.role_name as role_name' , 'users.profile_image as profile_image')->join('users' , 'users.id' , "=" , "project_members.user_id" )->join('employees', 'employees.user_id', '=', 'project_members.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->join('roles','roles.id','=','employees.role_id')->where(['project_id'=> $id, 'is_leaders' =>'1', 'project_members.deleted' => '0'])->get();
       // dd($project_leaders);

        $project_members = Project_members::Select('project_members.*', 'designations.name as designation', 'users.name as user_name', 'roles.role_name as role_name', 'users.profile_image as profile_image')->join('users' , 'users.id' , "=" , "project_members.user_id" )->join('employees', 'employees.user_id', '=', 'project_members.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->join('roles','roles.id','=','employees.role_id')->where(['project_id'=> $id, 'is_members' =>'1', 'project_members.deleted' => '0'])->get();

       // dd($project_members);

        $tasks = Tasks::where(['project_id' => $id, 'deleted'=>'0'])->get();

        //($tasks);

         if(!empty($project_leaders) )
        {

            foreach( $project_leaders as $key => $project_leader){

             //   dd($employee->profile_image);

               if(!empty($project_leader->profile_image))

                $project_leader->profile_image = User::image_url(config('app.profileimagesfolder'),$project_leader->profile_image);

           //   dd($employee->profile_image);
            
            else
                     $project_leader->profile_image = '';
           

        }
      }


      if(!empty($project_members) )
        {

            foreach( $project_members as $key => $project_member){

             //   dd($employee->profile_image);

               if(!empty($project_member->profile_image))

                $project_member->profile_image = User::image_url(config('app.profileimagesfolder'),$project_member->profile_image);

           //   dd($employee->profile_image);
            
            else
                     $project_member->profile_image = '';
           

        }
      }


      return view('admin.projects.project-view', compact('project', 'created_by','project_leaders','project_members'));
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
    public function deleteproject(Request $request)
    {
        $id = $request['id'];

        //dd($id);

        $deleted = array(

          'deleted' => '1',

        );
        
        $project_deleted = Projects::where(['id' => $id  , 'deleted' => '0', ])->update($deleted);
        $project_members_deleted = Project_members::where(['project_id' => $id  , 'deleted' => '0', ])->update($deleted);
        $project_task_deleted = Tasks::where(['project_id' => $id  , 'deleted' => '0', ])->update($deleted);
        $project_taskHistory_deleted = TaskHistory::where(['project_id' => $id  , 'deleted' => '0', ])->update($deleted);
        $project_taskHistoryFileupload_deleted = TaskHistoryFileUploads::where(['project_id' => $id  , 'deleted' => '0', ])->update($deleted);

               $status   = 200;
               $response = array(
                'status'  => 'SUCCESS',
                'message' => trans('messages.project_deleted_success'),
                'ref'     => 'project_deleted_success',
               );

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
