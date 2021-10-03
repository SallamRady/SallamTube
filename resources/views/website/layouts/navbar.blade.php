@if(is_welcome())
    <nav class="navbar navbar-expand-lg fixed-top" color-on-scroll="300">
@else
    <nav class="navbar navbar-expand-lg fixed-top bg-danger " >
@endif
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('landing_page') }}" rel="tooltip" title="Coded by Sallam Rady" data-placement="bottom">
                Sallam_Tube
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                {{--all Videos home:)--}}
                <li class="nav-item">
                    <a class="nav-link" rel="tooltip" title="home all videos" data-placement="bottom" href="{{ route('home') }}">
                        <i class="fa fa-home"></i>
                        <p class="lead">Home</p>
                    </a>
                </li>
                {{-- Skills Dropdown --}}
                <li class="nav-item">
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Skills
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($skills as $skill)
                                <a class="dropdown-item" href="{{ route('skill_videos',$skill->id) }}">{{ $skill->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                {{-- Categories Dropdown --}}
                <li class="nav-item">
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($categories as $category)
                                <a class="dropdown-item" href="{{ route('category_videos',$category->id) }}">{{ $category->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @guest
                    {{--Log in --}}
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Log in :)" data-placement="bottom" href="{{ route('user_login') }}">
                            <i class="fa fa-sign-in"></i>
                            <p class="lead">Log In</p>
                        </a>
                    </li>
                    {{--Register --}}
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="register:)" data-placement="bottom" href="{{ route('user_register') }}">
                            <i class="fa fa-registered"></i>
                            <p class="lead">Register</p>
                        </a>
                    </li>
                @else
                    {{-- User Icon --}}
                    <li class="nav-item">
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle"></i>
                                <p class="lead">{{ auth('web')->user()->name }}</p>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('userProfile') }}">Profile Setting<i class="fa fa-user"></i></a>
                                <a class="dropdown-item" href="{{ route('User_logout') }}">Logout <i class="fa fa-sign-out"></i></a>
                            </div>
                        </div>
                    </li>
                @endif

                <form class="form-inline ml-auto" action="{{ route('home') }}" method="get">
                    <div class="form-group has-white">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                    </div>
                </form>
            </ul>


        </div>
    </div>
</nav>
