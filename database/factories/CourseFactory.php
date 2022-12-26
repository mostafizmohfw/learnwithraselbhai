<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence(),
            'type' => rand(0,1),
            'slug' => fake()->slug,
            'resources' => rand(1,50),
            'year' => rand(2010, 2021),
            'price' => rand(0,1)? rand(1,100): 0.00,
            'image' => rand(1,10),
            'description' => fake()->paragraph(8),
            'link'=> fake()->url(),
            'submited_by' => User::all()->random()->id,
            'duration' => rand(0,2),
            'difficulty_level' => rand(0, 2),
            'platform_id' => Platform::all()->random()->id,
        ];
    }
}
