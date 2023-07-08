<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInnovationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innovations', function (Blueprint $table) {
            
            $table->increments('id');


            $table->unsignedInteger('teacher_id');

            $table->foreign('teacher_id')->references('id')->on('teachers');


            $table->string('title');

            $table->text('description');

            $table->unsignedInteger('price')->default(0);

            $table->unsignedInteger('jury_points')->nullable();

            $table->string('status')->default("pending");

            $table->string('thumbnail_path')->nullable();

            $table->string('thumbnail_name')->nullable();

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
        Schema::dropIfExists('innovations');
    }
}
