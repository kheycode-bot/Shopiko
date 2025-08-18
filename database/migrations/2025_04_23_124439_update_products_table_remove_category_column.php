<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTableRemoveCategoryColumn extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Remove the old category column if it exists
            if (Schema::hasColumn('products', 'category')) {
                $table->dropColumn('category');
            }
            
            // Add foreign key constraint if it doesn't exist
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->constrained();
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // For rollback, add the category column back
            $table->string('category')->nullable();
            
            // Remove the foreign key constraint
            $table->dropForeign(['category_id']);
        });
    }
}