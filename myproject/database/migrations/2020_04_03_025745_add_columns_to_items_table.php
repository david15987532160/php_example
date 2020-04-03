<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->string('item_code');
            $table->string('origin');
            $table->mediumText('ingredients');
            $table->integer('status');
            $table->date('expiration');
            $table->integer('rating');
            $table->string('producer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn([
                'item_code', 'origin', 'ingredients',
                'status', 'expiration', 'rating', 'producer'
            ]);
        });
    }
}
