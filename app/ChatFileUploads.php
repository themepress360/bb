<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class ChatFileUploads extends Model
{
  protected $table = 'chatfileuploads';
  protected $fillable = ['chat_id','chat_message_id','attachment_name','status','deleted'];

  static function uploadFile($path,$file,$chat_message)
  {
    $filename = '';    
    if ($file) {
      $extension = $file->getClientOriginalExtension();
      $filename  = $file->getClientOriginalName();
      $file_name_exists = self::where(['chat_id' => (int) $chat_message['chat_id'],'deleted' => '0',"attachment_name" => $filename])->first();
      if(!empty($file_name_exists))
      {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).time().'.'.$extension;
      }
      Storage::put($path . '/' . $filename, File::get($file));
    }
    return $filename;
  }

  static function file_url($folder,$file_name)
  {
    $file_name = trim($file_name)=='' || !file_exists(storage_path(config('app.defaultstorage').'/'.config('app.folder').'/'.$folder.'/'.$file_name)) ? '' : $file_name;
    return url("storage/".$folder.'/'.$file_name);
  }

}
