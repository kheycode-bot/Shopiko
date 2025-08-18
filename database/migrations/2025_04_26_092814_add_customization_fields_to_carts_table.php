<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->json('customization_data')->nullable()->after('image');
            $table->string('preview_image')->nullable()->after('customization_data');
        });
    }
    
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn(['customization_data', 'preview_image']);
        });
    }
};
