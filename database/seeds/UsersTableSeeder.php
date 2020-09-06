<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Theme Press Admin',
            'email'    => 'adminthemepress360@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'admin'
        ));
        User::create(array(
            'name'     => 'Theme Press Client',
            'email'    => 'clientthemepress360@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'client'
        ));
        User::create(array(
            'name'     => 'Theme Press Employee',
            'email'    => 'employeethemepress360@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'employee'
        ));
    }
}
