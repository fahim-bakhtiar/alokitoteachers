<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->integer('limit');

            $table->dateTime('start_date');

            $table->dateTime('end_date');

            $table->unsignedInteger('workshop_id');

            $table->foreign('workshop_id')->references('id')->on('workshops');

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
        Schema::dropIfExists('batches');
    }
}
