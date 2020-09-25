<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_boards', function (Blueprint $table) {
            $table->id();
            $table->string('task_board_name');
            $table->string('task_board_color');
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
        Schema::dropIfExists('task_boards');
    }
}
