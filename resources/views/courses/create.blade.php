@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container">
        <h1>{{ isset($course) ? 'Edit Course' : 'Add New Course' }}</h1>

        <form action="{{ isset($course) ? route('courses.update', $course->id) : route('courses.store') }}" method="POST">
            @csrf
            @if(isset($course))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="title" class="form-label">Course Title</label>
                <input type="text" name="title" id="title" class="form-control"
                       value="{{ old('title', $course->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Course Description</label>
                <textarea name="description" id="description" rows="4" class="form-control" required>{{ old('description', $course->description ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="teacher_id" class="form-label">Teacher</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
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
                <input type="hidden" name="id" value="{{$course->id}}">
            @endif

            <button type="submit" class="btn btn-primary">
                {{ isset($course) ? 'Update' : 'Save' }}
            </button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
