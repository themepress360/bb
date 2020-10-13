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
use App\TaskHistory;
use App\TaskHistoryFileUploads;

class TasksController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      // $projects = Projects::where('deleted','0')->get();

       $projects = Projects::join('departments', 'departments.id','=',"projects.department")->where('projects.deleted', '0')->get();

       // dd($projects);
      
       $tasks = Tasks::where('deleted', '0')->get();

       $task_status = Task_boards::where('deleted', '0')->get();
     //  dd($tasks);

      //  $employees = User::Select('users.*','departments.prefix', 'departments.name as department_name', 'designations.name as designation_name' , 'role_name as role', 'employees.department_id', 'employees.designation_id', 'employees.role_id')->join('employees' , 'employees.user_id' , '=' ,'users.id')->join('departments','departments.id', '=', 'employees.department_id')->join('designations', 'designations.id' , '=' , 'employees.designation_id')->join('roles' , 'roles.id', '=', 'employees.role_id')->where(['type' => 'employee','users.deleted' => '0'])->get();

        $employees = User::where('deleted','0')->get();

       
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
      $rules = [
        'task_title'   => 'required|string|min:2|max:50',
        'description'  => 'required',
        'due_date'   => 'required',
        'project_id'   => 'required',
        'team_members' => 'required',
        'priority' => 'required'    
      ];
      $validator = Validator::make($request->all(),$rules);
      if (!$validator->fails()) 
      {
        $taskData =  $request->all();
        $custom_validation = Tasks::addTaskValidation($taskData);
        if($custom_validation['status'])
        {    
            $mydetail = $request->user();   
            $task_title = strtolower($taskData['task_title']);
            $is_task_exists = Tasks::where(['task_title' => strtolower($taskData['task_title']) ,"deleted" => '0'])->first(); 
            if(empty( $is_task_exists)) 
            {
              $members = explode(",",$taskData['team_members']);    
              $task_data = array(
                'task_title' => strtolower($taskData['task_title']),
                'project_id' => $taskData['project_id'],
                'description'   => strip_tags($taskData['description']),
                'priority'   => strip_tags($taskData['priority']),
                'due_date'    => $taskData['due_date'],
                'status'  => 'assigned',
                'deleted'  => '0',
                'added_by' => (int) $mydetail['id'],
                'assign_to' => !empty($members[0]) ? (int) $members[0] : 0 
              );
              $project = Projects::where(['id' => (int) $taskData['project_id'] ,"deleted" => '0'])->first();
              if (!file_exists(config('app.folder').'/'.config('app.filemanagerfolder').'/'.$project['project_title'])) {
                  $project_folder_create = Storage::makeDirectory(config('app.folder').'/'.config('app.filemanagerfolder').'/'.$project['project_title'], 777, true, true);
                 
              }
              $folder_create = Storage::makeDirectory(config('app.folder').'/'.config('app.filemanagerfolder').'/'.$project['project_title'].'/'.strtolower($taskData['task_title']), 777, true, true);

              $add_task =  Tasks::create($task_data);
              if($add_task)
              {    
                /* Task History Start */
                $task_data = array(
                  'task_id' => (int) $add_task['id'], 
                  'project_id' => (int) $taskData['project_id'],
                  'user_id' => (int) $mydetail['id'],
                  'attachment_name' => "",
                  'is_attachment' => '0',
                  'description' => $mydetail['name']." created task",
                  'type' => 'create_task',  
                );
                TaskHistory::addtaskhistory($task_data);
                /* Task History End */
                $task_id = Tasks::where(['task_title' => strtolower($taskData['task_title']) ,"deleted" => '0'])->first();
                if(!empty($members))
                {
                  for($i=0; $i<sizeof($members); $i++ )
                  {              
                    $assign_user = User::where(['id' => (int) $members[$i] ,"deleted" => '0'])->first();
                    /* Task History Start */
                    $task_data = array(
                      'task_id' => (int) $add_task['id'], 
                      'project_id' => (int) $taskData['project_id'],
                      'user_id' => (int) $mydetail['id'],
                      'attachment_name' => "",
                      'is_attachment' => '0',
                      'description' => $mydetail['name']." assigned to ".$assign_user['name'],
                      'type' => 'assign_task',  
                    );
                    TaskHistory::addtaskhistory($task_data);
                    /* Task History End */
                    $task_members = array( 
                     'task_id' => $task_id->id,
                     'user_id' => $members[$i],
                     'is_members' => '1',
                     'is_leaders' => '0',
                     'deleted'  => '0',
                     'status'   => '1',
                    );
                    $add_members = Task_members::create($task_members);
                  }
                }
                $task_data_email = array(
                  'task_title'   => strtolower($task_id['task_title']),
                  'description'  => $task_id['description'],
                  'due_date'     => $task_id['due_date'],
                  'priority'     => $task_id['priority'],
                  'team_members' => $taskData['team_members'],
                  'mydetail'     => $mydetail,
                  'assign_to'    => $add_task['assign_to'],
                  'project'      => $project
                );
                Tasks::EmailAddTask($task_data_email);
                $status   = 200;
                $response = array(
                 'status'  => 'SUCCESS',
                 'message' => trans('messages.task_add_success'),
                 'ref'     => 'task_add_success',
                );
              }
            }
            else
            {
              $status = 400;
              $response = array(
                'status'  => 'FAILED',
                'message' => trans('messages.error_task_exists'),
                'ref'     => 'error_task_exists'
              );  
            }
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

        //dd($requestData);
        $window_data['task_statuses'] = Task_boards::where('deleted', '0')->get();
      
              
        $task = Tasks::where(['deleted' => '0', "id" => (int)$requestData['task_id'] ])->first();
        $window_data['project'] = Projects::where(['deleted' => '0', "id" => (int)$task['project_id'] ])->first();
        $window_data['project']['task'] = $task;

        $task_status_color = Task_boards::where(["task_board_name"=> $task->status, 'deleted' => '0'])->first();

         // dd($task_status_color->task_board_color);

        if($task['assign_to'] != 0 )
        {
            $task_added_by = User::where(['deleted' => '0', "id" => (int) $task['assign_to'] ])->first();
            if(!empty($task_added_by['profile_image']))
                $window_data['project']['task']['assign_to_profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$task_added_by['profile_image']);
            else
                $window_data['project']['task']['assign_to_profile_image_url'] = '';

            $window_data['project']['task']['assign_to_name'] = $task_added_by['name'];
        }
        else
        {
            $window_data['project']['task']['assign_to_name'] = '';
            $window_data['project']['task']['assign_to_profile_image_url'] = '';
        }
        
        /* Task History Start */
        $task_histories = TaskHistory::where(['task_id' => (int)$requestData['task_id'] ,'deleted' => '0','status'=> '1', "project_id" => (int) $task['project_id'] ])->get()->toArray();
        if(!empty($task_histories))
        {
            foreach ($task_histories as $key => $task_history) {
                if($task_history['type'] == "comment" || $task_history['type'] == "attachment" || $task_history['type'] == "attachment_comment")
                {
                    $user_history = User::where(['deleted' => '0', "id" => (int) $task_history['user_id'] ])->first();
                    $task_histories[$key]['name'] = $user_history['name'];
                    if(!empty($user_history['profile_image']))
                    {
                        $task_histories[$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$user_history['profile_image']);
                    }
                    else
                        $task_histories[$key]['profile_image_url'] = '';
                    if($task_history['is_attachment'])
                    {
                      $files = TaskHistoryFileUploads::where(['task_history_id' => (int)$task_history['id'] ,'deleted' => '0','status'=> '1'])->get()->toArray();
                      if(!empty($files))
                      {
                        $attachments = [];
                        foreach ($files as $file_key => $file_value) 
                        {
                          $attachments[] = array(
                            "attachment_name"     => $file_value['attachment_name'],
                            "attachment_name_url" => TaskHistoryFileUploads::file_url(config('app.filemanagerfolder').'/'.$window_data['project']['project_title'].'/'.$window_data['project']['task']['task_title'],$file_value['attachment_name']),
                          );
                        }
                        $task_histories[$key]['attachments'] = $attachments; 
                      }
                      else
                      {
                        $task_histories[$key]['attachments'] = [];
                      }
                    }
                    // if($task_history['is_attachment'] || !empty($task_history['attachment_name'] ))
                    // {
                    //     $task_histories[$key]['attachment_url'] = TaskHistory::file_url($window_data['project']['project_title'].'/'.$window_data['project']['task']['task_title'],$task_history['attachment_name']);
                    // }
                    // else
                    // {
                    //     $task_histories[$key]['attachment_url'] = "";
                    // }
                }
                else
                {
                    $task_histories[$key]['attachments'] = [];
                    $task_histories[$key]['profile_image_url'] = "";
                    $task_histories[$key]['name'] = "";
                }
            }
        }
        $window_data['project']['task']['task_histories'] = $task_histories;
        /* Task History End */

        $task_members = Task_members::where(['deleted' => '0','status'=> '1', "task_id" => (int) $requestData['task_id'] ])->get()->toArray();
        $project_leaders = Project_members::where(['is_leaders' => '1' ,'deleted' => '0','status'=> '1', "project_id" => (int) $task['project_id'] ])->get()->toArray();
        $window_data['project']['task']['followers'] = Tasks::getFollowers($task_members,$project_leaders);
        
        /* To get the all project employee which are exists in this department start */
        $members = Employees::select(['designations.name as designation_name','users.*'])->where(['employees.department_id' => (int) $window_data['project']['department'] ])->join('users', 'users.id', '=', 'employees.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->get()->toArray();
        
        if(!empty($members))
        {
            foreach($members as $key => $member)
            {
                if(!empty($member['profile_image']))
                {
                    $members[$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$member['profile_image']);
                }
                else
                    $members[$key]['profile_image_url'] = '';
            }
        }
        $window_data['project']['members'] = $members;
        /* To get the all project employee which are exists in this department end */

       // dd($task);

        $data['gettaskwindowhtml'] = view('admin.projects.gettaskwindow',$window_data,compact('task_status_color','task'))->render();
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
        $rules = [
            'task_id'   => 'required',
            'status'  => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) 
        {
            $requestData = $request->all();
            $mydetail = $request->user();
            $custom_validation = Tasks::updateTaskStatusValidation($requestData);
            if($custom_validation['status'])
            {
                $data['status']   = strtolower(trim($requestData['status']));
                $edit_task_status = Tasks::where('id', (int) $requestData['task_id'])->update($data);
                if($edit_task_status)
                {

                    /* Task History Start */
                    $task_data = array(
                        'task_id' => (int) $requestData['task_id'], 
                        'project_id' => (int) $custom_validation['task']['project_id'],
                        'user_id' => (int) $mydetail['id'],
                        'attachment_name' => "",
                        'is_attachment' => '0',
                        'description' => $mydetail['name']." change the ".ucwords(trim($requestData['status']))." status.",
                        'type' => 'change_task',  
                    );
                    TaskHistory::addtaskhistory($task_data);
                    /* Task History End */

                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.updateTaskStatus_edit_success'),
                        'ref'     => 'updateTaskStatus_edit_success',
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

    public function addfollowers(Request $request)
    {
        $rules = [
            'task_id'    => 'required',
            'followers'  => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) 
        {
            $requestData =  $request->all();
            $custom_validation = Tasks::addfollowersValidation($requestData);
            if($custom_validation['status'])
            {
                $mydetail = $request->user();
                $add_followers = Tasks::addfollowers($requestData,$custom_validation['task'],$mydetail);
                if($add_followers)
                {
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.addfollower_success'),
                        'ref'     => 'addfollower_success',
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

    public function updateDueDate(Request $request){

      //  $data =  $request->all();
       // dd($data['task_id']);

        $rules = [
            'task_id'    => 'required',
            'due_date'  => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) 
        {
            $requestData =  $request->all();
            $mydetail = $request->user();  
            $update_due_date = Tasks::where(['id' => $requestData['task_id'], 'deleted'=> '0'])->first();
            //dd($update_due_date->due_date);

            if($update_due_date){
                 

                $due_date['due_date'] = $requestData['due_date'];

                //dd($due_date['due_date']);

                $dueDateUpdate = Tasks::where(['id' => $requestData['task_id'], 'deleted'=> '0'])->update($due_date);

                if($dueDateUpdate)
                {

                    /* Task History Start */
                    $task_data = array(
                      'task_id' => (int) $request['task_id'], 
                      'project_id' => (int) $update_due_date['project_id'],
                      'user_id' => (int) $mydetail['id'],
                      'attachment_name' => "",
                      'is_attachment' => '0',
                      'description' => $mydetail['name']." changed the due date to ".date('M d, Y'),
                      'type' => 'due_date',  
                    );

                    TaskHistory::addtaskhistory($task_data);
                    /* Task History End */

                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.update_due_date_success'),
                        'ref'     => 'addfollower_success',
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

    public function completeTask(Request $request){

        $data = $request->all();
        $mydetail = $request->user(); 
       // dd($data);

        $rules = [
            'status'    => 'required',
            'task_id'  => 'required',
        ];

        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) 
        {

            $is_task_exists = Tasks::where(['id' => (int) $request['task_id'],"deleted" => '0'])->first(); 
            $project = Projects::where(['id' => (int) $is_task_exists['project_id'] ,"deleted" => '0'])->first();
            $status['status'] = $request['status'];
           // dd($status['status']);
            $task_board_exists = Task_boards::where(['task_board_name' =>  $request['status'] ,"deleted" => "0" ])->first();
           
            //dd($task_board_exists['task_board_name']);
            
            if($task_board_exists['task_board_name']){

               // dd("Task Board Exists");
            
            $mark_complete = Tasks::where(['id' => $request['task_id'], "deleted" => "0"])->update($status);

           // dd($mark_complete);

                if($mark_complete)
                {
                     
                    /* Task History Start */
                    $task_data = array(
                        'task_id' => (int) $request['task_id'], 
                        'project_id' => (int) $project['id'],
                        'user_id' => (int) $mydetail['id'],
                        'attachment_name' => "",
                        'is_attachment' => '0',
                        'description' => $mydetail['name']." complete thier task.",
                        'type' => 'complete_status',  
                    );
                    TaskHistory::addtaskhistory($task_data);
                    /* Task History End */

                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.task_completed_success'),
                        'ref'     => 'task_completed_success',
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

             }else{

              
              $task_board = array(

                    'task_board_name' => $request['status'],
                    'task_board_color' => "#35ba67",
                    'deleted' => "0",
                    'status' => "1",

                );
                
                $create_task_board = Task_boards::create($task_board);

                if($create_task_board)
                {
                 //  dd($request['task_id']);
                  $status['status'] = $request['status'];
                 // dd($status);
                 $mark_complete = Tasks::where(['id' => $request['task_id'], "deleted" => "0"])->update($status);
                    $project = Projects::where(['id' => (int) $is_task_exists['project_id'] ,"deleted" => '0'])->first();
                   
                    /* Task History Start */
                    $task_data = array(
                        'task_id' => (int) $request['task_id'], 
                        'project_id' => (int) $project['id'],
                        'user_id' => (int) $mydetail['id'],
                        'attachment_name' => "",
                        'is_attachment' => '0',
                        'description' => $mydetail['name']." complete thier task.",
                        'type' => 'complete_status',  
                    );
                    TaskHistory::addtaskhistory($task_data);
                    /* Task History End */


                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.task_completed_success'),
                        'ref'     => 'task_completed_success',
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

}
