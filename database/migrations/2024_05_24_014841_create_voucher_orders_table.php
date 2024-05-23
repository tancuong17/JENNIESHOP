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
        Schema::create('voucher_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_order')->length(11)->nullable(false)->unsigned();
            $table->bigInteger('id_voucher')->length(11)->nullable(false)->unsigned();
            $table->foreign('id_order')->references('id')->on('orders'); 
            $table->foreign('id_voucher')->references('id')->on('vouchers'); 
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
        Schema::dropIfExists('voucher_orders');
    }
};
