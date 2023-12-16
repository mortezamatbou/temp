<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();

        User::factory()->create([
            'name' => 'Mori',
            'email' => 'mori@lobdown.com',
            'password' => '123456789'
        ]);

        User::factory()->create([
            'name' => 'Ali',
            'email' => 'ali@lobdown.com',
            'password' => '123456789'
        ]);

        User::factory()->create([
            'name' => 'Hossein',
            'email' => 'hossein@lobdown.com',
            'password' => '123456789'
        ]);
    }
}
