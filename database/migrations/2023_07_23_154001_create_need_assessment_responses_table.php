<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedAssessmentResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_assessment_responses', function (Blueprint $table) {
            
            $table->increments('id');


            $table->unsignedInteger('teacher_id');
            
            $table->foreign('teacher_id')->references('id')->on('teachers');


            $table->unsignedInteger('need_assessment_question_id');
            
            $table->foreign('need_assessment_question_id')->references('id')->on('need_assessment_questions');


            $table->string('answer');
            
            $table->integer('points');

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
        Schema::dropIfExists('need_assessment_responses');
    }
}
