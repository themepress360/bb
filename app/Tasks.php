<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
  protected $table = 'tasks';
  protected $fillable = [ 'project_id','task_title', 'description', 'due_date', 'status','deleted','added_by'];
}
