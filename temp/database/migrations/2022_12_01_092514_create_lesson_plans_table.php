<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('class');
            $table->integer('subject');
            $table->integer('price');
            $table->integer('status');
            $table->text('details');
            $table->string('duration');
            $table->text('learning_outcomes');
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
        Schema::dropIfExists('lesson_plans');
    }
}
