<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [ 'user_id','status','deleted','user_id','company_name','client_designation'];
}
