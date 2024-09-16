<?php


namespace App\Http\Controllers\Client;

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
use App\Chat as Chat;
use App\ChatMembers as ChatMembers;
use App\ChatMessages as ChatMessages;
use App\ChatFileUploads as ChatFileUploads;
use DB;
use App\Projects;
use App\Project_members;

class ChatController extends CommonController
{
   /**
     * To get the chats.
     *
     * @return \Illuminate\Http\Response
     */
    public function getchats(Request $request)
    {
        $data['employees_list'] = [];
        $data['chat_lists'] = [];
        $data['clients_list'] = [];
        $data['chat_ids'] = [];
        $data['user_ids'] = "";
        $mydetail = $request->user(); 
        $gettimezone = User::getUserLocation();
        
        /* To get all admin which are active and not deleted START */
        $data['admin_list'] = User::where(['type' => 'admin','deleted' => '0','status'=> '1'])->get()->toArray();
        if(!empty($data['admin_list']))
        {
            foreach ($data['admin_list'] as $key => $admin) 
            {
                $data['admin_list'][$key]['profile_image_url'] = "";
                if(!empty($admin['profile_image']))
                    $data['admin_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$admin['profile_image']);
                if(!empty($admin['logout_time']))
                    $data['admin_list'][$key]['last_login_time'] = date('M d, Y h:i:s A',strtotime(User::UTCToDate($admin['logout_time'],$gettimezone)));
                else
                    $data['admin_list'][$key]['last_login_time'] = "";
            }
        }
        /* To get all admin which are active and not deleted end */

        /* To get only project leaders Start */
        $data['leader_employees_list'] = Project_members::select(['users.is_login as is_login','users.logout_time as logout_time','users.profile_image as profile_image','project_members.id as project_member_id','project_members.project_id as project_id','users.id as id','users.name'])->join('projects', 'projects.id', '=', 'project_members.project_id')->join('users', 'project_members.user_id', '=', 'users.id')->where(['project_members.is_leaders' => '1','projects.clients' => (int) $mydetail['id']])->groupBy('users.id')->get()->toArray();
        if(!empty($data['leader_employees_list']))
        {
            foreach ($data['leader_employees_list'] as $key => $leader_employees_list) 
            {
                $data['leader_employees_list'][$key]['profile_image_url'] = "";
                if(!empty($leader_employees_list['profile_image']))
                    $data['leader_employees_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$leader_employees_list['profile_image']);
                if(!empty($leader_employees_list['logout_time']))
                    $data['leader_employees_list'][$key]['last_login_time'] = date('M d, Y h:i:s A',strtotime(User::UTCToDate($leader_employees_list['logout_time'],$gettimezone)));
                else
                    $data['leader_employees_list'][$key]['last_login_time'] = "";
            }
        }
        /* To get only project leaders End */

        $data['admin_list'] = array_merge($data['leader_employees_list'],$data['admin_list']);
        
        /* To get the chat list Start */
        $chats  = ChatMessages::select('id','chat_id','sender_user_id','receiver_user_id')->where(function ($query) use($mydetail) {
        $query->where('receiver_user_id', (int) $mydetail['id'])
        ->where('deleted', '0');})->orwhere(function ($query) use($mydetail){
        $query->where('sender_user_id', (int) $mydetail['id'])
        ->where('deleted', '0');})->groupBy('chat_id')->get()->toArray();
        //$chats = ChatMessages::select('chat_id','sender_user_id','receiver_user_id')->distinct('chat_id')->where(['receiver_user_id' => (int) $mydetail['id'], "deleted" => '0'])->orwhere(['sender_user_id' => (int) $mydetail['id'], "deleted" => '0'])->get()->toArray();

        if(!empty($chats))
        {
            foreach ($chats as $key => $chat_list) {
                $profile_image_url = "";
                if($chat_list['sender_user_id'] == $mydetail['id'])
                {
                    $user_id = $chat_list['receiver_user_id'];
                }
                else
                {
                    $user_id = $chat_list['sender_user_id'];
                }
                $user = User::where(['deleted' => '0', "id" => (int) $user_id ])->first();

                if(!empty($user['profile_image']))
                    $profile_image_url = User::image_url(config('app.profileimagesfolder'),$user['profile_image']);
                $chat_lists[] = array(
                    'name' => $user['name'],
                    'profile_image_url' => $profile_image_url,
                    'user_id' => $user['id'],
                    'chat_id' => $chat_list['chat_id'],
                    'is_login' => $user['is_login']
                );
                $chat_ids[] = $chat_list['chat_id'];
            }
            $data['chat_lists'] = $chat_lists;
            $data['chat_ids']   = json_encode($chat_ids);
            $data['user_ids']   = implode(",",array_column($data['chat_lists'], 'user_id'));
        }
        /* To get the chat list End */

        return view('clients.apps.chat.index',$data);
    }


    /**
     * To add the chats.
     *
     * @return \Illuminate\Http\Response
     */
    public function addchat(Request $request)
    {
        $rules = [
            'start_conversation_user_id'   => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData =  $request->all();
            $mydetail = $request->user(); 
            $custom_validation = Chat::addChatValidation($requestData,$mydetail);
            if($custom_validation['status'])
            {
                $create_chat =  Chat::create(['status' => '1' , 'deleted' => '0']);
                if($create_chat)
                {
                    $data['chat_id'] = $create_chat['id'];
                    $create_chat_member =  ChatMembers::create(['chat_id' => (int) $create_chat['id'],'user_id' => (int) $requestData['start_conversation_user_id'],'status' => '1' , 'deleted' => '0']);      
                    $create_chat_member =  ChatMembers::create(['chat_id' => (int) $create_chat['id'],'user_id' => (int) $mydetail['id'],'status' => '1' , 'deleted' => '0']);

                    $create_chat_message =  ChatMessages::create(['chat_id' => (int) $create_chat['id'],'sender_user_id' => (int) $mydetail['id'],'receiver_user_id' => (int) $requestData['start_conversation_user_id'],'message' => '','is_attachment' => '0','status' => '1' , 'deleted' => '0']);
                    $data['user'] = $custom_validation['user'];
                    if(!empty($custom_validation['user']['profile_image']))
                        $data['user']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$custom_validation['user']['profile_image']);
                    else
                        $data['user']['profile_image_url'] = '';

                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.start_conversation_start'),
                        'ref'     => 'start_conversation_start',
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

    /**
     * To get the chats window of this user.
     *
     * @return \Illuminate\Http\Response
    */
    public function chattingwindow(Request $request)
    {
        $rules = [
            'chat_id'   => 'required',
            'user_id'   => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            $requestData =  $request->all();
            $mydetail = $request->user(); 
            $custom_validation = Chat::ChatWindowValidation($requestData,$mydetail);
            if($custom_validation['status'])
            {
                $window_data = [];
                $window_data['chat_id'] = $requestData['chat_id'];
                $window_data['user'] = $custom_validation['user'];
                $window_data['mydetail'] = $mydetail;
                if(!empty($custom_validation['user']['profile_image']))
                    $window_data['user']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$custom_validation['user']['profile_image']);
                else
                    $window_data['user']['profile_image_url'] = "";
                if(!empty($window_data['mydetail']['profile_image']))
                    $window_data['mydetail']['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$window_data['mydetail']['profile_image']);
                else
                    $window_data['mydetail']['profile_image_url'] = "";

                $window_data['chat_messages'] = ChatMessages::getMessages($window_data['chat_id']);                

                $data['getchatwindowhtml'] = view('clients.apps.chat.chattingwindow',$window_data)->render();
                $status   = 200;
                $response = array(
                    'status'  => 'SUCCESS',
                    'message' => trans('messages.chatting_window_success'),
                    'ref'     => 'chatting_window_success',
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
     * To send the chats message to this user.
     *
     * @return \Illuminate\Http\Response
    */
    public function sendmessage(Request $request)
    {
        $requestData =  $request->all();
        $rules = [
            'chat_id'   => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if (!$validator->fails()) 
        {
            
            $mydetail = $request->user(); 
            $custom_validation = Chat::ChatMessageValidation($requestData,$mydetail);
            if($custom_validation['status'])
            {
                $is_attachment = '0';
                if(!empty($requestData['attachment_array']))
                {
                    $is_attachment = '1';
                }

                $message = "";
                if(!empty($requestData['message']))
                {
                    $message = $requestData['message'];
                }

                $receive_user = ChatMembers::where('user_id', '!=' , $mydetail['id'])->where(['chat_id' => (int) $requestData['chat_id'],"status" => '1', "deleted" => '0'])->first();
                $chat_message = array(
                    'chat_id'          => (int) $requestData['chat_id'],
                    'sender_user_id'   => (int) $mydetail['id'],
                    'receiver_user_id' => (int) $receive_user['user_id'],
                    'message'          => $message,
                    'is_attachment'    => $is_attachment,
                    'status'           => '1',
                    'deleted'          => '0'
                );
                $message_create =  ChatMessages::create($chat_message);
                if($message_create)
                {
                    $message_create['attachments'] = [];
                    if(!empty($requestData['attachment_array']))
                    {
                        $chat_file_upload_data = array(
                            'chat_message_id' => (int) $message_create['id'], 
                            'chat_id'         => (int) $chat_message['chat_id'],
                            'status'          =>  '1',
                            'deleted'         => '0'
                        );
                        foreach ($requestData['attachment_array'] as $key => $file) {
                            $filename = ChatFileUploads::uploadFile(config('app.folder').'/'.config('app.chatfilesfolder'),$file,$chat_message);
                            $chat_file_upload_data['attachment_name'] = $filename;
                            ChatFileUploads::create($chat_file_upload_data);
                            $attachments[] = array(
                                "attachement_name" => $filename,
                                "attachement_url" => ChatFileUploads::file_url(config('app.chatfilesfolder'),$filename),
                            );
                        }
                        $message_create['attachments'] = $attachments;
                    }

                    $status   = 200;
                    $response = array(
                        'status'  => 'SUCCESS',
                        'message' => trans('messages.chat_message_success'),
                        'ref'     => 'chat_message_success',
                        'data'    => $message_create
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

    /**
     * To get the chats list of the user.
     *
     * @return \Illuminate\Http\Response
    */
    // public function getchatlist(Request $request)
    // {
    //     $data['chat_list'] = ChatMembers::select(['designations.name as designation_name','users.*'])->where(['users.deleted' => '0','users.status' => '1' ])->join('employees', 'users.id', '=', 'employees.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->get()->toArray();
    //     $status   = 200;
    //     $response = array(
    //         'status'  => 'SUCCESS',
    //         'message' => trans('messages.start_conversation_start'),
    //         'ref'     => 'start_conversation_start',
    //         'data'    => $data
    //     );
    //     $data = array_merge(
    //         [
    //             "code" => $status,
    //             "message" =>$response['message']
    //         ],
    //         $response
    //     );
    //     array_walk_recursive($data, function(&$item){if(is_numeric($item) || is_float($item) || is_double($item)){$item=(string)$item;}});
    //     return \Response::json($data,200);
    // }
}
