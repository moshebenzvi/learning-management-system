<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function welcome()
    {
        $courses = Course::with('instructor')->withCount(['lessons', 'enrolledUsers'])->get();
        return view('dashboard', compact('courses'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Course::with('instructor', 'lessons', 'enrolledUsers')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $courses = $course->load('instructor', 'lessons');
        return view('course', compact('courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
