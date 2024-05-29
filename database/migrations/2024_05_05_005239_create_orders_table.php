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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable(false);
            $table->string('phonenumber')->nullable(false);
            $table->string('email')->nullable(true);
            $table->integer('province')->nullable(false);
            $table->integer('district')->nullable(false);
            $table->integer('ward')->nullable(false);
            $table->string('address')->nullable(false);
            $table->string('note')->nullable(true);
            $table->integer('status')->nullable(false);
            $table->integer('payment')->nullable(false);
            $table->integer('totalamount')->nullable(false);
            $table->bigInteger('creator')->length(11)->nullable(true)->unsigned();
            $table->bigInteger('updater')->length(11)->nullable(true)->unsigned();
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
        Schema::dropIfExists('orders');
    }
};
