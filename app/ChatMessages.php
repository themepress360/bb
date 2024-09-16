<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class ChatMessages extends Model
{
  protected $table = 'chatmessages';
  protected $fillable = ['chat_id','sender_user_id','receiver_user_id','message','is_attachment','status','deleted'];

  static function getMessages($chat_id)
  {
  	$message = [];
  	$chat_messages = ChatMessages::where(['chat_id' => (int) $chat_id ,'deleted' => '0','status'=> '1'])->orderBy('id', 'asc')->get()->toArray();
  	if(!empty($chat_messages))
  	{
  		foreach ($chat_messages as $key => $chat_message) 
  		{
  			//$is_attachment = [];
        $attachment = [];
  			if($chat_message['is_attachment'] == 1)
  			{
  				$files = ChatFileUploads::where(['chat_message_id' => (int) $chat_message['id'],'deleted' => '0','status'=> '1'])->orderBy('id', 'desc')->get()->toArray();
  				if(!empty($files))
  				{
  					foreach($files as $key_file => $file)
  					{
  						$attachment[] = array(
  							"attachment_name"      => $file['attachment_name'],
  							"attachment_url"  => ChatFileUploads::file_url(config('app.chatfilesfolder'),$file['attachment_name'])
  						);
  					}
  				}
  			}
  			else
  			{
  				$attachment = [];
  			}
  			$senderuser = User::where(['deleted' => '0', "id" => (int) $chat_message['sender_user_id']])->first();
  			$sender_name = $senderuser['name'];
            if(!empty($senderuser['profile_image']))
            {
                $sender_profile_image_url = User::image_url(config('app.profileimagesfolder'),$senderuser['profile_image']);
            }
            else
                $sender_profile_image_url = '';	
  			$message[] = array(
  				"is_attachment"    => $chat_message['is_attachment'],
  				"sender_user_id"   => $chat_message['sender_user_id'],
  				"sender_name"      => $sender_name,
  				"sender_profile_image_url" => $sender_profile_image_url,
  				"receiver_user_id" => $chat_message['receiver_user_id'],
  				"message"          => $chat_message['message'],
  				"created_at"       => $chat_message['created_at'],
  				"attachments"      => $attachment
  			);
  		}
  	}
  	return $message;
  }
}
