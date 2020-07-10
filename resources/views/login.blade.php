<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from borderless.laborasyon.com/dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:43:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tryout Online</title>

    <!-- begin::global styles -->
    <link rel="stylesheet" href="{{url('/assets/vendors/bundle.css')}}" type="text/css">
    <!-- end::global styles -->

    <!-- begin::custom styles -->
    <link rel="stylesheet" href="{{url('/assets/css/app.min.css')}}" type="text/css">
    <!-- end::custom styles -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body class="bg-white h-100-vh p-t-0">

<!-- begin::page loader-->
<div class="page-loader">
    <div class="spinner-border"></div>
    <span>Loading</span>
</div>
<!-- end::page loader -->


<div class="container h-100-vh">
    <div class="row align-items-md-center h-100-vh">
        <div class="col-lg-6 d-none d-lg-block">
            <img class="img-fluid" src="http://borderless.laborasyon.com/assets/media/svg/login.svg" alt="...">
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="m-b-20">
                <img src="../assets/media/image/dark-logo.png" class="m-r-15" width="180" alt="">
            </div>
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <p>Masuk untuk Melanjutkan.</p>
            <form method="post" action="{{ url('login')}}">
                {{ csrf_field() }}
                <div class="form-group mb-4">
                    <input type="text" class="form-control form-control-lg" id="username" name="username" autofocus placeholder="Username">
                </div>
                <div class="form-group mb-4">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <button class="btn btn-primary btn-lg btn-block btn-uppercase mb-4" type="submit">Masuk</button>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <a href="#" class="auth-link text-black">Lupa Password?</a>
                </div>
                
            </form>
        </div>
    </div>
</div>

<!-- begin::global scripts -->
<script src="{{url('/assets/vendors/bundle.js')}}"></script>
<!-- end::global scripts -->

<!-- begin::custom scripts -->
<script src="{{url('/assets/js/borderless.min.js')}}"></script>
<!-- end::custom scripts -->

</body>

<!-- Mirrored from borderless.laborasyon.com/dark/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Apr 2020 17:43:36 GMT -->
</html>