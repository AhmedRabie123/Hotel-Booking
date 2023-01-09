<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_heading');
            $table->text('about_content');
            $table->string('about_status');
            $table->string('terms_heading');
            $table->text('terms_content');
            $table->string('terms_status');
            $table->string('privacy_heading');
            $table->text('privacy_content');
            $table->string('privacy_status');
            $table->string('contact_heading');
            $table->text('contact_map')->nullable();
            $table->string('contact_status');
            $table->string('photo_gallery_heading');
            $table->string('photo_gallery_status');
            $table->string('video_gallery_heading');
            $table->string('video_gallery_status');
            $table->string('faq_heading');
            $table->string('faq_status');
            $table->string('blog_heading');
            $table->string('blog_status');
            $table->string('cart_heading');
            $table->string('cart_status');
            $table->string('checkout_heading');
            $table->string('checkout_status');
            $table->string('payment_heading');
            $table->string('signup_heading');
            $table->string('signup_status');
            $table->string('signin_heading');
            $table->string('signin_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
};
