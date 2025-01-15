<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
        ]);

        User::factory(9)->create()->each(function ($user) {
            $user->assignRole('student');
        });

        User::create([
            'name' => "Student ".fake()->name(),
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole('student');

        User::create([
            'name' => "Instructor ".fake()->name(),
            'email' => 'instructor@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole('instructor');

        Course::factory(20)->create();
        Lesson::factory(100)->create();

        User::create([
            'name' => "Admin ".fake()->name(),
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');


    }
}
