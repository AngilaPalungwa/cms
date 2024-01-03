<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ \App\Utils\SettingUtils::get('system_name') }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
@include('frontend.common.topbar')
<!-- Topbar End -->


<!-- Navbar Start -->
@include('frontend.common.nav')


@if(session()->has('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('login.forget.handle', $token) }}" method="post">

    @csrf
    <div class="form-row">
        <div class="col-md-6">
            <div class="form-group">
                <input type="email" class="form-control p-4" placeholder="email" required="required" name="email"/>
                @if($errors->first('email'))
                    <span style="color: red"> {{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <input type="password" class="form-control p-4" placeholder="Your New password" required="required" name="password"/>
                @if($errors->first('password'))
                    <span style="color: red"> {{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <input type="password" class="form-control p-4" placeholder="Confirm Password" required="required" name="password_confirmation"/>
                @if($errors->first('password_confirmation'))
                    <span style="color: red"> {{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div>
        <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;"
                type="submit">Submit
        </button>
    </div>
</form>


<!-- Footer Start -->
@include('frontend.common.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
