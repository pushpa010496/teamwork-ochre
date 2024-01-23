<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('blood_type');
            $table->integer('contact');
            $table->string('email');
            $table->string('password');
            $table->string('department');
            $table->string('designation');
            $table->integer('experience');
            $table->date('postdate');
            $table->string('status');
            $table->integer('pan_no');
            $table->integer('national_id');
            $table->string('prv_employer');
            $table->string('prv_org_hr');
            $table->integer('prv_emp_contact');
            $table->string('profile_img');
            $table->string('address');
            $table->integer('org_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('employees');
    }
}
