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
    <!-- @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif -->





    <!-- <x-jet-validation-errors class="mb-4" /> -->


    <div class="sufee-login d-flex align-content-center flex-wrap">

        <div class="container">
            <div class="login-content">
                <!-- <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div> -->


                <div class="login-form">
                    <div>
                        @if (session('status'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label>Email address</label>
                            <input class="form-control" placeholder="Email" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Send</button>

                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="{{ route('login') }}"> Sign in</a></p>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
    @include('sufee.script')

</body>

</html>