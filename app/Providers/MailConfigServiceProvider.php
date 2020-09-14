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
        $emailServices =EmailSetting::where(['status' => '1' ,'deleted' => '0'])->latest()->first()->toArray();

        if ($emailServices) {
            $emailconfigure = json_decode($emailServices['data']);
            
            $config = array(
              //  'driver'     => $emailconfigure->smtp_authentication_domain,
              //  'host'       => $emailconfigure->smtp_host,
             //   'port'       => $emailconfigure->smtp_port,
             //   'username'   => $emailconfigure->smtp_user,
             //   'password'   => $emailconfigure->smtp_password,
             //   'encryption' => $emailconfigure->smtp_security,
            //    'from'       => array('address' => $emailconfigure->smtp_user, 'name' => "Theme Press 1"),
            //    'sendmail'   => '/usr/sbin/sendmail -bs',
            //    'pretend'    => false,

                  'driver'     => 'smtp',
                  'host'       => 'smtp.sendgrid.net',
                  'port'       => '587',
                  'username'   => 'TiPLkP3GRhqoXxF337JheQ',
                  'password'   => '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',
                  'encryption' => 'tls',
                  'from'       => 'themepress360@gmail.com';
                  'sendmail'   => '/usr/sbin/sendmail -bs',
                  'pretend'    => false,

            );
            \Config::set('mail', $config);
        }
    }
}
