<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedAssessmentQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_assessment_questions', function (Blueprint $table) {
            
            $table->increments('id');

            $table->text('question');

            $table->tinyInteger('strongly_disagree');

            $table->tinyInteger('disagree');

            $table->tinyInteger('neutral');

            $table->tinyInteger('agree');

            $table->tinyInteger('strongly_agree');

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
        Schema::dropIfExists('need_assessment_questions');
    }
}
