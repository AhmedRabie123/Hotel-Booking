<?php

use Illuminate\Support\Facades\Route;



/* Front Route */
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\PhotoController;
use App\Http\Controllers\Front\VideoController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\PrivacyController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\SubscriberController;






/* Admin Route */
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSlideController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminRoomController;



/* Front Route */

// Home Page
route::get('/', [HomeController::class, 'index'])->name('home');

// About Page
route::get('about', [AboutController::class, 'index'])->name('about');

// Blog Page
route::get('blog', [PostController::class, 'index'])->name('blog');

// Blog detail Page
route::get('blog-detail/{id}', [PostController::class, 'detail'])->name('blog_detail');

// Photo Gallery Page
route::get('photo', [PhotoController::class, 'index'])->name('photo');

// Video Gallery Page
route::get('video', [VideoController::class, 'index'])->name('video');

// FAQ Page
route::get('faq', [FaqController::class, 'index'])->name('faq');

// Terms & Conditions Page
route::get('terms-and-condition', [TermsController::class, 'index'])->name('terms');

// Privacy Policy Page
route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy');

// Contact Page
route::get('contact', [ContactController::class, 'index'])->name('contact');

// Contact Send E-Mail Page
route::post('contact/send-email', [ContactController::class, 'send_email'])->name('contact_send_email');

// Subscribe Send E-Mail 
route::post('subscriber/send-email', [SubscriberController::class, 'send_email'])->name('subscriber_send_email');
route::get('subscriber/verify/{email}/{token}', [SubscriberController::class, 'verify'])->name('subscriber_verify');







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

/* Admin Posts Route */

route::get('admin/post-view', [AdminPostController::class, 'index'])->name('admin_post_view')->middleware('admin:admin');
route::get('admin/post-create', [AdminPostController::class, 'post_create'])->name('admin_post_create')->middleware('admin:admin');
route::post('admin/post-store', [AdminPostController::class, 'post_store'])->name('admin_post_store')->middleware('admin:admin');
route::get('admin/post-edit/{id}', [AdminPostController::class, 'post_edit'])->name('admin_post_edit')->middleware('admin:admin');
route::post('admin/post-update/{id}', [AdminPostController::class, 'post_update'])->name('admin_post_update')->middleware('admin:admin');
route::get('admin/post-delete/{id}', [AdminPostController::class, 'post_delete'])->name('admin_post_delete')->middleware('admin:admin');

/* Admin Photo Route */

route::get('admin/photo-view', [AdminPhotoController::class, 'index'])->name('admin_photo_view')->middleware('admin:admin');
route::get('admin/photo-create', [AdminPhotoController::class, 'photo_create'])->name('admin_photo_create')->middleware('admin:admin');
route::post('admin/photo-store', [AdminPhotoController::class, 'photo_store'])->name('admin_photo_store')->middleware('admin:admin');
route::get('admin/photo-edit/{id}', [AdminPhotoController::class, 'photo_edit'])->name('admin_photo_edit')->middleware('admin:admin');
route::post('admin/photo-update/{id}', [AdminPhotoController::class, 'photo_update'])->name('admin_photo_update')->middleware('admin:admin');
route::get('admin/photo-delete/{id}', [AdminPhotoController::class, 'photo_delete'])->name('admin_photo_delete')->middleware('admin:admin');

/* Admin Video Route */

route::get('admin/video-view', [AdminVideoController::class, 'index'])->name('admin_video_view')->middleware('admin:admin');
route::get('admin/video-create', [AdminVideoController::class, 'video_create'])->name('admin_video_create')->middleware('admin:admin');
route::post('admin/video-store', [AdminVideoController::class, 'video_store'])->name('admin_video_store')->middleware('admin:admin');
route::get('admin/video-edit/{id}', [AdminVideoController::class, 'video_edit'])->name('admin_video_edit')->middleware('admin:admin');
route::post('admin/video-update/{id}', [AdminVideoController::class, 'video_update'])->name('admin_video_update')->middleware('admin:admin');
route::get('admin/video-delete/{id}', [AdminVideoController::class, 'video_delete'])->name('admin_video_delete')->middleware('admin:admin');

/* Admin Faq Route */

route::get('admin/faq-view', [AdminFaqController::class, 'index'])->name('admin_faq_view')->middleware('admin:admin');
route::get('admin/faq-create', [AdminFaqController::class, 'faq_create'])->name('admin_faq_create')->middleware('admin:admin');
route::post('admin/faq-store', [AdminFaqController::class, 'faq_store'])->name('admin_faq_store')->middleware('admin:admin');
route::get('admin/faq-edit/{id}', [AdminFaqController::class, 'faq_edit'])->name('admin_faq_edit')->middleware('admin:admin');
route::post('admin/faq-update/{id}', [AdminFaqController::class, 'faq_update'])->name('admin_faq_update')->middleware('admin:admin');
route::get('admin/faq-delete/{id}', [AdminFaqController::class, 'faq_delete'])->name('admin_faq_delete')->middleware('admin:admin');

/* Admin Page About Route */

route::get('admin/about-page', [AdminPageController::class, 'about'])->name('admin_about_page')->middleware('admin:admin');
route::post('admin/page-about-update', [AdminPageController::class, 'about_update'])->name('admin_page_about_update')->middleware('admin:admin');

/* Admin Page Terms Route */

route::get('admin/terms-page', [AdminPageController::class, 'terms'])->name('admin_terms_page')->middleware('admin:admin');
route::post('admin/page-terms-update', [AdminPageController::class, 'terms_update'])->name('admin_page_terms_update')->middleware('admin:admin');

