<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paytraq_id');
            $table->string('name');
            $table->string('type');
            $table->string('email');
            $table->boolean('status')->default(false);
            $table->string('password');
            $table->string('reg_number')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('address');
            $table->string('zip');
            $table->string('country');
            $table->string('phone');
            $table->string('currency');
            $table->integer('price_group_id');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
