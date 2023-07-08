<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatagorizablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catagorizables', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id');
            $table->string('category_type');
            $table->unsignedInteger('model_id');
            $table->string('model_type');
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
        Schema::dropIfExists('catagorizables');
    }
}
