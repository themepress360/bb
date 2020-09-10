<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [ 'fname','lname','email','password','phone','company_name','client_designation'];
}
