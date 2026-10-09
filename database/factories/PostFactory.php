<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'user_id' => null,
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => null,
            'content' => fake()->paragraphs(4, true),
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now(),
        ];
    }
}
