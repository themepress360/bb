<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_members extends Model
{
    protected $table = 'project_members';
    protected $fillable = [ 'project_id', 'team_leaders', 'team_members'];
}
