<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('client_id');
            $table->string('first_name');
            $table->bigInteger('last_name');
            $table->string('email')->unique();
            $table->string('phone_no');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_image');
            $table->enum('deleted',['1','0']);
            $table->enum('status',['1','0']);
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
        //
    }
}
