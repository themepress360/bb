<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskhistoryfileuploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskhistoryfileuploads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('task_history_id');
            $table->bigInteger('task_id');
            $table->bigInteger('project_id');
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
        Schema::dropIfExists('taskhistoryfileuploads');
    }
}
