<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = Category::factory(20)
            ->create();

        Author::factory(20)
            ->has(
                Post::factory(5)
                ->state(fn (array $attributes, Author $author) => ['category_id'=> $categories->random(1)->first()->id]),
                'posts'
            )
            ->create();
    }
}
