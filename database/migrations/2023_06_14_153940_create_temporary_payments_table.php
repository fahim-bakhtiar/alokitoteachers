<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_id');
            $table->text('details');
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->string('payment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporary_payments');
    }
}
