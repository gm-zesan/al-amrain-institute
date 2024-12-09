<?php

namespace Database\Seeders;

use App\Models\Enrollment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enrollments = array(
            array('id' => '1','student_id' => '3','course_id' => '1','payment_method' => 'bank_transfer','transaction_id' => 'BIM1S0JM6LAE','total_amount' => '6000.00','is_certificate_enabled' => '0','status' => 'pending','created_at' => '2024-12-05 11:40:15','updated_at' => '2024-12-07 05:19:08')
        );

        foreach ($enrollments as $enrollment) {
            Enrollment::create($enrollment);
        }
    }
}
