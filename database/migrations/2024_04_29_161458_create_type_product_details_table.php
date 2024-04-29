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
        Schema::create('type_product_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('id_type')->length(11)->nullable(false)->unsigned();
            $table->bigInteger('id_product')->length(11)->nullable(false)->unsigned();
            $table->foreign('id_type')->references('id')->on('type_products'); 
            $table->foreign('id_product')->references('id')->on('products'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_pro_duct_details');
    }
};
