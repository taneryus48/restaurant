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
        Schema::table('products', function (Blueprint $table) {
            // Eğer category_id sütunu yoksa ekleyin
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            } else {
                // Eğer sütun varsa sadece foreign key ekle
                $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};
?>