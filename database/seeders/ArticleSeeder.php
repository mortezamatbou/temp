<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles_status')->insert([
            ['title' => 'active', 'created_at' => now()->toDateTime()],
            ['title' => 'disable', 'created_at' => now()->toDateTime()],
            ['title' => 'deleted', 'created_at' => now()->toDateTime()]
        ]);

        Article::factory(10)->create();

    }
}
