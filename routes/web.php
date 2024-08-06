<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::redirect('/', '/login');

    Auth::routes(['register' => false]);

    Route::group(['prefix' => 'student', 'as' => 'student.', 'middleware' => ['auth']], function () {
        Route::get('/', [StudentController::class, 'index'])->name('home');
    });




    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');

        // Permissions
        Route::resource('permissions', PermissionController::class, ['except' => ['destroy']]);

        // Roles
        Route::resource('roles', RoleController::class, ['except' => ['destroy']]);

        // Users
        Route::resource('users', UserController::class, ['except' => ['destroy']]);

        // Courses
        Route::post('courses/media', [CourseController::class, 'storeMedia'])->name('courses.storeMedia');
        Route::get('courses/single/{course}', [CourseController::class, 'single'])->name('courses.single')->middleware('CheckCop');
        Route::resource('courses', CourseController::class, ['except' => ['destroy']]);

        // Lessons
        Route::post('lessons/media', [LessonController::class, 'storeMedia'])->name('lessons.storeMedia');
        Route::resource('lessons', LessonController::class, ['except' => ['destroy']]);

        // Coupon
        Route::resource('coupons', CouponController::class, ['except' => ['destroy']]);
        Route::post('coupons/use', [CouponController::class, 'use'])->name('coupons.use');

    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
        if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
            Route::get('/', [UserProfileController::class, 'show'])->name('show');
        }
    });
});
