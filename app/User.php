<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','deleted','dob','phone_no','type','gender','address','date_of_joining','employee_id','profile_image','state','country','pin_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function image_url($folder,$file_name)
    {   
        $file_name = trim($file_name)=='' || !file_exists(storage_path(config('app.defaultstorage').'/'.$folder.'/'.$file_name)) ? 'noimage.png' : $file_name;
        return url("storage/app/".$folder.'/'.$file_name);
    }
}
