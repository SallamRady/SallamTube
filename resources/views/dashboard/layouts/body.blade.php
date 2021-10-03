{{--import head partion--}}
{{--@include('dashboard.layouts.head')--}}

<body class="dark-edition">

 <!-- Main body of Page (Dashboard) -->
 <div class="wrapper ">

    {{--import sidbar--}}
    @include('dashboard.layouts.sidbar')

    <div class="main-panel">
        {{--import navbar--}}
        {{--@include('dashboard.layouts.navbar')--}}

        {{--Content--}}
        <div class="content">
            <div class="container-fluid">
                <!-- your content here -->
                @yield('content')
            </div>
        </div>

        {{--Footer--}}
        @include('dashboard.layouts.footer')
    </div>
 </div>

{{--  Main Js Core file--}}
@include('dashboard.layouts.core_js_files')

</body>
</html>
