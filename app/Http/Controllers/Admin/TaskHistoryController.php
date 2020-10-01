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
use App\User as User;
use Hash;
use Mail;
use Storage;
use App\TaskHistory;
use App\Projects;


class TaskHistoryController extends CommonController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addtaskhistory(Request $request)
    {
        $rules = [
            'description'  => 'required',
            'task_id'      => 'required',
            'attachment'   => 'file|max:5128',
        ];
        $validator = Validator::make($request->all(),$rules);

        if (!$validator->fails()) 
        {
            $requestData =  $request->all();
            $mydetail = $request->user();  
            $custom_validation = TaskHistory::addTaskHistoryValidation($requestData);
            if($custom_validation['status'])
            {
                $is_attachment = '0';
                $filename = "";
                
                if(!empty($requestData['attachment']))
                {
                    $project =  Projects::where(['id' => (int) $custom_validation['task']['project_id'], "deleted" => '0'])->first();
                    $is_attachment = '1';
                    $filename = TaskHistory::uploadFile(config('app.folder').'/'.$project['project_title'].'/'.$custom_validation['task']['task_title'],$requestData['attachment']);
                    $type = 'attachment';
                }
                else
                {
                    $type = 'comment';
                }

                /* Task History Start */
                $task_data = array(
                    'task_id' => (int) $requestData['task_id'], 
                    'project_id' => (int) $custom_validation['task']['project_id'],
                    'user_id' => (int) $mydetail['id'],
                    'attachment_name' => $filename,
                    'is_attachment' => $is_attachment,
                    'description' => $requestData['description'],
                    'type' => $type,  
                );

                $add_task_history = TaskHistory::addtaskhistory($task_data);
                /* Task History End */

                if($add_task_history)
                {
                    $add_task_history['attachement_url'] = "";
                    if($add_task_history['is_attachment'])
                    {
                        $add_task_history['attachement_url'] = TaskHistory::file_url($project['project_title'].'/'.$custom_validation['task']['task_title'],$filename);
                    }   

                    $user_history = User::where(['deleted' => '0', "id" => (int) $mydetail['id'] ])->first();
                    $add_task_history['name'] = $user_history['name'];
                    if(!empty($user_history['profile_image']))
                    {
                        $add_task_history['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$user_history['profile_image']);
                    }
                    else
                    {
                        $add_task_history['profile_image_url'] = '';
                    }

                    $data['comment'] = $add_task_history;
                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.comment_add_success'),
                        'ref'     => 'comment_add_success',
                        'data'    => $data
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
