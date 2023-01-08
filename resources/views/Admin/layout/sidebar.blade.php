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
                    href="{{ route('admin_home') }}"><i class="fa fa-hand-o-right"></i> <span>Dashboard</span></a></li>



            <li
                class="nav-item dropdown {{ Request::is('admin/about-page') || Request::is('admin/terms-page') || Request::is('admin/privacy-page') || Request::is('admin/contact-page') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Home
                        Page</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/about-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_about_page') }}"><i class="fa fa-angle-right"></i> About Page</a></li>

                    <li class="{{ Request::is('admin/terms-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_terms_page') }}"><i class="fa fa-angle-right"></i> Terms &
                            Conditions</a></li>

                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link"
                            href="{{ route('admin_privacy_page') }}"><i class="fa fa-angle-right"></i> Privacy
                            Policy</a></li>

                            <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link"
                                href="{{ route('admin_contact_page') }}"><i class="fa fa-angle-right"></i> Contact Page
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


        </ul>
    </aside>
</div>
