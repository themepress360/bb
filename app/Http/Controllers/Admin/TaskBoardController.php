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



class TaskBoardController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function defaultSettings()
    {
    $assigned = Task_boards::where([ "task_board_name" => "assigned"])->first();
    $admin_review = Task_boards::where([ "task_board_name" => "admin review"])->first();
     //   dd($task_board_admin_review);
        return view('admin.settings.task-settings.task-settings', compact('assigned', 'admin_review'));
    }



    public function getTaskboard(Request $request)

    {

      //  $data = $request->all();

      //  dd($data);

         $task_boards = Task_boards::join('tasks' , 'tasks.status' , '=', 'task_boards.task_board_name')->where('task_boards.deleted','0')->get();
        // dd($task_boards[0]['task_board_color']);

         $projects = Projects::where('deleted','0')->get();

      
       $tasks = Tasks::where('deleted', '0')->get();
       
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

         return view('admin.projects.task-board',compact('employees', 'projects','tasks','task_boards'));//
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
    public function updateColor(Request $request)
    {
        $color = $request->all();

        $is_task_name_exists = Task_boards::where('deleted','0')->get();

       // dd($is_task_name_exists);

        if(!empty($is_task_name_exists)){

             foreach($is_task_name_exists as $task_name){

                if($task_name->task_board_name == "assigned" ){

                    $assigned_color = array(

                        'task_board_color'  => $request['assigned'],
                    );
                    
                   
                    $update_color = Task_boards::where(['task_board_name' => 'assigned' , 'deleted' =>'0' ])->update( $assigned_color);

                                       
                }else if($task_name->task_board_name == "admin review" ){

                    $admin_review_color = array(

                        'task_board_color'  => $request['admin_review'],
                    );
                    
                   
                    $update_color = Task_boards::where(['task_board_name' => 'admin review' , 'deleted' =>'0' ])->update( $admin_review_color);

                                       
                }

            }

 
       }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task_board  $task_board
     * @return \Illuminate\Http\Response
     */
    public function addTaskboard(Request $request)
    {
        $data= $request->all();
        //dd($data);

        $rules = [

            'task_board_name'   => 'required|string|min:2|max:50',
            'task_board_color'    =>  'required',
         ];

          $validator = Validator::make($request->all(),$rules);

         if (!$validator->fails()) 
        {

            $TaskBoardData= $request->all();
            $task_board_name = strtolower($TaskBoardData['task_board_name']);
                                
        $is_Task_board_name_exists =Task_boards::where(['task_board_name' => strtolower($TaskBoardData['task_board_name']) ,"deleted" => '0'])->first(); 

        //dd($data);
              if(empty( $is_Task_board_name_exists)) {

                $task_board_data = array(

                        'task_board_name'  => strtolower($TaskBoardData['task_board_name']),
                        'task_board_color'  => $TaskBoardData['task_board_color'],
                         'deleted'  => '0',
                          'status'   => '1',

                    );

                $add_task_board =  Task_boards::create($task_board_data);

                  if($add_task_board){

                    $status   = 200;
                       $response = array(
                       'status'  => 'SUCCESS',
                       'message' => trans('messages.task_board_add_success'),
                       'ref'     => 'task_board_add_success',
                       );

                  }else
                        {
                            $status = 400;
                            $response = array(
                                'status'  => 'FAILED',
                                'message' => trans('messages.server_error'),
                                'ref'     => 'server_error'
                            );
                        }

              }else
                {
                    $status = 400;
                    $response = array(
                        'status'  => 'FAILED',
                        'message' => trans('messages.error_task_board_exists'),
                        'ref'     => 'error_task_board_exists'
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\task_board  $task_board
     * @return \Illuminate\Http\Response
     */
    public function edit(task_board $task_board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task_board  $task_board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, task_board $task_board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task_board  $task_board
     * @return \Illuminate\Http\Response
     */
    public function destroy(task_board $task_board)
    {
        //
    }

    public function getprojecttaskboard(Request $request)
    {
        $requestData =  $request->all();
        $window_data = [];
        
        $window_data['task_boards'] = Task_boards::where(['deleted' => '0'])->get()->toArray();

        if(!empty($window_data['task_boards']))
        {
            foreach($window_data['task_boards'] as $key => $task_boards)
            {
                $window_data['task_boards'][$key]['tasks'] = Tasks::where(['status' => '1','deleted' => '0','status' => $task_boards['task_board_name'],'project_id' => (int) $requestData['project_id']])->get()->toArray();
                if(!empty($window_data['task_boards'][$key]['tasks']))
                {
                    foreach ($window_data['task_boards'][$key]['tasks'] as $key1 => $task) 
                    {
                        $task_added_by = User::where(['deleted' => '0', "id" => (int) $task['assign_to'] ])->first();
                        if(!empty($task_added_by['profile_image']))
                            $window_data['task_boards'][$key]['tasks'][$key1]['assign_to_profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$task_added_by['profile_image']);
                        else
                            $window_data['task_boards'][$key]['tasks'][$key1]['assign_to_profile_image_url'] = '';
                        $window_data['task_boards'][$key]['tasks'][$key1]['name'] = !empty($task_added_by['name']) ? $task_added_by['name'] : '-';
                    }
                }
            }
        }

        $data['projecttaskboardhtml'] = view('admin.projects.projecttaskboardhtml',$window_data)->render();
        
        $status   = 200;
        $response = array(
            'status'  => 'SUCCESS',
            'message' => '',
            'ref'     => 'task_board_success',
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
}
