<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class TaskHistory extends Model
{
  protected $table = 'taskhistory';
  protected $fillable = ['task_id', 'project_id','user_id','is_attachment','attachment_name', 'description', 'type', 'status','deleted'];

  static function addtaskhistory($data)
  {
    $addtaskhistory = static::create([
      'task_id' => (int) $data['task_id'], 
      'project_id' => (int) $data['project_id'],
      'user_id' => (int) $data['user_id'],
      'attachment_name' => $data['attachment_name'],
      'is_attachment' => $data['is_attachment'],
      'description' => $data['description'],
      'deleted' => '0',
      'status' => '1',
      'type' => $data['type'],                                                        
    ]);
    if($addtaskhistory)
    {
      return $addtaskhistory;
    }
    else
      return false;
  }

  static function addTaskHistoryValidation($requestData)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $task = Tasks::where(['id' => (int) $requestData['task_id'], "deleted" => '0'])->first();
    if(empty($task))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_task_id_invalid');
      $validate['ref']     = "error_task_id_invalid";
      return $validate;
    }
    $validate['task'] = $task;
    return $validate;
  }

  static function uploadFile($path,$file)
  {
    $filename = '';    
    if ($file) {
      $extension = $file->getClientOriginalExtension();
      $filename  = $file->getClientOriginalName();
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
