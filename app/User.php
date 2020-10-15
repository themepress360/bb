<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;
use File;
use Image;
use Roles;
use \Carbon\Carbon as Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','login_time','is_login','logout_time' ,'password','status','deleted','dob','phone_no','type','gender','address','date_of_joining','employee_id','profile_image','state','country','zip_code'
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


    public static function  DatetoUTC($timezone = '')
    {
        $login_data_time = Carbon::now($timezone)->toDateTimeString();
        $utcdatetime = Carbon::parse($login_data_time, $timezone)->setTimezone('UTC')->format("Y-m-d H:i:s");
        return $utcdatetime;
    }

    public static function UTCToDate($localTime, $timezone = '')
    {
        
        if ($timezone == '') {
            $userLocation = static::userLocation();
            $timezone     = $userLocation->time_zone;
        }
        return $data['modified_timestamp'] = Carbon::createFromFormat('Y-m-d H:i:s', $localTime, 'UTC')->setTimezone($timezone)->format('Y-m-d H:i:s');
    }

    public static function userLocation()
    {
        $userLocation = session()->get('userLocation');
        if (!$userLocation) {
            $userLocation = static::getLocation($_SERVER["REMOTE_ADDR"] == "::1" ? '103.24.99.166' : $_SERVER["REMOTE_ADDR"]);
            session()->put('userLocation', $userLocation);
            $userLocation = session()->get('userLocation');
        }
        elseif($userLocation->time_zone=='')
        {
            $userLocation = static::getLocation('103.24.99.166');
            session()->put('userLocation', $userLocation);
            $userLocation = session()->get('userLocation');         
        }
        return $userLocation;
    }

    public static function getUserLocation()
    {
        $ip = $_SERVER["REMOTE_ADDR"] == "127.0.0.1" ? '110.39.229.74' : $_SERVER["REMOTE_ADDR"];
        $details = json_decode(file_get_contents("https://ipinfo.io/{$ip}/json"));
        return $details->timezone;
    }
   
}
