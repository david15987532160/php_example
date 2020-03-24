<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSearchItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->mediumText('description');
            $table->unsignedDecimal('unit_price')->default(0);
            $table->unsignedDecimal('promotion_price')->default(0);
            $table->string('image');

            $table->unsignedBigInteger('item_type_id');
            $table->foreign('item_type_id')->references('id')
                ->on('item_types')->onDelete('cascade');

            $table->unsignedBigInteger('in_stock')->nullable();
            $table->unsignedBigInteger('searched_times')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
