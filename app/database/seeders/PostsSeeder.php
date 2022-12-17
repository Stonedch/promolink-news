<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_id = Category::factory()->create();

        Post::factory(20)->create([
            'category_id' => $category_id,
        ]);

        $category_id = Category::factory()->create();

        Post::factory(10)->create([
            'is_draft' => false,
            'is_publicated' => false,
            'category_id' => $category_id,
        ]);

        $category_id = Category::factory()->create();

        Post::factory(10)->create([
            'is_draft' => true,
            'is_publicated' => false,
            'category_id' => $category_id,
        ]);
    }
}
