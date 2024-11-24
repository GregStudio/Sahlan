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

        Product::create([
            'id'            => 2,
            'categories_id' => 1,
            'name'          => 'Beras Merah',
            'slug'          => 'beras-merah',
            'thumbnails'    => 'file/product/thumbnails/beras-merah.png',
            'price'         => '15000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'beras merah 1 kg'
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
            'description'   => 'telur ayam 1 kg'
        ]);

        Product::create([
            'id'            => 4,
            'categories_id' => 2,
            'name'          => 'Telur Bebek',
            'slug'          => 'telur-bebek',
            'thumbnails'    => 'file/product/thumbnails/telur-bebek.jpg',
            'price'         => '25000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'telur bebek 1 kg'
        ]);

        Product::create([
            'id'            => 5,
            'categories_id' => 3,
            'name'          => 'Minyak Goreng Bimoli 1 Liter',
            'slug'          => 'minyak-goreng-bimoli-1-liter',
            'thumbnails'    => 'file/product/thumbnails/minyak-goreng-bimoli-1-liter.jpg',
            'price'         => '15000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'minyak goreng bimoli 1 liter'
        ]);

        Product::create([
            'id'            => 6,
            'categories_id' => 3,
            'name'          => 'Minyak Goreng Bimoli 2 Liter',
            'slug'          => 'minyak-goreng-bimoli-2-liter',
            'thumbnails'    => 'file/product/thumbnails/minyak-goreng-bimoli-2-liter.jpg',
            'price'         => '30000',
            'weight'        => '2000',
            'stock'         => '100',
            'description'   => 'minyak goreng bimoli 2 liter'
        ]);

        Product::create([
            'id'            => 7,
            'categories_id' => 4,
            'name'          => 'Bawang Merah',
            'slug'          => 'bawang-merah',
            'thumbnails'    => 'file/product/thumbnails/bawang-merah.jpeg',
            'price'         => '25000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'bawang merah 1 kg'
        ]);

        Product::create([
            'id'            => 8,
            'categories_id' => 4,
            'name'          => 'Bawang Putih',
            'slug'          => 'bawang-putih',
            'thumbnails'    => 'file/product/thumbnails/bawang-putih.jpeg',
            'price'         => '25000',
            'weight'        => '1000',
            'stock'         => '100',
            'description'   => 'bawang putih 1 kg'
        ]);
    }
}
