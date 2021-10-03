@include('website.layouts.head')

@include('website.layouts.navbar')

    @if(is_welcome())
    {{--End Navbar --}}
    <div class="page-header section-dark" style="background-image: url('frontend/img/antoine-barres.jpg')">
        <div class="filter"></div>
        <div class="content-center">
            <div class="container">
                <div class="title-brand">
                    <h1 class="presentation-title">Sallam Tube</h1>
                    <div class="fog-low">
                        <img src="frontend/img/fog-low.png" alt="">
                    </div>
                    <div class="fog-low right">
                        <img src="frontend/img/fog-low.png" alt="">
                    </div>
                </div>
                <h2 class="presentation-subtitle text-center">Educational Website Improve your Skills  </h2>
            </div>
        </div>
        <div class="moving-clouds" style="background-image: url('frontend/img/clouds.png'); "></div>
        <h6 class="category category-absolute">Designed and coded by
            <a href="#" target="_blank">
                Sallam Rady
            </a>
        </h6>
    </div>
    @endif


<div class="main">
    @yield('content')

@include('website.layouts.footer')

@include('website.layouts.core_js_files')
