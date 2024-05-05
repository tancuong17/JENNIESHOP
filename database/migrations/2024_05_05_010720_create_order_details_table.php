<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_order')->length(11)->nullable(false)->unsigned();
            $table->bigInteger('id_product')->length(11)->nullable(false)->unsigned();
            $table->string('name')->nullable(false);
            $table->string('color')->nullable(false);
            $table->string('size')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->foreign('id_order')->references('id')->on('orders'); 
            $table->foreign('id_product')->references('id')->on('products'); 
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
        Schema::dropIfExists('order_details');
    }
};
