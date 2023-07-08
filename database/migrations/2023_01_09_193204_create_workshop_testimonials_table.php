<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_testimonials', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('profession');

            $table->string('designation')->nullable();

            $table->string('institution')->nullable();

            $table->text('comment');


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
        Schema::dropIfExists('workshop_testimonials');
    }
}
