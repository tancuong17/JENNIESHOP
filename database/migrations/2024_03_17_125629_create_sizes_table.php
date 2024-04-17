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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('quantity')->length(11)->nullable(false);
            $table->bigInteger('id_color')->length(11)->nullable(false)->unsigned();
            $table->bigInteger('id_product')->length(11)->nullable(false)->unsigned();
            $table->foreign('id_color')->references('id')->on('colors');
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
        Schema::dropIfExists('sizes');
    }
};
