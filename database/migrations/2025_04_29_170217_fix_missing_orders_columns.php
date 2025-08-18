<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'unit_price')) {
                $table->decimal('unit_price', 10, 2)->after('price')->nullable();
            }
            
            if (!Schema::hasColumn('orders', 'color')) {
                $table->string('color')->after('customization_data')->nullable();
            }
            
            if (!Schema::hasColumn('orders', 'preview_image')) {
                $table->string('preview_image')->after('image')->nullable();
            }
            
            if (!Schema::hasColumn('orders', 'total_price')) {
                $table->decimal('total_price', 10, 2)->after('payment_status');
            }
            
            if (!Schema::hasColumn('orders', 'order_date')) {
                $table->timestamp('order_date')->after('total_price')->nullable();
            }
        });
    }
    
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'unit_price', 
                'color', 
                'preview_image', 
                'total_price', 
                'order_date'
            ]);
        });
    }
};
