<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->title();

        return [
            'image' => $this->faker->imageUrl,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(200),
            'user_id' => random_int(1,5),
            'category_id' => random_int(1,10),


        ];
    }
}
