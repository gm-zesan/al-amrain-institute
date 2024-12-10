<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\CourseEnrollmentMail;
use App\Models\Course;
use App\Models\User;
use App\Services\MailerLiteService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use MailerLite\MailerLite;

class EmailController extends Controller
{
    protected const AL_AMRAIN_INSTITUTE_GROUP_ID = '140310240129189679';
    protected $mailerLiteService;
    // protected $mailerLite;

    public function __construct(MailerLiteService $mailerLiteService)
    {
        $this->mailerLiteService = $mailerLiteService;
    }
    
    public function index(Course $course)
    {
        return view('admin.courses.email', compact('course'));
    }

    public function sendEmail(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'google_classroom_code' => 'required|string',
        ]);
        $course = Course::findOrFail($validated['course_id']);
        $course->google_classroom_code = $validated['google_classroom_code'];
        $course->save();

        $groupId = self::AL_AMRAIN_INSTITUTE_GROUP_ID;
        $course->enrollments()->where('status', 'approved')->chunk(50, function ($enrollments) use ($course, $groupId) {
            foreach ($enrollments as $enrollment) {
                $student = $enrollment->student;
                // $this->mailerLiteService->addStudentToMailerLiteGroup($student, $groupId);
                // $this->mailerLiteService->sendMailViaMailerLite($student, $course, $groupId);
                $this->sendDirectEmail($student, $course);
            }
        });
        return redirect()->route('courses.index')->with('success', 'Emails sent successfully');
    }

    protected function sendDirectEmail($student, $course)
    {
        try {
            Mail::to($student->email)->queue(
                new CourseEnrollmentMail($student, $course)
            );
    
            Log::info('Email queued for: ' . $student->email);
            return 'Email successfully queued!';
        } catch (\Exception $e) {
            Log::error('Failed to queue email for ' . $student->email . ': ' . $e->getMessage());
            return 'Failed to queue the email.';
        }
    }
}
