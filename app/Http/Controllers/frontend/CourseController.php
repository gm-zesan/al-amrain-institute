<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::withCount(['enrollments as enrolled_students_count' => function ($query) {
            $query->where('status', 'approved');
        }])->get();

        foreach ($courses as $course) {
            $starting_date = Carbon::parse($course->starting_date);
            $ending_date = Carbon::parse($course->end_date);
            $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);
        }
        return view('frontend.course', compact('courses'));
    }

    public function details($id)
    {
        $course = Course::withCount(['enrollments as enrolled_students_count' => function ($query) {
            $query->where('status', 'approved');
        }])->findOrFail($id);
    
        $starting_date = Carbon::parse($course->starting_date);
        $ending_date = Carbon::parse($course->end_date);
        $course->weeks = ceil($starting_date->diffInDays($ending_date) / 7);

        return view('frontend.course-details', compact('course'));
    }
}
