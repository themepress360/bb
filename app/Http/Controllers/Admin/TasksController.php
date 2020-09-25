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
use App\Tasks;
use App\Task_members;
use App\Task_boards;


class TasksController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $projects = Projects::where('deleted','0')->get();

      
       $tasks = Tasks::where('deleted', '0')->get();

       $task_status = Task_boards::where('deleted', '0')->get();
       
       //dd($tasks);
                   
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

        return view('admin.projects.tasks', compact('employees', 'projects','tasks','task_status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTask(Request $request)
    {
       
     //  $data = $request->all();

     //  dd($data);

        $rules = [

            'task_title'   => 'required|string|min:2|max:50',
            'description'  => 'required',
            'due_date'   => 'required',
            'project_id'   => 'required',
            'team_members' => 'required',
           
            
        ];

         $validator = Validator::make($request->all(),$rules);

         if (!$validator->fails()) 
        {

            $taskData =  $request->all();
            $mydetail = $request->user();   
            $task_title = strtolower($taskData['task_title']);

          $is_task_exists = Tasks::where(['task_title' => strtolower($taskData['task_title']) ,"deleted" => '0'])->first(); 

           if(empty( $is_task_exists)) {

                 $task_data = array(
                'task_title' => strtolower($taskData['task_title']),
                'project_id' => $taskData['project_id'],
                'description'   => strip_tags($taskData['description']),
                'due_date'    => $taskData['due_date'],
                'status'  => 'assigned',
                'deleted'  => '0',
                'added_by' => (int) $mydetail['id'],
                
             );

             $add_task =  Tasks::create($task_data);

             if($add_task){

               $task_id = Tasks::where(['task_title' => strtolower($taskData['task_title']) ,"deleted" => '0'])->first();

             // dd($task_id);

                $members = explode(",",$taskData['team_members']);
               if(!empty($members)){
            
               for($i=0; $i<sizeof($members); $i++ ){              

              // dd($members[$i]);

               $task_members = array(
                   
                   'task_id' => $task_id->id,
                   'user_id' => $members[$i],
                   'is_members' => '1',
                   'is_leaders' => '0',
                   'deleted'  => '0',
                   'status'   => '1',

                  );

                //dd($task_members);

                     $add_members = Task_members::create($task_members);
                       }
                 }

               $status   = 200;
               $response = array(
               'status'  => 'SUCCESS',
               'message' => trans('messages.task_add_success'),
               'ref'     => 'task_add_success',
               );

             }
             
             }else
                {
                     $status = 400;
                        $response = array(
                            'status'  => 'FAILED',
                            'message' => trans('messages.error_task_exists'),
                            'ref'     => 'error_task_exists'
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getTask(Request $request)
    {
        
        $task_id = $request->id;

      //  dd($task_id);

        $project_tasks = Tasks::where(['id' => $task_id , 'deleted' =>'0'])->first();

       // dd($project_tasks->task_title);

        return view('admin.projects.tasks', compact('project_tasks'));

    }

    public function gettaskwindow(Request $request)
    {
        $requestData =  $request->all();
        $window_data['task_statuses'] = Task_boards::where('deleted', '0')->get();
        $task = Tasks::where(['deleted' => '0', "id" => (int)$requestData['task_id'] ])->first();
        $window_data['project'] = Projects::where(['deleted' => '0', "id" => (int)$task['project_id'] ])->first();
        $window_data['project']['task'] = $task;

        $task_added_by = User::where(['deleted' => '0', "id" => (int) $task['added_by'] ])->first();
        if(!empty($task_added_by['profile_image']))
            $window_data['project']['task']['assignee_profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$task_added_by['profile_image']);
        else
            $window_data['project']['task']['assignee_profile_image_url'] = '';

        $window_data['project']['task']['assignee_name'] = $task_added_by['name'];

        $task_members = Task_members::where(['deleted' => '0','status'=> '1', "task_id" => (int) $requestData['task_id'] ])->get()->toArray();
        $project_leaders = Project_members::where(['is_leaders' => '1' ,'deleted' => '0','status'=> '1', "project_id" => (int) $task['project_id'] ])->get()->toArray();
        $window_data['project']['task']['followers'] = Tasks::getFollowers($task_members,$project_leaders);
        // print_r("<pre>");
        // print_r($window_data['project']['task']['followers']);
        // exit();
        $data['gettaskwindowhtml'] = view('admin.projects.gettaskwindow',$window_data)->render();
        $status   = 200;
        $response = array(
            'status'  => 'SUCCESS',
            'message' => trans('messages.task_add_success'),
            'ref'     => 'task_add_success',
            'data'    => $data
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTaskStatus(Request $request)
    {
        $status = $request->all();
        dd(strtolower(trim($status['status'])));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
