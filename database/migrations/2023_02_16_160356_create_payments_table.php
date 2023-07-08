<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('amount');

            $table->unsignedInteger('teacher_id');

            $table->foreign('teacher_id')->references('id')->on('teachers');

            $table->unsignedInteger('paymentable_id');

            $table->string('paymentable_type');

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
        Schema::dropIfExists('payments');
    }
}
