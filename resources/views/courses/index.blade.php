<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    {{-- Flash Messages --}}
                    @if (session('success'))
                        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Add New Course button -->
                    <div class="mb-4">
                        <a href="{{ route('courses.create') }}"
                           class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700">
                            Add New Course
                        </a>
                    </div>

                    <hr class="my-4 border-gray-300 dark:border-gray-700">

                    @foreach ($courses as $course)
                        <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $course->title }}</h3>
                            <p class="text-gray-700 dark:text-gray-300">{{ $course->description }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Teacher: {{ $course->teacher?->name ?? 'N/A' }}
                            </p>

                            <div class="mt-3 flex space-x-2">
                                <a href="{{ route('courses.show', $course->id) }}"
                                   class="px-3 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700">
                                    Show
                                </a>

                                <a href="{{ route('courses.edit', $course->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600">
                                    Edit
                                </a>

                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
