<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentManagementSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_management_system', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('card_details');
            $table->dateTime('payment_date');
            $table->integer('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_management_system');
    }
}
