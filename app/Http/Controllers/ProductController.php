<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $allowedSearchParams = [
            ['name' => 'search'], // like
            ['name' => 'price'], // range
            ['name' => 'weight'], // range
            ['name' => 'category',
                'construct' => [
                    'class_name' => 'ProductCategory',
                    'fields' => [
                        'this' => 'product_category_id',
                        'related' => 'name'
                    ]
                ]
            ],
            ['name' => 'taste',
                'construct' => [
                    'class_name' => 'ProductTaste',
                    'fields' => [
                        'this' => 'product_taste_id',
                        'related' => 'name'
                    ]
                ]
            ],
            ['name' => 'fabricator',
                'construct' => [
                    'class_name' => 'ProductFabricator',
                    'fields' => [
                        'this' => 'product_taste_id',
                        'related' => 'name'
                    ]
                ]
            ],
        ];
//        $search = $request->input('search'); // более простой метод (дублирование кода)
        function search_in_array_by_key($haystack, $key, $needle)
        {
            foreach ($haystack as $item) {
                if (isset($item[$key]) && $item[$key] === $needle) {
                    return $item;
                }
            }
            return false;
        }


        $query = Product::query();

        foreach ($request->query() as $key => $value) {
            if ($item = search_in_array_by_key($allowedSearchParams, 'name', $key)) {
                if (isset($item['construct']) && isset($item['construct']['class_name'])) {
                    $itemId = app("App\Models\\" . $item['construct']['class_name'])::where($item['construct']['fields']['related'], $value)->first();
                    if ($itemId) $itemId = $itemId->id;
                    if ($itemId) {
                        $query->where($item['construct']['fields']['this'], $itemId);
                    }
                } else {
                    $query->where($key, $value);
                }
            }
        }

        $products = $query->get();

        return response()->json($products);
    }
}
