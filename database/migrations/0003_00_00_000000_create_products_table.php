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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Имя товара (строка)
            $table->decimal('price', 8, 2); // Цена товара (десятичное число)
            $table->integer('discount'); // Скидка (целое число)
            $table->unsignedBigInteger('product_category_id'); // Категория товара (строка)
            $table->unsignedInteger('weight'); // Вес (строка)
            $table->unsignedBigInteger('product_fabricator_id'); // Производитель (строка)
            $table->unsignedBigInteger('product_taste_id'); // Вкус (строка)
            $table->string('image'); // Изображение (строка, храним путь к файлу)
            $table->integer('reviews'); // Количество отзывов (целое число)
            $table->string('product_type_id'); // Тип продукта (строка)
            $table->text('description'); // Описание (длинный текст)
            $table->timestamps();

            $table->foreign('product_category_id')
                ->references('id')
                ->on('product_categories');

            $table->foreign('product_fabricator_id')
                ->references('id')
                ->on('product_fabricators');

            $table->foreign('product_taste_id')
                ->references('id')
                ->on('product_tastes');

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types');
        });
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => \Database\Seeders\ProductSeeder::class]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
