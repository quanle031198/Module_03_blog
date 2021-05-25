<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->title,
            'summary' => $this->faker->paragraph(),
            'summary_img' => 'images/GrH4z9g9VhYiQJHpau73KVijowiWaVa4UchUi7ke.jpg',
            'summary' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'source' => $this->faker->text(),
            'created' => $this->faker->date(),
            'category_id' => 1
            // 'comment_id' => null
        ];
    }
}
