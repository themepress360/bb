<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
	protected $table = 'experiences';
	protected $fillable = [ 'company_name','user_id','job_position' ,'location','period_from','period_to','status','deleted'];
}
