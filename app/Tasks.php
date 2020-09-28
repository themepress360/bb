<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
  protected $table = 'tasks';
  protected $fillable = [ 'project_id','priority','task_title', 'description', 'due_date', 'status','deleted','added_by','assign_to'];

	static function getFollowers($task_members,$project_leaders)
  	{
  		$followers = [];
  		
  		if(!empty($task_members))
  		{
  			foreach ($task_members as $key => $task_member) {
  				if(!in_array($task_member['user_id'],$followers))
  				{
  					$user = User::where(['deleted' => '0', "id" => (int) $task_member['user_id'] ])->first();
  					if(!empty($user['profile_image']))
	    				$profile_image_url = User::image_url(config('app.profileimagesfolder'),$user['profile_image']);
	    			else
	    				$profile_image_url = '';

  					$followers[$task_member['user_id']] = array(
  						"user_id" => $task_member['user_id'],
  						"profile_image_url" => $profile_image_url,
  						"name" => $user['name']
  					);
  				}
  			}
  		}

  		if(!empty($project_leaders))
  		{
  			foreach ($project_leaders as $key => $project_leader) {
  				if(!in_array($project_leader['user_id'],$followers))
  				{
  					$user = User::where(['deleted' => '0', "id" => (int) $project_leader['user_id'] ])->first();
  					if(!empty($user['profile_image']))
	    				$profile_image_url = User::image_url(config('app.profileimagesfolder'),$user['profile_image']);
	    			else
	    				$profile_image_url = '';

  					$followers[$project_leader['user_id']] = array(
  						"user_id" => $project_leader['user_id'],
  						"profile_image_url" => $profile_image_url,
  						"name" => $user['name']
  					);
  				}
  			}
  		}

  		return $followers;
  	}

  static function updateTaskStatusValidation($requestData)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $task = self::where(['id' => (int) $requestData['task_id'], "deleted" => '0'])->first();
    if(empty($task))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_task_id_invalid');
      $validate['ref']     = "error_task_id_invalid";
      return $validate;
    }
    $task_board = Task_boards::where(['task_board_name' => strtolower(trim($requestData['status'])), "deleted" => '0'])->first();
    if(empty($task_board))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_task_board_status_invalid');
      $validate['ref']     = "error_task_board_status_invalid";
      return $validate;
    }
    return $validate;
  }

  static function addfollowersValidation($requestData)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $task = self::where(['id' => (int) $requestData['task_id'], "deleted" => '0'])->first();
    if(empty($task))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_task_id_invalid');
      $validate['ref']     = "error_task_id_invalid";
      return $validate;
    }
    $followers =  explode(',',$requestData['followers']);
    foreach ($followers as $key => $follower) 
    {
      $is_task_member_exists = Task_members::where(['task_id' => (int) $requestData['task_id'],'user_id' => (int) $follower, "deleted" => '0'])->first();
      if(!empty($is_task_member_exists))
      {
        $validate['status']  = false;
        $validate['message'] = trans('messages.error_task_member_exists');
        $validate['ref']     = "error_task_member_exists";
        return $validate;
      }
    }
    return $validate;
  }

  static function addfollowers($requestData)
  {
    $followers =  explode(',',$requestData['followers']);
    foreach ($followers as $key => $follower) 
    {
      $task_members = array(              
        'task_id' => (int) $requestData['task_id'],
        'user_id' => $follower,
        'is_members' => '1',
        'is_leaders' => '0',
        'deleted'  => '0',
        'status'   => '1',
      );
      $add_members = Task_members::create($task_members);
    }
    return true;
  }
}
