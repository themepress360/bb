<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
   protected $table = 'employees';
    protected $fillable = [ 'user_id','status','deleted','department_id','designation_id','role_id'];

     public function user() {
        return $this->belongsTo('App\User');
    }
   

     }
