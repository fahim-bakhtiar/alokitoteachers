<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemoClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo_classes', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');

            
            $table->unsignedInteger('class');

            $table->foreign('class')->references('id')->on('categories');


            $table->unsignedInteger('subject');

            $table->foreign('subject')->references('id')->on('categories');


            $table->string('video_url');

            $table->integer('duration')->unsigned();

            $table->decimal('price', 20, 2);

            $table->decimal('sale_price', 20, 2)->nullable();

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
        Schema::dropIfExists('demo_classes');
    }
}
