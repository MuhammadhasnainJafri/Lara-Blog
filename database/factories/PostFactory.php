<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'        => $this->faker->title(),
            'body'         => $this->faker->paragraph(30),
            'user_id'      => rand(1, 10),
            'category_id'  => rand(1, 10),
            'is_published' => rand(0, 1),
            'post_thumbnail'=> 'https://source.unsplash.com/random'
        ];
    }
}
