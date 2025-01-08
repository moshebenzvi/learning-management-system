<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::inRandomOrder()->first()->id,
            'title' => fake()->unique()->jobTitle(),
            'content' => fake()->realText(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Lesson $lesson) {
            for ($i = 0; $i < fake()->randomDigitNotNull(); $i++) {
                $lesson->completedByUsers()->attach(User::inRandomOrder()->first());
            }
        });
    }
}
