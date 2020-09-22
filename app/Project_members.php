<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_members extends Model
{
    protected $table = 'project_members';
    protected $fillable = [ 'user_id','project_id', 'is_leaders', 'is_members','status','deleted'];
}
