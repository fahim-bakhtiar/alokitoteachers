<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseFacultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_faculty', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->unsignedInteger('faculty_id');
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->string('role');
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
        Schema::dropIfExists('course_faculty');
    }
}
