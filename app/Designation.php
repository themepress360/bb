<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
  protected $fillable = [ 'name', 'department_id' ,'status','deleted'];
}
