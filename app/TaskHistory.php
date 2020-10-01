<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
