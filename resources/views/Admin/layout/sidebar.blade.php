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



            {{-- <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-hand-o-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fa fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fa fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

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




        </ul>
    </aside>
</div>
