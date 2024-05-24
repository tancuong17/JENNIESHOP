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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('code')->nullable(false);
            $table->integer('type')->nullable(false);
            $table->integer('value')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->bigInteger('creator')->length(11)->nullable(false)->unsigned();
            $table->bigInteger('updater')->length(11)->nullable(false)->unsigned();
            $table->foreign('creator')->references('id')->on('users'); 
            $table->foreign('updater')->references('id')->on('users'); 
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
        Schema::dropIfExists('vouchers');
    }
};
