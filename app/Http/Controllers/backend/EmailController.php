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
    protected $mailerLiteService;
    // protected $mailerLite;

    public function __construct(MailerLiteService $mailerLiteService)
    {
        $this->mailerLiteService = $mailerLiteService;
    }
    // public function __construct()
    // {
    //     $this->mailerLite = new MailerLite(['api_key' => env('MAILERLITE_API_KEY')]);
    // }
    
    public function index(Course $course)
    {
        return view('admin.courses.email', compact('course'));
        // $groups = $this->mailerLite->groups->get();
        // dd($groups['body']['data']);
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
        $groupId = $this->mailerLiteService->getOrCreateMailerLiteGroup($course);
        $course->students()->chunk(50, function ($students) use ($course, $groupId) {
            foreach ($students as $student) {
                $this->mailerLiteService->addStudentToMailerLiteGroup($student, $groupId);
                $this->sendDirectEmail($student, $course);
            }
        });
        return redirect()->route('courses.index')->with('success', 'Emails sent successfully');
    }

    protected function sendDirectEmail($student, $course)
    {
        Mail::to($student->email)->queue(
            new CourseEnrollmentMail($student->name, $course)
        );

        Log::info('Email queued for: ' . $student->email);
    }
}
