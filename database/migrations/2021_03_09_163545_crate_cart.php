<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('user_id');
            $table->unsignedBiginteger('product_id');
            $table->integer('quantity');

            $table->foreign('product_id')->references('product_id')->on('products')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
