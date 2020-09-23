<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_members extends Model
{
    protected $table = 'task_members';
    protected $fillable = [ 'user_id','task_id', 'is_leaders', 'is_members','status','deleted'];
}
