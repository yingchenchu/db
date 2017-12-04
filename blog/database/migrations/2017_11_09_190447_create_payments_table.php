<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('payment_id');
            $table->integer('ad_id_of_payment')->unsigned()->nullable();
            // $table->foreign('ad_id_of_payment')->references('ad_id')->on('ads');
            $table->integer('membership_id_of_payment')->unsigned()->nullable();
            $table->foreign('membership_id_of_payment')->references('membership_id')->on('membership_plans');
            $table->integer('promotion_id_of_payment')->unsigned()->nullable();
            // $table->foreign('promotion_id_of_payment')->references('promotion_id')->on('promotion_packages');
            $table->integer('user_id_of_payment')->unsigned();
            // $table->foreign('user_id_of_payment')->references('user_id')->on('users');
            $table->integer('amount');
            $table->string('card_details');
            $table->date('payment_date');
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
