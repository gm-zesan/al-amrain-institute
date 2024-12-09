<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = array(
            array('id' => '1','title' => 'New Course','description' => '<p>hay</p>','type' => 'recorded','price' => '6000.00','image' => 'courses/Oev2PfvsLbiTp5HGaJbD6O5Lky4q3lYsXhamPie5.jpg','starting_date' => '2024-12-07','end_date' => '2024-12-20','what_will_learn' => '<p>sad</p>','prerequisites' => '<p>sad</p>','time_schedule' => '<p>sad</p>','total_seats' => '60','created_at' => '2024-12-05 11:13:47','updated_at' => '2024-12-05 11:13:47')
        );

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
