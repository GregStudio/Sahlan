<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id'            => 1,
            'categories_id' => 1,
            'name'          => 'Beras',
            'slug'          => 'beras',
            'thumbnails'    => 'file/product/thumbnails/beras.jpg',
            'price'         => '15000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'beras 1 kg'
        ]);
    }
}