/* Admin Page Privacy Policy Route */

route::get('admin/privacy-page', [AdminPageController::class, 'privacy'])->name('admin_privacy_page')->middleware('admin:admin');
route::post('admin/page-privacy-update', [AdminPageController::class, 'privacy_update'])->name('admin_page_privacy_update')->middleware('admin:admin');

/* Admin Page Contact Route */

route::get('admin/contact-page', [AdminPageController::class, 'contact'])->name('admin_contact_page')->middleware('admin:admin');
route::post('admin/page-contact-update', [AdminPageController::class, 'contact_update'])->name('admin_page_contact_update')->middleware('admin:admin');

/* Admin Page Photo Gallery Route */

route::get('admin/photo_gallery-page', [AdminPageController::class, 'photo_gallery'])->name('admin_photo_gallery_page')->middleware('admin:admin');
route::post('admin/page-photo_gallery-update', [AdminPageController::class, 'photo_gallery_update'])->name('admin_page_photo_gallery_update')->middleware('admin:admin');

/* Admin Page Video Gallery Route */

route::get('admin/video_gallery-page', [AdminPageController::class, 'video_gallery'])->name('admin_video_gallery_page')->middleware('admin:admin');
route::post('admin/page-video_gallery-update', [AdminPageController::class, 'video_gallery_update'])->name('admin_page_video_gallery_update')->middleware('admin:admin');

/* Admin Page Faq Route */

route::get('admin/faq-page', [AdminPageController::class, 'faq'])->name('admin_faq_page')->middleware('admin:admin');
route::post('admin/page-faq-update', [AdminPageController::class, 'faq_update'])->name('admin_page_faq_update')->middleware('admin:admin');

/* Admin Page Blog Route */

route::get('admin/blog-page', [AdminPageController::class, 'blog'])->name('admin_blog_page')->middleware('admin:admin');
route::post('admin/page-blog-update', [AdminPageController::class, 'blog_update'])->name('admin_page_blog_update')->middleware('admin:admin');

/* Admin Page Cart Route */

route::get('admin/cart-page', [AdminPageController::class, 'cart'])->name('admin_cart_page')->middleware('admin:admin');
route::post('admin/page-cart-update', [AdminPageController::class, 'cart_update'])->name('admin_page_cart_update')->middleware('admin:admin');

/* Admin Page Checkout Route */

route::get('admin/checkout-page', [AdminPageController::class, 'checkout'])->name('admin_checkout_page')->middleware('admin:admin');
route::post('admin/page-checkout-update', [AdminPageController::class, 'checkout_update'])->name('admin_page_checkout_update')->middleware('admin:admin');

/* Admin Page Payment Route */

route::get('admin/payment-page', [AdminPageController::class, 'payment'])->name('admin_payment_page')->middleware('admin:admin');
route::post('admin/page-payment-update', [AdminPageController::class, 'payment_update'])->name('admin_page_payment_update')->middleware('admin:admin');

/* Admin Page Sign Up Route */

route::get('admin/signup-page', [AdminPageController::class, 'signup'])->name('admin_signup_page')->middleware('admin:admin');
route::post('admin/page-signup-update', [AdminPageController::class, 'signup_update'])->name('admin_page_signup_update')->middleware('admin:admin');

/* Admin Page Sign in Route */

route::get('admin/signin-page', [AdminPageController::class, 'signin'])->name('admin_signin_page')->middleware('admin:admin');
route::post('admin/page-signin-update', [AdminPageController::class, 'signin_update'])->name('admin_page_signin_update')->middleware('admin:admin');

/* Admin Page Subscriber Route */

route::get('admin/subscriber-show', [AdminSubscriberController::class, 'show'])->name('admin_subscriber_show')->middleware('admin:admin');
route::get('admin/subscriber/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
route::post('admin/subscriber/send-email-submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit')->middleware('admin:admin');

/* Admin Amenity Route */

route::get('admin/amenity-view', [AdminAmenityController::class, 'index'])->name('admin_amenity_view')->middleware('admin:admin');
route::get('admin/amenity-create', [AdminAmenityController::class, 'amenity_create'])->name('admin_amenity_create')->middleware('admin:admin');
route::post('admin/amenity-store', [AdminAmenityController::class, 'amenity_store'])->name('admin_amenity_store')->middleware('admin:admin');
route::get('admin/amenity-edit/{id}', [AdminAmenityController::class, 'amenity_edit'])->name('admin_amenity_edit')->middleware('admin:admin');
route::post('admin/amenity-update/{id}', [AdminAmenityController::class, 'amenity_update'])->name('admin_amenity_update')->middleware('admin:admin');
route::get('admin/amenity-delete/{id}', [AdminAmenityController::class, 'amenity_delete'])->name('admin_amenity_delete')->middleware('admin:admin');

/* Admin Room Route */

route::get('admin/room-view', [AdminRoomController::class, 'index'])->name('admin_room_view')->middleware('admin:admin');
route::get('admin/room-create', [AdminRoomController::class, 'room_create'])->name('admin_room_create')->middleware('admin:admin');
route::post('admin/room-store', [AdminRoomController::class, 'room_store'])->name('admin_room_store')->middleware('admin:admin');
route::get('admin/room-edit/{id}', [AdminRoomController::class, 'room_edit'])->name('admin_room_edit')->middleware('admin:admin');
route::post('admin/room-update/{id}', [AdminRoomController::class, 'room_update'])->name('admin_room_update')->middleware('admin:admin');
route::get('admin/room-delete/{id}', [AdminRoomController::class, 'room_delete'])->name('admin_room_delete')->middleware('admin:admin');




































































































