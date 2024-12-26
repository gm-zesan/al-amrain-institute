<?php

use App\Http\Controllers\backend\AssignRoleController;
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
use App\Http\Controllers\backend\EmailController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\StudentController;
use App\Http\Controllers\backend\TeacherController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\student\AuthenticationController;
use App\Http\Controllers\student\AccountController;
use App\Http\Controllers\student\CoursesController;
use App\Http\Controllers\student\CertificateController;
use App\Http\Middleware\StudentMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('frontend.home');
Route::get('/about', [AboutController::class, 'index'])->name('frontend.about');
Route::get('/contact', [ContactController::class, 'index'])->name('frontend.contact');
Route::post('/contact', [ContactController::class,'store'])->name('frontend.contact.store');
Route::get('/team', [TeamController::class, 'index'])->name('frontend.team');
Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery');
Route::get('/course', [FrontendCourseController::class, 'index'])->name('frontend.course');
Route::get('/course/{id}', [FrontendCourseController::class, 'details'])->name('frontend.course.details');
Route::get('/courses/search', [FrontendCourseController::class, 'search'])->name('courses.search');

Route::get('/enroll/{course}', [FrontendEnrollmentController::class, 'index'])->name('frontend.enroll');
Route::post('/enroll', [FrontendEnrollmentController::class, 'enroll'])->name('frontend.enroll.submit');


Route::prefix('student')->name('student.')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('processLogin');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
    
    Route::middleware([StudentMiddleware::class])->group(function(){
        Route::get('/my-account', [AccountController::class, 'index'])->name('my-account');
        Route::put('/my-account/{student}', [AccountController::class, 'update'])->name('my-account.update');
        Route::get('/my-courses', [CoursesController::class, 'index'])->name('my-courses');
        Route::post('/reviews/{course}', [CoursesController::class, 'submitReview'])->name('reviews.store');
        Route::get('/certificate', [CertificateController::class, 'index'])->name('certificate');
        Route::get('/certificate/{certificateId}/download', [CertificateController::class, 'downloadCertificate'])->name('certificate.download');
        Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    });
});



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

    // resourse routes
    Route::resource('/dashboard/courses', BackendCourseController::class)->except(['show']);
    Route::get('/dashboard/courses/{course}/certificate-status', [BackendCourseController::class, 'certificateStatus'])->name('courses.certificate-status');
    Route::resource('/dashboard/enrollments', BackendEnrollmentController::class)->except(['show', 'edit']);
    Route::resource('/dashboard/reviews', ReviewController::class)->except(['show', 'edit']);
    Route::resource('/dashboard/students', StudentController::class)->except(['show']);
    Route::resource('/dashboard/teachers', TeacherController::class)->except(['show']);

    //message Route
    Route::get('/dashboard/message', [BackendContactFormController::class,'index'])->name('message');
    Route::get('/dashboard/message/read/', [BackendContactFormController::class, 'read'])->name('message.read');
    Route::get('/dashboard/message/important/', [BackendContactFormController::class, 'important'])->name('message.important');
    Route::get('/dashboard/message/delete/{id}', [BackendContactFormController::class,'delete'])->name('message.delete');

    // send-email Route
    Route::get('/dashboard/courses/{course}/email', [EmailController::class,'index'])->name('course.email');
    Route::post('/dashboard/courses/send-email', [EmailController::class,'sendEmail'])->name('course.send-email');


    // users and roles
    // User Route
    Route::get('/dashboard/users', [UserController::class,'index'])->name('users');
    Route::get('/dashboard/user/create', [UserController::class,'create'])->name('user.create');
    Route::post('/dashboard/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/dashboard/user/edit/{id}', [UserController::class,'edit'])->name('user.edit');
    Route::post('/dashboard/user/update/{id}', [UserController::class,'update'])->name('user.update');
    Route::get('/dashboard/user/delete/{id}', [UserController::class,'delete'])->name('user.delete');

    // Assign Role Route
    Route::get('/dashboard/assign-role', [AssignRoleController::class,'index'])->name('assignrole.index');
    Route::post('/dashboard/assign-role/store', [AssignRoleController::class,'assignRole'])->name('assignrole.store');
});

require __DIR__.'/auth.php';
