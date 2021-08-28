<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(30);
        return [
            'title' => $title,
            'body' => $this->faker->paragraph(2, true),
            'slug' => \Str::slug($title),
            'author_id' => $attributes['author_id'] ?? User::factory(),
            'category_id' => rand(1,4)
        ];
    }
}
