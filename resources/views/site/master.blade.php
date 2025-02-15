<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
        content="منصة أستاذ أحمد الفواخري,أستاذ أحمد الفواخري,منصة ذاكرلي رياضيات,ذاكرلي رياضيات,رياضيات الثانوية العامة,الفواخري رياضيات,رياضيات احمد الفواخري,رياضيات الصف الثالث الثانوي,جبر الثانوية العامة,تفاضل الثانوية العامة,تكامل الثانوية العامة,تفاضل وتكامل الثانوية العامة,الهندسة الغراغية ثانوية عامة,ديناميكا ثانوية عامة,استاتيكا ثانوية عامة,الرياضات البحتة ثانوية عامة,الرياضات البحتة ثانوية عامة,الرياضات التطبيقية ثانوية عامة">
    <meta name="description"
        content="منصة ذاكر لي التعليمية لتدريس مواد الرياضيات  للثانوية العامة و الازهرية بكافة مراحلها الدراسية مع استاذ احمد الفواخري.">
    <meta name="author" content="Developed and Designed By Zircon Tech 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('faveicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('faveicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('faveicon/favicon-16x16.png') }}">

    <title>الصفحة الرئيسية - أ/ أحمد الفواخري</title>

    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" class="rel">
    <link rel="stylesheet" href="{{ asset('css/home-responsive.css') }}" class="rel">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>

<body>
    <div class="mainNav">
        @include('site.include.nav.guest')
    </div>
    {{--    <div id="fawaterkDivId"></div> --}}
    @guest
        @include('site.include.header')
    @endguest

    @yield('content')

    @include('site.include.footer')

    <script src="{{ asset('js/ajax/libs/font-awesome/6.2.0/js/all.min.js') }}"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sal.js') }}"></script>
    <script src="{{ asset('js/ajax/libs/gsap/3.5.1/gsap.min.js') }}"></script>
    <script src="{{ asset('js/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/swiper.bundle.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    {{--    <script src="https://app.fawaterk.com/fawaterkPlugin/fawaterkPlugin.min.js"></script> --}}
    <script src="{{ asset('js/home/index.js') }}"></script>
    @stack('course-js')
</body>

</html>
