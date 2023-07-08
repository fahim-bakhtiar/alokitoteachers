<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->text('description');

            $table->decimal('price', 20, 2);

            $table->decimal('sale_price', 20, 2)->nullable();

            $table->string('preview_video_url');

            $table->string('thumbnail_path')->nullable();

            $table->string('thumbnail_name')->nullable();

            $table->string('type');

            $table->integer('duration')->unsigned();

            $table->integer('total_credit_hours')->unsigned();

            $table->dateTime('start_date')->nullable();

            $table->dateTime('end_date')->nullable();

            $table->text('learning_outcomes');

            $table->string('status')->default("active");

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
        Schema::dropIfExists('workshops');
    }
}
