<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyStatusColumnInProductsTable extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published'])->default('draft')->change();
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('status')->change(); // Eski türünü buraya yaz
        });
    }
}
?>