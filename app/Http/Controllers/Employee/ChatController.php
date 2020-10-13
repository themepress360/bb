<?php


namespace App\Http\Controllers\Employee;

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
use App\Employees as Employees;
use DB;

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
        $employee = Employees::where(['deleted' => '0', "user_id" => (int) $mydetail['id'] ])->first();
        /* To get all employee which are active and not deleted START */
        $data['employees_list'] = User::select(['designations.name as designation_name','users.*'])->where(['users.deleted' => '0','users.status' => '1','employees.department_id' => (int)$employee['department_id'] ])->join('employees', 'users.id', '=', 'employees.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->get()->toArray();
        if(!empty($data['employees_list']))
        {
            foreach ($data['employees_list'] as $key => $employee) 
            {
                $data['employees_list'][$key]['profile_image_url'] = "";
                if(!empty($employee['profile_image']))
                    $data['employees_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$employee['profile_image']);
            }
        }
        /* To get all employee which are active and not deleted end */

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

        return view('employees.apps.chat.index',$data);
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

                $data['getchatwindowhtml'] = view('employees.apps.chat.chattingwindow',$window_data)->render();
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
