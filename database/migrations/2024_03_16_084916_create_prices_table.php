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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product')->nullable(false)->unsigned();
            $table->foreign('id_product')->references('id')->on('products'); 
            $table->integer('price')->length(11)->nullable(false);
            $table->integer('type_price')->length(11)->nullable(false);
            $table->integer('status')->length(11)->nullable(false);
            $table->bigInteger('creator')->length(11)->nullable(false)->unsigned();
            $table->foreign('creator')->references('id')->on('users'); 
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
        //
    }
};
