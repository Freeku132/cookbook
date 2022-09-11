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
            'user_id' => $this->faker->numberBetween(1,100),
            'title' => ucwords($this->faker->sentence(5)),
            'slug' => $this->faker->sentence(5),
            'body' => $this->faker->paragraph,
            'excerpt' => $this->faker->sentence(5),
            'created_at' => $this->faker->dateTimeBetween(now()->subYear(1), now())
        ];
    }
}
