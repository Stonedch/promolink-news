<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Post::factory(20)->create();
        Post::factory(10)->create([
            'is_draft' => false,
            'is_publicated' => false,
        ]);
        Post::factory(10)->create([
            'is_draft' => true,
            'is_publicated' => false,
        ]);
    }
}
