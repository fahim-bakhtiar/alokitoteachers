<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password')->nullable();
            $table->string('school')->nullable();
            $table->string('school_address')->nullable();
            $table->string('experience')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('full_address')->nullable();
            $table->string('dp')->nullable();
            $table->text('qualifications')->nullable();
            $table->text('work_history')->nullable();
            $table->unsignedInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
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
        Schema::dropIfExists('teachers');
    }
}
