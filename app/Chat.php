<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class Chat extends Model
{
  protected $table = 'chat';
  protected $fillable = ['status','deleted'];

  static function addChatValidation($requestData,$mydetail)
  {
  	$validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $user = User::where(['id' => (int) $requestData['start_conversation_user_id'],"status" => '1', "deleted" => '0'])->first();
    if(empty($user))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_user_id_invalid');
      $validate['ref']     = "error_user_id_invalid";
      return $validate;
    }
    $validate['user'] = $user;
    $is_chat_exist = ChatMessages::select('chat_id')->where(['sender_user_id' => (int) $requestData['start_conversation_user_id'],'receiver_user_id' => (int) $mydetail['id'], "deleted" => '0'])->orwhere(['sender_user_id' => (int) $mydetail['id'],'receiver_user_id' => (int) $requestData['start_conversation_user_id'], "deleted" => '0'])->first();
    if(!empty($is_chat_exist))
    {
    	$validate['status']  = false;
        $validate['message'] = trans('messages.chat_already_exists');
        $validate['ref']     = "chat_already_exists";
        return $validate;
    }
    return $validate;
  }
}
