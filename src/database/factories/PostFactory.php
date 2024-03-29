<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title'         => $this->faker->text(10),
            'description'   => $this->faker->text(25),
            'content'       => $this->faker->text(200),
            'image'         => $this->faker->url(),
            'is_active'     => $this->faker->numberBetween(0, 1),
        ];
    }
}
