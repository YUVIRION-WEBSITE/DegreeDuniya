<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UniversityController as AdminUniversityController;
use App\Http\Controllers\Admin\CollegeController as AdminCollegeController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\UniversityController;
use App\Http\Controllers\Public\CollegeController;
use App\Http\Controllers\Public\CourseController;
use App\Http\Controllers\Public\EnquiryController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Api\HomeController as ApiHomeController;

Route::get('/home-data', [ApiHomeController::class, 'index']);

Route::get('/welcome', function () {
    return "hello";
});

// Public Routes
Route::name('public.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::get('/universities/{slug}', [UniversityController::class, 'show'])->name('universities.show');
    Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
    Route::get('/colleges/{slug}', [CollegeController::class, 'show'])->name('colleges.show');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{slug}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/enquiry', [EnquiryController::class, 'create'])->name('enquiry.create');
    Route::post('/enquiry', [EnquiryController::class, 'store'])->name('enquiry.store');
    Route::get('/universities/{universityId}/colleges', [EnquiryController::class, 'getColleges']);
    Route::get('/colleges/{collegeId}/courses', [EnquiryController::class, 'getCourses']);
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Authenticated Admin Routes
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.change-password');
        Route::put('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

        // University Routes
        Route::resource('universities', AdminUniversityController::class)->except(['show']);
        Route::get('/universities/{university}', [AdminUniversityController::class, 'show'])->name('universities.show');

        // College Routes
        Route::resource('colleges', AdminCollegeController::class)->except(['show']);
        Route::get('/colleges/{college}', [AdminCollegeController::class, 'show'])->name('colleges.show');

        // Course Routes
        Route::resource('courses', AdminCourseController::class)->except(['show']);
        Route::get('/courses/{course}', [AdminCourseController::class, 'show'])->name('courses.show');

        // Student Routes
        Route::resource('students', StudentController::class)->except(['show']);
        Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');

        // CMS Routes
        Route::resource('cms', CmsController::class)->except(['show']);
        Route::get('/cms/{cm}', [CmsController::class, 'show'])->name('cms.show');

        // Enquiry Routes
        Route::resource('enquiries', AdminEnquiryController::class)->only(['index', 'show', 'edit', 'update', 'destroy']);

        // Settings Routes
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Notification Routes
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.mark-all-read');
        Route::post('/notifications/{notification}/mark-read', [NotificationController::class, 'markRead'])->name('notifications.mark-read');
        Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

        // Support Routes
        Route::get('/support', [SupportController::class, 'index'])->name('support.index');
        Route::post('/support', [SupportController::class, 'store'])->name('support.store');
    });
});


// rahul change on 28 feb