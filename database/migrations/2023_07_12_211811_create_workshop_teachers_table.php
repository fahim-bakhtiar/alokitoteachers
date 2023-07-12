<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshop_teachers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('workshop_id');
            $table->foreign('workshop_id')->references('id')->on('workshops');
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->unsignedInteger('batch_id');
            $table->integer('assignment')->default(0);
            $table->integer('participation')->default(0);
            $table->integer('attendence')->default(0);
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
        Schema::table('workshop_teachers', function (Blueprint $table) {
            //
        });
    }
}
