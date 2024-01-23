<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project_name',255);
            $table->string('client',255)->nullable();
            $table->longText('description');
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('target',255)->nullable();
            $table->string('reached_target',255)->nullable();
            $table->string('priority',255)->default('none');
            
            $table->integer('active_flag');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();  
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
        Schema::dropIfExists('projects');
    }
}
