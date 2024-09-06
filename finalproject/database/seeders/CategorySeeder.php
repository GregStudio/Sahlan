<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id'            => 1,
            'name'          => 'Bahan Pangan Pokok',
            'slug'          => 'bahan-pokok',
            'thumbnails'    => 'file/category/bahan-pokok.png'
        ]);

        Category::create([
            'id'            => 2,
            'name'          => 'Sumber Protein',
            'slug'          => 'sumber-protein',
            'thumbnails'    => 'file/category/sumber-protein.png'
        ]);

        Category::create([
            'id'            => 3,
            'name'          => 'Bahan Masak',
            'slug'          => 'bahan-masak',
            'thumbnails'    => 'file/category/bahan-masak.png'
        ]);

        Category::create([
            'id'            => 4,
            'name'          => 'Bumbu & Rempah',
            'slug'          => 'bumbu-rempah',
            'thumbnails'    => 'file/category/bumbu-rempah.png'
        ]);
    }
}
