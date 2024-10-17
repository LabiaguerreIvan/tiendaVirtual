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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->bigInteger('brand')->nullable();
                $table->decimal('price', total:10, places:2);
                $table->bigInteger('stock')->nullable();
                $table->bigInteger('state')->nullable();
                $table->bigInteger('tipe')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products'); // <- Si existe la tabla 'products' se elimina
    }
};
