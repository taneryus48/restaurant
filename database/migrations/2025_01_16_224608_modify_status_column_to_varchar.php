<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Status sütununu VARCHAR olarak değiştir
            $table->string('status', 20)->default('taslak')->change();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Status sütununu eski enum değerine geri döndür
            $table->enum('status', ['taslak', 'yayında'])->default('taslak')->change();
        });
    }
};
