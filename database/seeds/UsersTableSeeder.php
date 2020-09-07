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
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'admin',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18'
        ));
        User::create(array(
            'name'     => 'Client',
            'email'    => 'client@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'client',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18'
        ));
        User::create(array(
            'name'     => 'Employee',
            'email'    => 'employee@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'employee',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18'
        ));
    }
}
