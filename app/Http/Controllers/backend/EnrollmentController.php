<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class EnrollmentController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $enrollments = Enrollment::all();
            return DataTables::of($enrollments)
                ->addIndexColumn()
                ->addColumn('course_id', function($row){
                    return $row->course->title;
                })
                ->addColumn('student_id', function($row){
                    return $row->student->name;
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.enrollments.index');
    }

    // Show the form for creating a new enrollment
    public function create()
    {
        $courses = Course::all();
        $students = User::role('student')->get();
        return view('admin.enrollments.create', compact('courses', 'students'));
    }

    // Store a newly created enrollment in storage
    public function store(EnrollmentRequest $request)
    {
        $validated = $request->validated();
        Enrollment::create($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
    }

    // Show the form for editing the specified enrollment
    public function edit(Enrollment $enrollment)
    {
        return view('admin.enrollments.edit', compact('enrollment')); 
    }

    // Update the specified enrollment in storage
    public function update(EnrollmentRequest $request, Enrollment $enrollment)
    {
        dd($enrollment);
        $validated = $request->validated();
        $enrollment->update($validated);
        return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
    }

    // Remove the specified enrollment from storage
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
    }
}