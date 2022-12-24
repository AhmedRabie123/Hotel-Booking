<?php

use Illuminate\Support\Facades\Route;



/* Front Route */
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;






/* Admin Route */
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;



/* Front Route */

// Home Page
route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
route::get('about', [AboutController::class, 'index'])->name('about');



/* Admin Home Route */
route::get('admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');

/* Admin Login Route */

route::get('admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
route::post('admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
route::get('admin/logout', [AdminLoginController::class, 'admin_logout'])->name('admin_logout')->middleware('admin:admin');
route::get('admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
route::post('admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
route::get('admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
route::post('admin/reset-password/submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

/* Admin Profile Route */

route::get('admin/edit-profile', [AdminProfileController::class, 'admin_profile'])->name('admin_edit_profile')->middleware('admin:admin');
route::post('admin/profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');

/* Admin Slider Route */

route::get('admin/slide-view', [AdminSlideController::class, 'index'])->name('admin_slide_view')->middleware('admin:admin');
route::get('admin/slide-create', [AdminSlideController::class, 'slide_create'])->name('admin_slide_create')->middleware('admin:admin');
route::post('admin/slide-store', [AdminSlideController::class, 'slide_store'])->name('admin_slide_store')->middleware('admin:admin');
route::get('admin/slide-edit/{id}', [AdminSlideController::class, 'slide_edit'])->name('admin_slide_edit')->middleware('admin:admin');
route::post('admin/slide-update/{id}', [AdminSlideController::class, 'slide_update'])->name('admin_slide_update')->middleware('admin:admin');
route::get('admin/slide-delete/{id}', [AdminSlideController::class, 'slide_delete'])->name('admin_slide_delete')->middleware('admin:admin');

/* Admin Feature Route */

route::get('admin/feature-view', [AdminFeatureController::class, 'index'])->name('admin_feature_view')->middleware('admin:admin');
route::get('admin/feature-create', [AdminFeatureController::class, 'feature_create'])->name('admin_feature_create')->middleware('admin:admin');
route::post('admin/feature-store', [AdminFeatureController::class, 'feature_store'])->name('admin_feature_store')->middleware('admin:admin');
route::get('admin/feature-edit/{id}', [AdminFeatureController::class, 'feature_edit'])->name('admin_feature_edit')->middleware('admin:admin');
route::post('admin/feature-update/{id}', [AdminFeatureController::class, 'feature_update'])->name('admin_feature_update')->middleware('admin:admin');
route::get('admin/feature-delete/{id}', [AdminFeatureController::class, 'feature_delete'])->name('admin_feature_delete')->middleware('admin:admin');

/* Admin Testimonial Route */

route::get('admin/testimonial-view', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_view')->middleware('admin:admin');
route::get('admin/testimonial-create', [AdminTestimonialController::class, 'testimonial_create'])->name('admin_testimonial_create')->middleware('admin:admin');
route::post('admin/testimonial-store', [AdminTestimonialController::class, 'testimonial_store'])->name('admin_testimonial_store')->middleware('admin:admin');
route::get('admin/testimonial-edit/{id}', [AdminTestimonialController::class, 'testimonial_edit'])->name('admin_testimonial_edit')->middleware('admin:admin');
route::post('admin/testimonial-update/{id}', [AdminTestimonialController::class, 'testimonial_update'])->name('admin_testimonial_update')->middleware('admin:admin');
route::get('admin/testimonial-delete/{id}', [AdminTestimonialController::class, 'testimonial_delete'])->name('admin_testimonial_delete')->middleware('admin:admin');