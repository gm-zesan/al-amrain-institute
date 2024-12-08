<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $enrollments = Review::all();
            return DataTables::of($enrollments)
                ->addIndexColumn()
                ->addColumn('course_id', function($row){
                    return $row->course->title;
                })
                ->addColumn('student_id', function($row){
                    return $row->student->name  . ' (' . $row->student->email . ')';
                })
                ->addColumn('rating', function($row){
                    $fullStars = $row->rating;
                    $emptyStars = 5 - $fullStars;
                    $stars = str_repeat('<i class="ri-star-fill text-warning"></i>', $fullStars);
                    $stars .= str_repeat('<i class="ri-star-line text-muted"></i>', $emptyStars);
                    $stars .= ' (' . $row->rating . ')';
                    return '<span class="rating-stars">' . $stars . '</span>';
                })
                ->addColumn('action-btn', function($row){
                    return $row->id;
                })
                ->rawColumns(['rating', 'action-btn'])
                ->make(true);
        }
        return view('admin.reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        $students = User::role('student')->get();
        return view('admin.reviews.create', compact('courses', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReviewRequest $request)
    {
        $validated = $request->validated();
        Review::create($validated);
        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, Review $review)
    {
        $review->status = $review->status === 'unpublished' ? 'published' : 'unpublished';
        $review->save();
        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
