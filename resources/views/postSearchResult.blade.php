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
<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Search Result</h4>
    </div>
    <div class="bg-white border border-top-0 p-3">
        @forelse($posts as $post)
            <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                <img class="img-fluid" src="img/news-110x110-1.jpg" alt="">
                <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">{{ $post->category->name }}</a>
                        <a class="text-body" href=""><small>{{ \Illuminate\Support\Carbon::parse($post->created_at)->format('Y-M-D') }}</small></a>
                    </div>
                    <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="{{ route('post.detail',$post->slug) }}">{{ $post->title }}</a>
                </div>
            </div>
        @empty
        @endforelse

        {{--        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">--}}
        {{--            <img class="img-fluid" src="img/news-110x110-2.jpg" alt="">--}}
        {{--            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">--}}
        {{--            <img class="img-fluid" src="img/news-110x110-3.jpg" alt="">--}}
        {{--            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">--}}
        {{--            <img class="img-fluid" src="img/news-110x110-4.jpg" alt="">--}}
        {{--            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">--}}
        {{--            <img class="img-fluid" src="img/news-110x110-5.jpg" alt="">--}}
        {{--            <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">--}}
        {{--                <div class="mb-2">--}}
        {{--                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business</a>--}}
        {{--                    <a class="text-body" href=""><small>Jan 01, 2045</small></a>--}}
        {{--                </div>--}}
        {{--                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href="">Lorem ipsum dolor sit amet elit...</a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
</div>
</body>
</html>
