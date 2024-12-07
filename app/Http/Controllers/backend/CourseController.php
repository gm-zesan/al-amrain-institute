<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use DataTables;

class CourseController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $courses = Course::all();
            return DataTables::of($courses)
                ->addIndexColumn()
                ->addColumn('price', function($row){
                    return '৳ '.$row->price;
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['action-btn'])
                ->make(true);
        }
        return view('admin.courses.index');
    }

    public function create(){
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        Course::create($validated);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }


    public function edit(Course $course){
        return view('admin.courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, Course $course){
        $validated = $request->validated();
        if ($request->hasFile('image')) {
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }
        $course->update($validated);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy(Course $course){
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
