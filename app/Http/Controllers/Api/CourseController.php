<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{

    public function __construct(protected CourseService $courseService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $courses = $this->courseService->findAll();
        return response()->json($courses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): JsonResponse
    {
        $this->courseService->create($request);
        return response()->json(['success' => true, 'message' => 'Course created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
       $course = $this->courseService->find($id);
       return response()->json($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id,UpdateCourseRequest $request): JsonResponse
    {
        $this->courseService->update($id,$request);
        return response()->json(['success' => true, 'message' => 'Course updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->courseService->delete($id);
        return response()->json(['success' => true, 'message' => 'Course deleted successfully']);
    }
}
