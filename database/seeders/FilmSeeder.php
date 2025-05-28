<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('films')->insert([
            ['title' => 'Title 1', 'score' => 2, 'created_at' => now()->toDateTime()],
            ['title' => 'Title 2', 'score' => 3, 'created_at' => now()->toDateTime()]
        ]);
        
        DB::table('categories')->insert([
            ['title' => 'Cat 1', 'created_at' => now()->toDateTime()],
            ['title' => 'Cat 2', 'created_at' => now()->toDateTime()],
            ['title' => 'Cat 3', 'created_at' => now()->toDateTime()]
        ]);
        
        DB::table('films_categories')->insert([
            ['film_id' => 1, 'category_id' => 1],
            ['film_id' => 1, 'category_id' => 2],
            ['film_id' => 2, 'category_id' => 2],
            ['film_id' => 2, 'category_id' => 3],
        ]);

    }
}
