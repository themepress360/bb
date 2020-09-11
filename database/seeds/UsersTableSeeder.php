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
            'name'     => 'Admin Themepress',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'admin',
            'gender'   => 'male',
            'address'  => '1861 Bayonne Ave, Manchester Township, NJ, 08759',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18',
            'date_of_joining' => '1994-02-18',
            'profile_image' => '',
            'state' => 'New York',
            'country' => 'United States',
            'zip_code' => '10523'
        ));
        User::create(array(
            'name'     => 'Client Themepress',
            'email'    => 'client@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'client',
            'gender'   => 'female',
            'address'  => '1862 Bayonne Ave, Manchester Township, NJ, 08759',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18',
            'date_of_joining' => '1994-02-18',
            'profile_image' => '',
            'state' => 'New York',
            'country' => 'United States',
            'zip_code' => '10523'
        ));
        User::create(array(
            'name'     => 'Employee Themepress',
            'email'    => 'employee@gmail.com',
            'password' => Hash::make('123456'),
            'deleted'  => '0',
            'status'   => '1',
            'type'     => 'employee',
            'gender'   => 'male',
            'address'  => '1861 Bayonne Ave, Manchester Township, NJ, 08759',
            'phone_no' => '0331-1234567',
            'dob'      => '1994-02-18',
            'date_of_joining' => '1994-02-18',
            'profile_image' => '',
            'state' => 'New York',
            'country' => 'United States',
            'zip_code' => '10523'
        ));
    }
}
