<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(rand(5, 10), true),
            'body' => fake()->paragraph(rand(20, 30)),
            'is_draft' => false,
            'is_publicated' => true,
            'publicated_at' => now(),
            'user_id' => UserFactory::new(),
            'category_id' => CategoryFactory::new(),
        ];
    }
}
