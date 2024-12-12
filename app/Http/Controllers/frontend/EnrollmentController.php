<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollmentRequest;
use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\User;
use App\Services\EnrollmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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

    
    public function enroll(Request $request)
    {
        dd('enroll');
        DB::beginTransaction();
        try {
            $studentData = $request->only(['name', 'email', 'phone_no']);
            $enrollmentData = $request->only(['course_id', 'payment_method', 'transaction_id', 'total_amount']);

            $student = $this->enrollmentService->getOrCreateStudent($studentData);
            $this->enrollmentService->enrollStudent($student, $enrollmentData);
            DB::commit();
            return redirect()->route('student.my-courses')->with('success', 'Enrollment successful');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
