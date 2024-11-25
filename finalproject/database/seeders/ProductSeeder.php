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
            'description'   => 'Beras 1 Kg'
        ]);

        Product::create([
            'id'            => 2,
            'categories_id' => 1,
            'name'          => 'Beras Merah',
            'slug'          => 'beras-merah',
            'thumbnails'    => 'file/product/thumbnails/beras-merah.png',
            'price'         => '20000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Beras Merah 1 Kg'
        ]);

        Product::create([
            'id'            => 3,
            'categories_id' => 2,
            'name'          => 'Telur Ayam',
            'slug'          => 'telur-ayam',
            'thumbnails'    => 'file/product/thumbnails/telur-ayam.jpg',
            'price'         => '25000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Telur Ayam 1 Kg'
        ]);

        Product::create([
            'id'            => 4,
            'categories_id' => 2,
            'name'          => 'Telur Bebek',
            'slug'          => 'telur-bebek',
            'thumbnails'    => 'file/product/thumbnails/telur-bebek.jpg',
            'price'         => '30000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Telur Bebek 1 Kg'
        ]);

        Product::create([
            'id'            => 5,
            'categories_id' => 3,
            'name'          => 'Minyak Goreng Bimoli 1 Liter',
            'slug'          => 'minyak-goreng-bimoli-1-liter',
            'thumbnails'    => 'file/product/thumbnails/minyak-goreng-bimoli-1-liter.jpg',
            'price'         => '20000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Minyak Goreng Bimoli 1 Liter'
        ]);

        Product::create([
            'id'            => 6,
            'categories_id' => 3,
            'name'          => 'Minyak Goreng Bimoli 2 Liter',
            'slug'          => 'minyak-goreng-bimoli-2-liter',
            'thumbnails'    => 'file/product/thumbnails/minyak-goreng-bimoli-2-liter.jpg',
            'price'         => '35000',
            'weight'        => '2000',
            'stock'         => '100',
            'description'   => 'Minyak Goreng Bimoli 2 Liter'
        ]);

        Product::create([
            'id'            => 7,
            'categories_id' => 4,
            'name'          => 'Bawang Merah',
            'slug'          => 'bawang-merah',
            'thumbnails'    => 'file/product/thumbnails/bawang-merah.jpeg',
            'price'         => '40000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Bawang Merah 1 Kg'
        ]);

        Product::create([
            'id'            => 8,
            'categories_id' => 4,
            'name'          => 'Bawang Putih',
            'slug'          => 'bawang-putih',
            'thumbnails'    => 'file/product/thumbnails/bawang-putih.jpeg',
            'price'         => '45000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'Bawang Putih 1 Kg'
        ]);
    }
}
