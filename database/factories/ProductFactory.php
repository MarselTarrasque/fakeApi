<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use App\Models\ProductFabricator;
use App\Models\ProductTaste;
use App\Models\ProductType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
            $productCategories = ['Протеин', 'Гейнер', 'Аминокислоты', 'Креатин'];
        $productCharacteristics = ['gold standard', 'platinum', 'ultimate', 'max power'];
        $productImages = ['https://habrastorage.org/r/w390/getpro/habr/upload_files/b86/0b5/312/b860b5312e98564aaa80f9c8f680cdda.jpg'];

        return [
            'name' =>  $this->faker->randomElement($productCharacteristics),
            'price' => $this->faker->numberBetween(1000, 10000), // Цена от 1000 до 10000 рублей
            'discount' => $this->faker->numberBetween(5, 50), // Скидка от 5% до 50%
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id,
            'weight' => $this->faker->numberBetween(5, 50), // Вес в граммах (по заданию 500 г)
            'product_fabricator_id' => ProductFabricator::inRandomOrder()->first()->id,
            'product_taste_id' => ProductTaste::inRandomOrder()->first()->id,
            'image' => $this->faker->randomElement($productImages), // Ссылка на фото
            'reviews' => $this->faker->numberBetween(0, 60), // Количество отзывов от 0 до 60
            'product_type_id' => ProductType::inRandomOrder()->first()->id,
            'description' => $this->faker->realText(100, 2), // Краткое описание о спортивном питании
        ];
    }
}
