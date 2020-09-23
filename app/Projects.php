<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class Projects extends Model
{
     
	 protected $table = 'projects';
     protected $fillable = [ 'project_title', 'description', 'start_date', 'end_date','clients','department','priority','status','deleted','added_by'];


	static function EmailAddProject($project_data_email)
	{
		$to_email = 'themepress360@gmail.com';
        $to_name = 'A New Project has been Created';
        if(!empty($project_data_email['team_leaders']))
        {
        	$team_leaders = explode(',',$project_data_email['team_leaders']);
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

        if(!empty($project_data_email['team_members']))
        {
        	$team_members = explode(',',$project_data_email['team_members']);
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
        		);        	
        	}
        }

        if(!empty($project_data_email['added_by']))
        {
        	$is_user_exists = User::where(['id' => (int) $project_data_email['added_by'],"deleted" => '0'])->first(); 	
        	if(!empty($is_user_exists['profile_image']))
	    		$profile_image_url = User::image_url(config('app.profileimagesfolder'),$is_user_exists['profile_image']);
	    	else
	    		$profile_image_url = '';

        	$email_data['project_added'] = array(
        		"name" => !empty($is_user_exists['name']) ? $is_user_exists['name'] : '-',
        		"profile_images_url" => $profile_image_url,
        	);        	
        }

        $email_data['project_title'] = $project_data_email['project_title'];
        // print_r(view('admin.emails.AddProjectEmail',$email_data)->render());
        // exit();
		Mail::send('admin.emails.AddProjectEmail', $email_data, function($message) use ($to_name, $to_email) {
            $message->to(strtolower($to_email), 'New Project')->subject($to_name);
        });
        // dd($project_data_email);
	} 
}
