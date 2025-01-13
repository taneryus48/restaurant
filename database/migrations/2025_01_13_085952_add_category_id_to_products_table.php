<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->after('id'); // Sütunu ekle
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Foreign key
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Foreign key'i kaldır
            $table->dropColumn('category_id'); // Sütunu kaldır
        });
    }
};
