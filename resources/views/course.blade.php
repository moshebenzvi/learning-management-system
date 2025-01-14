<x-app-layout>
    <x-slot name="header">
        <div class="inline-flex rounded-md shadow-sm" role="group">
            <a href="{{ route('course.create') }}" type="button"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-green-700 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-green-700 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-green-700 dark:focus:bg-green-700">
                Add New Lesson
            </a>
            <a href="{{ route('course.edit', $course->id) }}" type="button"
                class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-yellow-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-yellow-400 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:bg-yellow-400">
                Edit Course
            </a>
            <form action="{{ route('course.destroy', $course->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-red-700 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-red-700 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-red-700 dark:focus:bg-red-700">
                    Delete Course
                </button>
            </form>
        </div>
        // TODO: new lesson modal input
    </x-slot>

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
                                                <a href="#" data-modal-target="large-modal-{{ $lesson->id }}"
                                                    data-modal-toggle="large-modal-{{ $lesson->id }}"
                                                    class="truncate font-medium">{{ $lesson->title }}</a>
                                                <span
                                                    class="shrink-0 text-gray-400">{{ Str::limit($lesson->content, 20) }}</span>
                                            </div>
                                        </div>
                                        <div class="ml-4 shrink-0">
                                            <a href="#"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                        </div>
                                    </li>

                                    <!-- Large Modal -->
                                    <div id="large-modal-{{ $lesson->id }}" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-4xl max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                                        {{ $lesson->title }}
                                                    </h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-hide="large-modal">
                                                        <svg class="w-3 h-3" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:p-5 space-y-4">
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        {{ $course->description }}
                                                    </p>
                                                    <p
                                                        class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        {{ $lesson->content }}
                                                    </p>
                                                </div>
                                                <!-- Modal footer -->
                                                {{--
                                                <div
                                                    class="flex items-center p-4 md:p-5 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <button data-modal-hide="large-modal" type="button"
                                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                                                        accept</button>
                                                    <button data-modal-hide="large-modal" type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                                </div>
                                                --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Large Modal -->
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
