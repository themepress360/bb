<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationInformation extends Model
{
	protected $table = 'educationinformations';
	protected $fillable = [ 'institute','user_id','subject' ,'start_date','complete_date','degree','grade','status','deleted'];
}
