<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Eğer 'category_id' sütunu varsa kontrol et ve kaldır.
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropColumn('category_id'); // Sütunu kaldır.
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Geri döndürüldüğünde 'category_id' sütununu yeniden oluştur.
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            }
        });
    }
};
