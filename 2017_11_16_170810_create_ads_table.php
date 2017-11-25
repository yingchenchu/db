<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('ad_id')->unique;
            $table->string('user_id');
            $table->string('ad_name');
            $table->string('category');//buy, sell, rent or look for
            $table->string('store_type');//online or physical
            $table->string('product');//clothing, books, electronics, musical instruments, car, apartments, dresses
            //$table->string('service');//tutors, event planners, photographers, personal trainers
            $table->string('description');
            $table->string('saleby');
            $table->integer('price');
            $table->integer('rank');
            $table->date('post_date');
            $table->date('expire_date');
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
        Schema::dropIfExists('ads');
    }
}
