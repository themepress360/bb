<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class TaskHistoryFileUploads extends Model
{
  protected $table = 'taskhistoryfileuploads';
  protected $fillable = ['task_history_id', 'attachment_name','status','deleted','task_id','project_id'];

  static function uploadFile($path,$file,$task)
  {
    $filename = '';    
    if ($file) {
      $extension = $file->getClientOriginalExtension();
      $filename  = $file->getClientOriginalName();
      $file_name_exists = self::where(['project_id' => (int) $task['project_id'],'task_id' => (int) $task['task_id'],'deleted' => '0',"attachment_name" => $filename])->first();
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
