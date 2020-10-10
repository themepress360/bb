<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class ChatMembers extends Model
{
  protected $table = 'chatmembers';
  protected $fillable = ['chat_id','user_id','status','deleted'];
}
