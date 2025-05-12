<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'color')) {
                $table->string('color', 50)->after('des'); // Màu sắc
            }
            if (!Schema::hasColumn('products', 'size')) {
                $table->string('size', 10)->after('color');  // Kích thước
            }
            if (!Schema::hasColumn('products', 'sku')) {
                $table->string('sku', 30)->nullable()->after('size'); // Mã sản phẩm
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['color', 'size', 'sku']);
        });
    }
};
