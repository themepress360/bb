<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use File;

class ChatMessages extends Model
{
  protected $table = 'chatmessages';
  protected $fillable = ['chat_id','sender_user_id','receiver_user_id','message','is_attachemnt','status','deleted'];
}
