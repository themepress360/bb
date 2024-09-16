<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatfileuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chatfileuploads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_message_id');
            $table->bigInteger('chat_id');
            $table->string('attachment_name');
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
        Schema::dropIfExists('chatfileuploads');
    }
}
