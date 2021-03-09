<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrateProductGroupItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_group_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBiginteger('group_id');
            $table->unsignedBiginteger('product_id');

            $table->foreign('group_id')->references('group_id')->on('user_product_groups')
                  ->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('product_group_items');
    }
}
