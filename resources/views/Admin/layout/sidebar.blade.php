<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_home') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a>
            </li>


            <li
                class="nav-item dropdown {{ Request::is('admin/amenity-view') || Request::is('admin/room-view') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Room Section
                    </span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/amenity-view') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_amenity_view') }}"><i class="fa fa-angle-right"></i> All
                            Amenities</a>
                    </li>

                    <li class="{{ Request::is('admin/room-view') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_room_view') }}"><i class="fa fa-angle-right"></i> Hotel
                            Rooms & Suites</a>
                    </li>


                </ul>
            </li>




            <li
                class="nav-item dropdown {{ Request::is('admin/about-page') || Request::is('admin/terms-page') || Request::is('admin/privacy-page') || Request::is('admin/contact-page') || Request::is('admin/photo_gallery-page') || Request::is('admin/video_gallery-page') || Request::is('admin/faq-page') || Request::is('admin/blog-page') || Request::is('admin/room-page') || Request::is('admin/cart-page') || Request::is('admin/checkout-page') || Request::is('admin/payment-page') || Request::is('admin/signup-page') || Request::is('admin/signin-page') || Request::is('admin/forget-password-page') || Request::is('admin/reset-password-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Home
                        Page</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/about-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_about_page') }}"><i class="fa fa-angle-right"></i> About Page</a>
                    </li>

                    <li class="{{ Request::is('admin/terms-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_terms_page') }}"><i class="fa fa-angle-right"></i> Terms &
                            Conditions</a></li>

                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_privacy_page') }}"><i class="fa fa-angle-right"></i> Privacy
                            Policy</a></li>

                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_contact_page') }}"><i class="fa fa-angle-right"></i> Contact Page
                        </a></li>

                    <li class="{{ Request::is('admin/photo_gallery-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_photo_gallery_page') }}"><i class="fa fa-angle-right"></i> Photo
                            Gallery Page
                        </a></li>

                    <li class="{{ Request::is('admin/video_gallery-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_video_gallery_page') }}"><i class="fa fa-angle-right"></i> Video
                            Gallery Page
                        </a></li>

                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_faq_page') }}"><i class="fa fa-angle-right"></i>
                            FAQ Page
                        </a></li>

                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_blog_page') }}"><i class="fa fa-angle-right"></i>
                            Blog Page
                        </a></li>

                    <li class="{{ Request::is('admin/room-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_room_page') }}"><i class="fa fa-angle-right"></i>
                            Room Page
                        </a></li>

                    <li class="{{ Request::is('admin/cart-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_cart_page') }}"><i class="fa fa-angle-right"></i>
                            Cart Page
                        </a></li>

                    <li class="{{ Request::is('admin/checkout-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_checkout_page') }}"><i class="fa fa-angle-right"></i>
                            Checkout Page
                        </a></li>

                    <li class="{{ Request::is('admin/payment-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_payment_page') }}"><i class="fa fa-angle-right"></i>
                            Payment Page
                        </a></li>

                    <li class="{{ Request::is('admin/signup-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_signup_page') }}"><i class="fa fa-angle-right"></i>
                            Sign Up Page
                        </a></li>

                    <li class="{{ Request::is('admin/signin-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_signin_page') }}"><i class="fa fa-angle-right"></i>
                            Sign In Page
                        </a></li>

                    <li class="{{ Request::is('admin/forget-password-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_forget_password_page') }}"><i class="fa fa-angle-right"></i>
                            Forget Password Page
                        </a></li>

                    <li class="{{ Request::is('admin/reset-password-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_reset_password_page') }}"><i class="fa fa-angle-right"></i>
                            Reset Password Page
                        </a></li>

                </ul>
            </li>

            <li class="{{ Request::is('admin/slide-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_slide_view') }}"><i class="fa fa-hand-o-right"></i> <span>slide</span></a>
            </li>

            <li class="{{ Request::is('admin/feature-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_feature_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>Features</span></a></li>

            <li class="{{ Request::is('admin/testimonial-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_testimonial_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>Testimonials</span></a></li>

            <li class="{{ Request::is('admin/post-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_post_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>Posts</span></a></li>

            <li class="{{ Request::is('admin/photo-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_photo_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>Photo Gallery</span></a></li>

            <li class="{{ Request::is('admin/video-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_video_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>Video Gallery</span></a></li>

            <li class="{{ Request::is('admin/faq-view') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ route('admin_faq_view') }}"><i class="fa fa-hand-o-right"></i>
                    <span>FAQ</span></a></li>



            <li
                class="nav-item dropdown {{ Request::is('admin/subscriber-show') || Request::is('admin/subscriber/send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Subscribers
                    </span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/subscriber-show') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_subscriber_show') }}"><i class="fa fa-angle-right"></i> All
                            Subscribers</a>
                    </li>

                    <li class="{{ Request::is('admin/subscriber/send-email') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_subscriber_send_email') }}"><i class="fa fa-angle-right"></i> Send
                            Email</a>
                    </li>


                </ul>
            </li>


        </ul>
    </aside>
</div>
