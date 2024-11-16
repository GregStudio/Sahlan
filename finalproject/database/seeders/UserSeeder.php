<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'cashier']);
        
        $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('password')
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('password')
        ]);
        $user->assignRole('user');

        $user = User::create([
            'name'      => 'Cashier',
            'email'     => 'cashier@gmail.com',
            'password'  => bcrypt('password')
        ]);
        $user->assignRole('cashier');
    }
}
