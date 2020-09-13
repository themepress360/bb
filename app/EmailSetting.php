<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSetting extends Model
{
	protected $table = 'emailsetting';
	protected $fillable = [ 'data','type','status','deleted'];
}
