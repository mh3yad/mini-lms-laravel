<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl font-bold mb-6">All Courses</h1>

        <div class="bg-white shadow rounded-lg mb-4">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h3>
                <p class="mt-2 text-gray-600">{{ $course->description }}</p>
                <p class="mt-4 text-sm text-gray-500">
                    Teacher: {{ $course->teacher?->name ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
