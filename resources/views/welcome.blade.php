<?php

use App\Models\Course;

$courses = Course::with('instructor')->withCount(['lessons', 'enrolledUsers'])->paginate(5);

?>

<x-app-layout>
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 text-gray-900 dark:text-gray-100">

                    {{-- Course List --}}
                    <ul role="list" class="divide-y divide-gray-100">
                        @foreach ($courses as $course)
                            <li class="flex justify-between gap-x-6 py-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <img class="size-12 flex-none rounded-full bg-gray-50"
                                        src="https://i.pravatar.cc/150?img={{ fake()->numberBetween(1, 70) }}"
                                        alt="">
                                    <div class="min-w-0 flex-auto">
                                        <a href="{{ route('course.show', $course->id) }}" class="text-sm/6 font-semibold text-gray-900">{{ $course->title }}</a>
                                        <p class="mt-1 truncate text-xs/5 text-gray-500">{{ $course->description }}</p>
                                    </div>
                                </div>
                                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                    <p class="text-sm/6 text-gray-900">{{ $course->instructor->name }}</p>
                                    <p class="mt-1 text-xs/5 text-gray-500">{{ $course->lessons_count }} Lesson <time
                                            datetime="2023-01-23T13:23Z">& {{ $course->enrolled_users_count }} User</time></p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{-- Course List --}}
                </div>
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
