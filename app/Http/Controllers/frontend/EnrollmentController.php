<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentEnrollmentRequest;
use App\Models\Course;
use App\Models\User;
use App\Services\EnrollmentService;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    protected $enrollmentService;

    public function __construct(EnrollmentService $enrollmentService)
    {
        $this->enrollmentService = $enrollmentService;
    }

    public function index(Course $course)
    {
        $student = Session::get('student_id') ? User::find(Session::get('student_id')) : null;
        return view('frontend.enroll', compact('course', 'student'));
    }

    
    public function enroll(StudentEnrollmentRequest $request)
    {
        try{
            $student = $this->enrollmentService->getOrCreateStudent($request->validated());
            $enrollment = $this->enrollmentService->enrollStudent($student, $request->validated());
            if ($enrollment) {
                return redirect()->route('student.my-courses')->with('success', 'You have successfully enrolled in the course.');
            }
            return redirect()->back()->with('error', 'Failed to enroll in the course. Please try again.');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
}
