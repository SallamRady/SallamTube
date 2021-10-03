<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{ asset('/assets/img/sidebar-2.jpg') }}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="{{ route('landing_page') }}" target="_blank" class="simple-text logo-normal">
            Visit Site
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{is_active('dashboard')}}  ">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <!-- your sidebar here -->
            {{-- Users --}}
            <li class="nav-item {{is_active('users')}}  ">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <i class="material-icons">people</i>
                    <p>Users</p>
                </a>
            </li>
            {{-- Categories --}}
            <li class="nav-item {{is_active('categories')}}  ">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Categories</p>
                </a>
            </li>
            {{-- Skills --}}
            <li class="nav-item {{is_active('skills')}}  ">
                <a class="nav-link" href="{{ route('skills.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Skills</p>
                </a>
            </li>
            {{-- Tags --}}
            <li class="nav-item {{is_active('tags')}}  ">
                <a class="nav-link" href="{{ route('tags.index') }}">
                    <i class="material-icons">tags</i>
                    <p>Tags</p>
                </a>
            </li>
            {{-- Pages --}}
            <li class="nav-item {{is_active('pages')}}  ">
                <a class="nav-link" href="{{ route('pages.index') }}">
                    <i class="material-icons">pages</i>
                    <p>Pages</p>
                </a>
            </li>
            {{-- Videos --}}
            <li class="nav-item {{is_active('videos')}}  ">
                <a class="nav-link" href="{{ route('videos.index') }}">
                    <i class="material-icons">video_library</i>
                    <p>Videos</p>
                </a>
            </li>
            {{-- Messages --}}
            <li class="nav-item {{is_active('messages')}}  ">
                <a class="nav-link" href="{{ route('messages.index') }}">
                    <i class="material-icons">message</i>
                    <p>Message</p>
                </a>
            </li>
        </ul>
    </div>
</div>
