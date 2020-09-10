<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationinformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationinformations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('institute');
            $table->string('subject');
            $table->string('start_date');
            $table->string('complete_date');
            $table->string('degree');
            $table->string('grade');
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
        Schema::dropIfExists('educationinformations');
    }
}
