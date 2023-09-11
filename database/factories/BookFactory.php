<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        try{
            return [
                'name' => fake()->lastName(2),
                'slug' => fake()->slug(1),
                'category_id' => Category::all()->pluck('id')->random(),
                'author_id' => Author::all()->pluck('id')->random(),
                'thumbnail' => null,
                'price' => fake()->randomDigit(),
                'description' => fake()->paragraph()
            ];
        }catch(Exception $e){
            return "Please Add Author and Category first";
        }

    }
}
