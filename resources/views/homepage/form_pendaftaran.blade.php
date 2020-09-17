<!DOCTYPE html>
<html lang="en">

<head>
    <title>Andrea - Free Bootstrap 4 Template by Colorlib</title>
    <!-- <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css"> -->
    @include('homepage.head')
</head>

<body>

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        @include('homepage.sidebar')
        <div id="colorlib-main">

            <section class="ftco-section contact-section px-md-4">
                <div class="container">
                    <div class="row d-flex mb-5 contact-info">
                        <div class="col-md-12 mb-4">
                            <h2 class="h3">Form Pendaftaran</h2>
                            <h6>{{ $blog->title }}</h6>
                        </div>
                        <div class="w-100"></div>
                        <!-- <div class="col-lg-6 col-xl-3 d-flex mb-4">
                            <div class="info bg-light p-4">
                                <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 d-flex mb-4">
                            <div class="info bg-light p-4">
                                <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 d-flex mb-4">
                            <div class="info bg-light p-4">
                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-3 d-flex mb-4">
                            <div class="info bg-light p-4">
                                <p><span>Website</span> <a href="#">yoursite.com</a></p>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-xs-6 col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <small> Isilah Data Dibawah Ini </small> <strong>Dengan Benar</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="form-group">
                                    <label class=" form-control-label">Date input</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 99/99/9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Phone input</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. (999) 999-9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Taxpayer Identification Numbers</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-usd"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 99-9999999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Social Security Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-male"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 999-99-9999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Eye Script</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. ~9.99 ~9.99 999</small>
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Credit Card Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                        <input class="form-control">
                                    </div>
                                    <small class="form-text text-muted">ex. 9999 9999 9999 9999</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex">
                        <div id="map" class="bg-light"></div>
                    </div>
                </div>
        </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
    </div><!-- END COLORLIB-PAGE -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


    <!-- <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script> -->

    @include('homepage.script')

</body>

</html>