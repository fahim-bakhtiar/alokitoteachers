<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_trainers', function (Blueprint $table) {

            $table->increments('id');

            
            $table->unsignedInteger('workshop_id');

            $table->foreign('workshop_id')->references('id')->on('workshops');

            
            $table->unsignedInteger('trainer_id');

            $table->foreign('trainer_id')->references('id')->on('trainers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workshop_trainers');
    }
}
