<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\CourseEnrollmentMail;
use App\Models\Course;
use App\Services\MailerLiteService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    protected const AL_AMRAIN_INSTITUTE_GROUP_ID = '140310240129189679';
    protected $mailerLiteService;

    

    public function __construct(MailerLiteService $mailerLiteService)
    {
        $this->mailerLiteService = $mailerLiteService;
    }
    
    public function index(Course $course)
    {
        return view('admin.courses.email', compact('course'));
    }
        

    // public function sendEmail(Request $request){
    //     $validated = $request->validate([
    //         'course_id' => 'required|exists:courses,id',
    //         'google_classroom_code' => 'required|string',
    //     ]);
    //     $course = Course::findOrFail($validated['course_id']);
    //     $course->google_classroom_code = $validated['google_classroom_code'];
    //     $course->save();

    //     $successCount = 0;
    //     $failureCount = 0;

    //     $course->enrollments()->where('status', 'approved')->chunk(50, function ($enrollments) use ($course, &$successCount, &$failureCount) {
    //         foreach ($enrollments as $enrollment) {
    //             $student = $enrollment->student;
    //             $emailContent = view('emails.course-enrolled', compact('student', 'course'))->render();

    //             $isAdded = $this->mailerLiteService->addStudentToMailerLiteGroup($student, self::AL_AMRAIN_INSTITUTE_GROUP_ID);
    //             if($isAdded){
    //                 $isSent = $this->mailerLiteService->sendMailViaMailerLite($student, $course, self::AL_AMRAIN_INSTITUTE_GROUP_ID, $emailContent);
    //                 if ($isSent) {
    //                     $successCount++;
    //                 } else {
    //                     $failureCount++;
    //                 }
    //             } else {
    //                 $failureCount++;
    //             }
    //         }
    //     });
    //     return redirect()->route('courses.index')->with('success', 'Emails sent successfully');
    // }


    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'google_classroom_code' => 'required|string',
        ]);
        $course = Course::findOrFail($validated['course_id']);
        $course->google_classroom_code = $validated['google_classroom_code'];
        $course->save();
        $course->enrollments()->where('status', 'approved')->chunk(50, function ($enrollments) use ($course) {
            foreach ($enrollments as $enrollment) {
                $student = $enrollment->student;
                Mail::to($student->email)->send(new CourseEnrollmentMail($student, $course));
            }
        });
        return redirect()->route('courses.index')->with('success', 'Emails sent successfully');
    }
}
