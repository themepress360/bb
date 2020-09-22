<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
     
	 protected $table = 'projects';
     protected $fillable = [ 'project_title', 'description', 'start_date', 'end_date','clients','department','priority','status','deleted'];

         
}
