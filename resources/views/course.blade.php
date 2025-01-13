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
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Course Detail --}}
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base/7 font-semibold text-gray-900">{{ $course->title }} By
                                {{ $course->instructor->name }}</h3>
                            <p class="mt-1 max-w-2xl text-sm/6 text-gray-500">{{ $course->description }}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                                @foreach ($course->lessons as $lesson)
                                    <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm/6">
                                        <div class="flex w-0 flex-1 items-center">
                                            <svg class="size-5 shrink-0 text-gray-400" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true" data-slot="icon">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 0 0-4.242 0l-7 7a3 3 0 0 0 4.241 4.243h.001l.497-.5a.75.75 0 0 1 1.064 1.057l-.498.501-.002.002a4.5 4.5 0 0 1-6.364-6.364l7-7a4.5 4.5 0 0 1 6.368 6.36l-3.455 3.553A2.625 2.625 0 1 1 9.52 9.52l3.45-3.451a.75.75 0 1 1 1.061 1.06l-3.45 3.451a1.125 1.125 0 0 0 1.587 1.595l3.454-3.553a3 3 0 0 0 0-4.242Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                                <span class="truncate font-medium">{{ $lesson->title }}</span>
                                                <span
                                                    class="shrink-0 text-gray-400">{{ Str::limit($lesson->content, 20) }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-4 shrink-0">
                                            <a href="#"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    {{-- Course Detail --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
