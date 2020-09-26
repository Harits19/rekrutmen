<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <title>Login</title>
    @include('sufee.head')
</head>

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">

                <!-- Tambahkan Logo -->
                <!-- <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div> -->

                <div class="login-form">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif

                    <form method="POST" action="/email/verification-notification">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Resend Verification</button>
                    </form>

                    <form method="POST" action="/logout">
                        @csrf
                        <br>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Logout</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @include('sufee.script')

</body>

</html>