<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id');
            $table->string('team_leaders');
            $table->string('team_members');
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
        Schema::dropIfExists('project_members');
    }
}
