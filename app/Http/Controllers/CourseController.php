<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\User;
use App\Services\CourseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CourseController extends Controller
{

    public function __construct(protected CourseService $courseService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = $this->courseService->findAll();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('courses.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request): RedirectResponse
    {

        $this->courseService->create($request);
        return redirect()->route('courses.index')->with('success','Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $course = $this->courseService->find($id);
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $course = $this->courseService->find($id);
        $teachers = User::where('role', 'teacher')->get();
        return view('courses.create', compact('course','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(int $id,UpdateCourseRequest $request): RedirectResponse
    {
        $this->courseService->update($id, $request);
        return redirect()->route('courses.index')->with('success','Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        if ($this->courseService->delete($id)) {
            return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
        }
        return redirect()->route('courses.index')->with('error', 'Course not deleted');
    }
}
