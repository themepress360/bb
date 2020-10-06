<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\EmailSetting as EmailSetting;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if(\Schema::hasTable('emailsetting'))
        {
            $emailServices =EmailSetting::where(['status' => '1' ,'deleted' => '0'])->latest()->first()->toArray();

            if ($emailServices) {
                $emailconfigure = json_decode($emailServices['data']);
                
                $config = array(

                    'driver'     => $emailconfigure->smtp_authentication_domain,
                    'host'       => $emailconfigure->smtp_host,
                    'port'       => $emailconfigure->smtp_port,
                    'username'   => $emailconfigure->smtp_user,
                    'password'   => $emailconfigure->smtp_password,
                    'encryption' => $emailconfigure->smtp_security,
                    'from'       => array('address' => $emailconfigure->smtp_from_email, 'name' => $emailconfigure->smtp_from_name),
                    'sendmail'   => '/usr/sbin/sendmail -bs',
                    'pretend'    => false,

          
                );
                \Config::set('mail', $config);
            }
        }
    }
}
