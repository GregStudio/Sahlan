<?php

namespace Database\Seeders;

use App\Models\ShippingAddress;
use Illuminate\Database\Seeder;

class ShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingAddress::create([
            'city_id'       => 122,
            'province_id'   => 23
        ]);
    }
}
