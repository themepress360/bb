<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_boards extends Model
{
     protected $table = 'task_boards';
     protected $fillable = [ 'task_board_name','task_board_color','status','deleted'];

}
