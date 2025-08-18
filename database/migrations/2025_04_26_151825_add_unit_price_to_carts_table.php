<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitPriceToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->decimal('unit_price', 10, 2)->after('product_title');
        });

        // Backfill existing records with calculated unit prices
        DB::statement('UPDATE carts SET unit_price = price / quantity WHERE quantity > 0');
        DB::statement('UPDATE carts SET unit_price = 0 WHERE quantity = 0');
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('unit_price');
        });
    }
}