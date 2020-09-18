<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('andrea.head')

</head>

<body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        @include('andrea.sidebar_left')
        <!-- END COLORLIB-ASIDE -->
        <div id="colorlib-main">
            <section class="ftco-section ftco-no-pt ftco-no-pb">
                <div class="container">
                    <div class="row d-flex">
                        @yield('content')
                        @include('andrea.sidebar_right')
                        
                    </div>

                </div>

            </section>

        </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg>
    </div>


    @include('andrea.script')


</body>

</html>