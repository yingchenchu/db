<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_stores', function (Blueprint $table) {
            $table->integer('store_id')->autoIncrement();
            $table->string('store_name');
            $table->integer('manager_id');
            $table->foreign('manager_id')->references('id')->on('users');
            $table->string('store_manager');
            $table->integer('sl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical_stores');
    }
}
