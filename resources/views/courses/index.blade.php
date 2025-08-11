@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-success">Add New Course</a>
        <hr>
        @foreach ($courses as $course)
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <p class="text-muted">
                        Teacher: {{ $course->teacher?->name ?? 'N/A' }}
                    </p>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this course?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
