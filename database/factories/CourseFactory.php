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
            'book' => rand(0,1),
            'year' => rand(2010, 2021),
            'price' => rand(0,1)? rand(1,100): 0.00,
            'image' => fake()->imageUrl('https://t3.ftcdn.net/jpg/03/46/83/96/360_F_346839683_6nAPzbhpSkIpb8pmAwufkC7c5eD7wYws.jpg'),
            'description' => fake()->paragraph(),
            'link'=> fake()->url(),
            'submited_by' => User::all()->random()->id,
            'duration' => rand(0,2),
            'platform_id' => Platform::all()->random()->id,
        ];
    }
}
