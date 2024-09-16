<?php

namespace Database\Seeders;

use App\Models\WebConfig;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebConfig::create([
            'name'  => 'app_name',
            'label' => 'Nama Aplikasi',
            'value' => 'Larisa Shop',
            'type'  => 0
        ]);

        WebConfig::create([
            'name'  => 'app_logo',
            'label' => 'Logo',
            'type'  => 2
        ]);
    }
}
