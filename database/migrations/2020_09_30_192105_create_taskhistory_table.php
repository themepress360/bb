<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskhistory', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_id');
            $table->bigInteger('project_id');
            $table->bigInteger('user_id');
            $table->enum('is_attachment',['1','0']);
            $table->string('attachment_name');
            $table->string('description');
            $table->enum('type',['create_task','added_task','comment','incomplete_task','complete_status','assign_task','due_date','added_user']);
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
        Schema::dropIfExists('taskhistory');
    }
}
