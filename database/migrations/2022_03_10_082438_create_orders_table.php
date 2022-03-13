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
            $table->unsignedBigInteger('category');
            $table->foreign('category')->references('id')->on('categories');
            $table->unsignedBigInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->string('description');
            $table->integer('price');
            $table->string('image_1');
            $table->string('image_2');
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
