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
use App\Chat as Chat;
use App\ChatMembers as ChatMembers;
use App\ChatMessages as ChatMessages;

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
        $data['chat_list'] = [];
        $data['clients_list'] = [];
        $mydetail = $request->user(); 
        /* To get all employee which are active and not deleted START */
        $data['employees_list'] = User::select(['designations.name as designation_name','users.*'])->where(['users.deleted' => '0','users.status' => '1' ])->join('employees', 'users.id', '=', 'employees.user_id')->join('designations', 'designations.id', '=', 'employees.designation_id')->get()->toArray();
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

        /* To get all client which are active and not deleted START */
        $data['clients_list'] = User::where(['type' => 'client','deleted' => '0','status'=> '1'])->get()->toArray();
        if(!empty($data['clients_list']))
        {
            foreach ($data['clients_list'] as $key => $client) 
            {
                $data['clients_list'][$key]['profile_image_url'] = "";
                if(!empty($client['profile_image']))
                    $data['clients_list'][$key]['profile_image_url'] = User::image_url(config('app.profileimagesfolder'),$client['profile_image']);
            }
        }
        /* To get all employee which are active and not deleted end */

        /* To get the chat list Start */
        $data['chat_list'] = ChatMembers::join('users', 'users.id', '=', 'user_id')->where(['user_id' => (int) $mydetail['id'] ,'chatmembers.deleted' => '0','chatmembers.status'=> '1'])->get()->toArray();

        print_r("<pre>");
        print_r($data['chat_list']);
        exit();
        /* To get the chat list End */

        return view('admin.apps.chat.index',$data);
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

                    $create_chat_message =  ChatMessages::create(['chat_id' => (int) $create_chat['id'],'sender_user_id' => (int) $mydetail['id'],'receiver_user_id' => (int) $requestData['start_conversation_user_id'],'message' => '','is_attachemnt' => '0','status' => '1' , 'deleted' => '0']);
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
