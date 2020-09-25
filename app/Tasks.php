<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
  protected $table = 'tasks';
  protected $fillable = [ 'project_id','priority','task_title', 'description', 'due_date', 'status','deleted','added_by'];

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
}
