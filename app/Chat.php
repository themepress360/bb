<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;
use DB;

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
    // $is_chat_exist = ChatMessages::select('chat_id')->where(['sender_user_id' => (int) $requestData['start_conversation_user_id'],'receiver_user_id' => (int) $mydetail['id'], "deleted" => '0'])->orwhere(['sender_user_id' => (int) $mydetail['id'],'receiver_user_id' => (int) $requestData['start_conversation_user_id'], "deleted" => '0'])->first();

    $is_chat_exist = ChatMessages::select('chat_id')->where(function ($query) use($requestData,$mydetail) {
    	$query->where('sender_user_id', (int) $requestData['start_conversation_user_id'])
        ->where('receiver_user_id', (int) $mydetail['id'])->where('deleted', '0');})->orwhere(function ($query) use($requestData,$mydetail){
    	$query->where('sender_user_id', (int) $mydetail['id'])
        ->where('receiver_user_id', (int) $requestData['start_conversation_user_id'])->where('deleted', '0');})->first();

    if(!empty($is_chat_exist))
    {
    	$validate['status']  = false;
        $validate['message'] = trans('messages.chat_already_exists');
        $validate['ref']     = "chat_already_exists";
        return $validate;
    }
    return $validate;
  }

  static function ChatWindowValidation($requestData,$mydetail)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $user = User::where(['id' => (int) $requestData['user_id'],"status" => '1', "deleted" => '0'])->first();
    if(empty($user))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_user_id_invalid');
      $validate['ref']     = "error_user_id_invalid";
      return $validate;
    }
    $validate['user'] = $user;
    $chat = self::where(['id' => (int) $requestData['chat_id'],"status" => '1', "deleted" => '0'])->first();
    if(empty($chat))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_chat_id_invalid');
      $validate['ref']     = "error_chat_id_invalid";
      return $validate;
    }
    $chat_member = ChatMembers::where(['chat_id' => (int) $requestData['chat_id'],"user_id" => (int) $mydetail['id'],"status" => '1', "deleted" => '0'])->first();
    if(empty($chat_member))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_chat_member_not_exist');
      $validate['ref']     = "error_chat_member_not_exist";
      return $validate;
    }
    return $validate;
  }

  static function ChatMessageValidation($requestData,$mydetail)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    // $user = User::where(['id' => (int) $requestData['user_id'],"status" => '1', "deleted" => '0'])->first();
    // if(empty($user))
    // {
    //   $validate['status']  = false;
    //   $validate['message'] = trans('messages.error_user_id_invalid');
    //   $validate['ref']     = "error_user_id_invalid";
    //   return $validate;
    // }
    // $validate['user'] = $user;
    $chat = self::where(['id' => (int) $requestData['chat_id'],"status" => '1', "deleted" => '0'])->first();
    if(empty($chat))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_chat_id_invalid');
      $validate['ref']     = "error_chat_id_invalid";
      return $validate;
    }
    // $chat_member = ChatMembers::where(['chat_id' => (int) $requestData['chat_id'],"user_id" => (int) $mydetail['id'],"status" => '1', "deleted" => '0'])->first();
    // if(empty($chat_member))
    // {
    //   $validate['status']  = false;
    //   $validate['message'] = trans('messages.error_chat_member_not_exist');
    //   $validate['ref']     = "error_chat_member_not_exist";
    //   return $validate;
    // }
    return $validate;
  }
}
