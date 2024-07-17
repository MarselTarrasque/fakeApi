<?php

namespace Database\Seeders;

use App\Models\ProductFabricator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductFabricatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'name' => 'Maxler',
            ],
            [
                'name' => 'Optimum Nutrition',
            ],
            [
                'name' => 'GeneticLab Nutrition',
            ],
            [
                'name' => 'Bombbar',
            ],
            [
                'name' => 'Rline',
            ],
        ];

        foreach ($items as $item) {
            ProductFabricator::create($item);
        }
    }
}
