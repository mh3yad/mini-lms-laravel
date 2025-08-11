<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 sm:px-6 lg:px-8">
        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6">
            {{ isset($course) ? 'Edit Course' : 'Add New Course' }}
        </h1>

        <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST" class="space-y-6 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            @csrf
            @if(isset($course))
                @method('PUT')
            @endif

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Course Title
                </label>
                <input type="text" name="title" id="title"
                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200"
                       value="{{ old('title', $course->title ?? '') }}" required>
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Course Description
                </label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200"
                          required>{{ old('description', $course->description ?? '') }}</textarea>
            </div>

            {{-- Teacher --}}
            <div>
                <label for="teacher_id" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Teacher
                </label>
                <select name="teacher_id" id="teacher_id"
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200"
                        required>
                    <option value="">-- Select Teacher --</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                                {{ old('teacher_id', $course->teacher_id ?? '') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if(isset($course))
                <input type="hidden" name="id" value="{{ $course->id }}">
            @endif

            {{-- Buttons --}}
            <div class="flex items-center space-x-4">
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-200">
                    {{ isset($course) ? 'Update' : 'Save' }}
                </button>
                <a href="{{ route('courses.index') }}"
                   class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring focus:ring-gray-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
