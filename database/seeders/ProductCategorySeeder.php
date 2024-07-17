<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Протеин',
            ],
            [
                'name' => 'Креатин',
            ],
            [
                'name' => 'Гейнеры',
            ],
            [
                'name' => 'Аминокислоты',
            ],
            [
                'name' => 'Восстановители',
            ],
            [
                'name' => 'Витамины',
            ],
        ];

        foreach ($items as $item) {
            ProductCategory::create($item);
        }
    }
}
