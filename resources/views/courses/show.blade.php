@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Courses</h1>
            <div class="card mb-3">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->title }}</h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <p class="text-muted">
                        Teacher: {{ $course->teacher?->name ?? 'N/A' }}
                    </p>
                </div>
            </div>
    </div>
@endsection
