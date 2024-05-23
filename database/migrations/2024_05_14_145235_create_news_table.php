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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false);
            $table->string('slug')->nullable(false);
            $table->string('image')->nullable(false);
            $table->text('content')->nullable(false);
            $table->integer('banner')->nullable(false);
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
        Schema::dropIfExists('news');
    }
};
