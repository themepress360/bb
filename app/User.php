<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;
use File;
use Image;
use Roles;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','deleted','dob','phone_no','type','gender','address','date_of_joining','employee_id','profile_image','state','country','zip_code'
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
        $file_name = trim($file_name)=='' || !file_exists(storage_path(config('app.defaultstorage').'/'.config('app.folder').'/'.$folder.'/'.$file_name)) ? 'noimage.png' : $file_name;
        return url("storage/".$folder.'/'.$file_name);
    }
    
    public static function uploadImage($path, $file, $width = 1020)
    {
        $filename = '';
        
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $filename  = uniqid() . '.' . $extension;
            Storage::put($path . '/' . $filename, File::get($file));
            
            $image = Image::make(Storage::get($path . '/' . $filename))
                ->resize($width, null,
                    function ($constraint) {
                        $constraint->aspectRatio();
                    })
                ->stream();
        Storage::put($path . '/' . $filename, $image);
        }
        return $filename;
    }


public function employee() {
      
       return $this->hasOne('App\Employees');

   }





   
}
