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
        Schema::create('product_fabricators', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя товара (строка)
            $table->timestamps();
        });
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => \Database\Seeders\ProductFabricatorSeeder::class]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_fabricators');
    }
};
