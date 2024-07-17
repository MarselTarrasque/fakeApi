<?php

namespace Database\Seeders;

use App\Models\ProductTaste;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Молочный шоколад',
            ],
            [
                'name' => 'Шоколад',
            ],
            [
                'name' => 'Клубника',
            ],
            [
                'name' => 'Банан',
            ],
            [
                'name' => 'Булочка с корицей',
            ],
            [
                'name' => 'Вишневый чизкейк',
            ],
        ];

        foreach ($items as $item) {
            ProductTaste::create($item);
        }
    }
}
