<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('delivery_status', 50)->change(); // Increase length to 50 characters
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->string('delivery_status', 20)->change(); // Revert to original length
    });
}
};
