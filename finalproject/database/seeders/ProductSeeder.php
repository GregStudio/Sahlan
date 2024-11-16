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
            'name'          => 'Nasi',
            'slug'          => 'nasi',
            'thumbnails'    => 'file/product/thumbnails/wsIiszQURHBMW95M6ezMXS1FuR2718Yfh3mYZZHC.jpg',
            'price'         => 1000,
            'weight'        => 1000,
            'stock'         => 100,
            'description'   => 'nasi'
        ]);
    }
}
