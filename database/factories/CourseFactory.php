<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => fake()->unique()->jobTitle(),
            'description' => fake()->realText(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Course $course) {
            for ($i = 0; $i < fake()->randomDigitNotNull(); $i++) {
                $course->enrolledUsers()->attach(User::inRandomOrder()->first());
            }
        });
    }
}
