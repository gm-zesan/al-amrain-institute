<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\CourseController as FrontendCourseController;
use App\Http\Controllers\backend\CourseController as BackendCourseController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\frontend\EnrollmentController as FrontendEnrollmentController;
use App\Http\Controllers\backend\EnrollmentController as BackendEnrollmentController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\TeamController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\backend\OurTeamController;
use App\Http\Controllers\backend\ReviewController;
use App\Http\Controllers\backend\ContactFormController as BackendContactFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\student\AuthenticationController;
use App\Http\Controllers\student\AccountController;
use App\Http\Controllers\student\CoursesController;
use App\Http\Controllers\student\CertificateController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::get('/team', [TeamController::class, 'index'])->name('frontend.team');
Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery');
Route::get('/course', [FrontendCourseController::class, 'index'])->name('frontend.course');
Route::get('/couese-details', [FrontendCourseController::class, 'details'])->name('frontend.course.details');
Route::get('/enroll', [FrontendEnrollmentController::class, 'index'])->name('frontend.enroll');


Route::get('/student-login', [AuthenticationController::class, 'index'])->name('student.login');
Route::get('/my-account', [AccountController::class, 'index'])->name('student.my-account');
Route::get('/courses', [CoursesController::class, 'index'])->name('student.courses');
Route::get('/certificate', [CertificateController::class, 'index'])->name('student.certificate');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/password-change', [DashboardController::class, 'changePassword'])->name('password-change.profile');
    Route::patch('/profile', [ProfileController::class, 'myProfileUpdate'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/dashboard/cache-clear', [DashboardController::class,'cacheClear'])->name('cache-clear');

    
    // Ck editor routes
    Route::get('ckeditor', [CkeditorController::class, 'index']);
    Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

    

    Route::get('/dashboard/our-team', [OurTeamController::class,'index'])->name('our-teams');
    Route::get('/dashboard/our-team/create', [OurTeamController::class,'create'])->name('our-team.create');
    Route::post('/dashboard/our-team/store', [OurTeamController::class,'store'])->name('our-team.store');
    Route::get('/dashboard/our-team/edit/{id}', [OurTeamController::class,'edit'])->name('our-team.edit');
    Route::post('/dashboard/our-team/update/{id}', [OurTeamController::class,'update'])->name('our-team.update');
    Route::get('/dashboard/our-team/delete/{id}', [OurTeamController::class,'delete'])->name('our-team.delete');

    // course resourse routes
    Route::resource('/dashboard/courses', BackendCourseController::class)->except(['show']);
    Route::resource('/dashboard/enrollments', BackendEnrollmentController::class)->except(['show', 'edit']);
    Route::resource('/dashboard/reviews', ReviewController::class)->except(['show', 'edit']);

    //message Route
    Route::get('/dashboard/message', [BackendContactFormController::class,'index'])->name('message');
});

require __DIR__.'/auth.php';
