<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['male','female', 'both']);
            $table->integer('shirt_sleeve')->nullable();
            $table->integer('chest')->nullable();
            $table->integer('thigh')->nullable();
            $table->integer('waist')->nullable();
            $table->integer('trouser_length')->nullable();
            $table->integer('stock');
            $table->integer('user_id');
            $table->string('main_image');
            $table->string('other_image', 255);
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
        Schema::dropIfExists('products');
    }
}
