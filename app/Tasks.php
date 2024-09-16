<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

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
  static function addTaskValidation($requestData)
  {
    $validate = array(
      "status"   => true,
      "message"  => "",
      "ref"      => "",
    );
    $project = Projects::where(['id' => (int) $requestData['project_id'], "deleted" => '0'])->first();
    if(empty($project))
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_project_id_invalid');
      $validate['ref']     = "error_project_id_invalid";
      return $validate;
    }
    $due_date = strtotime(date('Y-m-d', strtotime(str_replace('/', '-', $requestData['due_date']))));
    $start_date = strtotime(date('Y-m-d', strtotime(str_replace('/', '-', $project['start_date']))));
    $end_date = strtotime(date('Y-m-d', strtotime(str_replace('/', '-', $project['end_date']))));
    if($start_date > $due_date)
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_start_date_invalid');
      $validate['ref']     = "error_start_date_invalid";
      return $validate;
    }
    if($end_date < $due_date)
    {
      $validate['status']  = false;
      $validate['message'] = trans('messages.error_end_date_invalid');
      $validate['ref']     = "error_end_date_invalid";
      return $validate;
    }
    return $validate;
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
    $validate['task'] = $task;
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
    $validate['task'] = $task;
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

  static function addfollowers($requestData,$task,$mydetail)
  {
     
    $followers =  explode(',',$requestData['followers']);
    //$is_project_exists = Projects::where(['id' => (int) $task['project_id'] ,"deleted" => '0'])->first(); 
    foreach ($followers as $key => $follower) 
    {
      /* Task History Start */
      $task_data = array(
          'task_id' => (int) $requestData['task_id'], 
          'project_id' => (int) $taskData['project_id'],
          'user_id' => (int) $mydetail['id'],
          'attachment_name' => "",
          'is_attachment' => '0',
          'description' => $mydetail['name']."added to ".$task['task_title'],
          'type' => 'added_user',  
      );
      TaskHistory::addtaskhistory($task_data);
      /* Task History End */

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

  static function EmailAddTask($data)
  {
    if(!empty($data['team_leaders']))
    {
      $team_leaders = explode(',',$data['team_leaders']);
      foreach ($team_leaders as $key => $team_leader) {
        $is_user_exists = User::where(['id' => (int) $team_leader,"deleted" => '0'])->first(); 
            
        if(!empty($is_user_exists['profile_image']))
          $profile_image_url = User::image_url(config('app.profileimagesfolder'),$is_user_exists['profile_image']);
        else
          $profile_image_url = '';

        $email_data['team_leaders'][] = array(
          "name" => !empty($is_user_exists['name']) ? $is_user_exists['name'] : '-',
          "email" => !empty($is_user_exists['email']) ? $is_user_exists['email'] : '-',
          "profile_images_url" => $profile_image_url,
        );          
      }
    }

    if(!empty($data['team_members']))
    {
      $team_members = explode(',',$data['team_members']);
      foreach ($team_members as $key => $team_member) {
        $is_user_exists = User::where(['id' => (int) $team_member,"deleted" => '0'])->first(); 
            
        if(!empty($is_user_exists['profile_image']))
          $profile_image_url = User::image_url(config('app.profileimagesfolder'),$is_user_exists['profile_image']);
        else
          $profile_image_url = '';

        $email_data['team_members'][] = array(
          "name" => !empty($is_user_exists['name']) ? $is_user_exists['name'] : '-',
          "email" => !empty($is_user_exists['email']) ? $is_user_exists['email'] : '-',
          "profile_images_url" => $profile_image_url,
          "type"  => !empty($is_user_exists['type']) ? $is_user_exists['type'] : '-',
        );          
      }
    }

    if(!empty($data['mydetail']))
    {
      if(!empty($data['mydetail']['profile_image']))
        $profile_image_url = User::image_url(config('app.profileimagesfolder'),$data['mydetail']['profile_image']);
      else
        $profile_image_url = '';

      $email_data['project_added'] = array(
        "name" => !empty($data['mydetail']['name']) ? $data['mydetail']['name'] : '-',
        "profile_images_url" => $profile_image_url,
        "email" => !empty($data['mydetail']['email']) ? $data['mydetail']['email'] : '-',
        "type"  => !empty($data['mydetail']['type']) ? $data['mydetail']['type'] : '-',
      );          
    }

    $email_data['task_title'] = $data['task_title'];
    $email_data['description'] = $data['description'];
    $email_data['due_date'] = $data['due_date'];
    $email_data['priority'] = $data['priority'];
    $email_data['project_title'] = $data['project']['project_title'];
    if(!empty($data['assign_to']))
    {
      $is_user_exists = User::where(['id' => (int) $data['assign_to'],"deleted" => '0'])->first(); 
      if(!empty($is_user_exists['profile_image_url']))
        $profile_image_url = User::image_url(config('app.profileimagesfolder'),$is_user_exists['profile_image_url']);
      else
        $profile_image_url = '';

      $email_data['assign_to'] = array(
        "name" => !empty($is_user_exists['name']) ? $is_user_exists['name'] : '-',
        "profile_images_url" => $profile_image_url,
        "email" => !empty($is_user_exists['email']) ? $is_user_exists['email'] : '-',
        "type"  => !empty($is_user_exists['type']) ? $is_user_exists['type'] : '-',
      );          
    }

    if(!empty($email_data['assign_to']))
      self::SingleEmailSent($email_data,$email_data['assign_to']);
  }

  static function SingleEmailSent($email_data,$user)
  {
    $to_name = 'A New Task has been Created';
    $to_email = $user['email'];
    $email_data['type'] = $user['type'];
    Mail::send('admin.emails.AddTaskEmail', $email_data, function($message) use ($to_name, $to_email) {
      $message->to(strtolower($to_email), 'New Project')->subject($to_name);
    });  
  }

  static function EmailSent($email_data,$users)
  {
    //$to_email = 'akkhan1587@gmail.com';
    $to_name = 'A New Task has been Created';
    if(!empty($users))
    {
      foreach ($users as $key => $user) 
      {
        $to_email = $user['email'];
        $email_data['type'] = $user['type'];
        Mail::send('admin.emails.AddTaskEmail', $email_data, function($message) use ($to_name, $to_email) {
            $message->to(strtolower($to_email), 'New Project')->subject($to_name);
        });
      }
    }
  }
}
