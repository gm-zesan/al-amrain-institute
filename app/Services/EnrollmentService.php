<?php

namespace App\Services;

use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class EnrollmentService
{
    /**
     * Get existing student or create a new one.
     *
     * @param array $validatedStudentData
     * @return User
     * @throws \Exception
     */
    public function getOrCreateStudent(array $validatedStudentData): User
    {
        if (Session::has('student_id')) {
            $student = User::find(Session::get('student_id'));
            if (!$student) {
                throw new \Exception('Invalid session data. Please log in again.');
            }
            return $student;
        }
        $student = User::create([
            'name' => $validatedStudentData['name'],
            'email' => $validatedStudentData['email'],
            'phone_no' => $validatedStudentData['phone_no'],
            'password' => bcrypt($validatedStudentData['phone_no']),
        ]);
        Session::put('student_id', $student->id);
        Session::put('student_name', $student->name);
    
        return $student;
    }
    /**
     * Enroll a student in a course.
     *
     * @param User $student
     * @param array $validatedEnrollmentData
     * @return Enrollment
     * @throws \Exception
     */
    public function enrollStudent(User $student, array $validatedEnrollmentData): Enrollment
    {
        $existingEnrollment = Enrollment::where('course_id', $validatedEnrollmentData['course_id'])
            ->where('student_id', $student->id)
            ->exists();
        if ($existingEnrollment) {
            throw new \Exception('You have already enrolled in this course.');
        }
        return Enrollment::create([
            'course_id' => $validatedEnrollmentData['course_id'],
            'student_id' => $student->id,
            'payment_method' => $validatedEnrollmentData['payment_method'],
            'transaction_id' => $validatedEnrollmentData['transaction_id'],
            'total_amount' => $validatedEnrollmentData['total_amount'],
            'is_certificate_enabled' => 0,
            'status' => 'pending',
        ]);
    }

}
