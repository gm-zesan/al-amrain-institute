<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('frontend.course');
    }

    public function details()
    {
        return view('frontend.course-details');
    }
}
