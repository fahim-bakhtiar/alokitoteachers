<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedAssessmentRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('need_assessment_ranges', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('min');
            
            $table->integer('max');
            
            $table->text('course_ids')->default('[]');

            $table->text('workshop_ids')->default('[]');

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
        Schema::dropIfExists('need_assessment_ranges');
    }
}
