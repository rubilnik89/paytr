<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('item_id');
            $table->string('name');
            $table->string('code');
            $table->string('unit_name');//шт, коробок и тд
            $table->string('description');
            $table->string('has_image');
            $table->text('image')->nullable();
            $table->string('weight')->nullable();
            $table->integer('group_id');
            $table->integer('qty');
            $table->decimal('price_id10422')->nullable();
            $table->decimal('price_id10011')->nullable();
            $table->decimal('price_id10506')->nullable();
            $table->decimal('price_id10115')->nullable();
            $table->decimal('price_id10298')->nullable();
            $table->decimal('price_id10505')->nullable();
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
