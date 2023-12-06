<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create a default administrator user
         \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone' => '0507619679',
            'password'=>'admin@gmail.com',
            'profile' =>'',
            'role_id'=> 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'phone' => '0593958236',
            'password'=>'user@gmail.com',
            'profile' =>'',
            'role_id'=> 2,
        ]);
    }
}
