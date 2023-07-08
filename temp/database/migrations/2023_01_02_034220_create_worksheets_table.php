<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worksheets', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title');

            
            $table->unsignedInteger('class');

            $table->foreign('class')->references('id')->on('categories');


            $table->unsignedInteger('subject');

            $table->foreign('subject')->references('id')->on('categories');


            $table->string('file_path')->nullable();

            $table->string('file_name')->nullable();

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
        Schema::dropIfExists('worksheets');
    }
}
