<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('duration');
            $table->string('segment');
            $table->text('activity');
            $table->integer('sequence');
            $table->string('method');
            $table->text('tools')->nullable();
            $table->text('reflection')->nullable();
            $table->unsignedInteger('lessonplan_id');
            $table->foreign('lessonplan_id')->references('id')->on('lesson_plans');
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
        Schema::dropIfExists('lessons');
    }
}
