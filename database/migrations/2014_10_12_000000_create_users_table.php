<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type',['admin','client','employee']);
            $table->string('phone_no');
            $table->string('dob');
            $table->string('address');
            $table->enum('gender',['male','female']);
            $table->enum('deleted',['1','0']);
            $table->enum('status',['1','0']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('employee_id');
            $table->string('date_of_joining');
            $table->string('profile_image');
            $table->string('state');
            $table->string('country');
            $table->string('pin_code');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
