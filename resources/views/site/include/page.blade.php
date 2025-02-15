<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('faveicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('faveicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('faveicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('faveicon/site.html') }}">
    <title>أ/ أحمد الفواخري</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}" class="rel">
    <link rel="stylesheet" href="{{ asset('css/signup-responsive.css') }}" class="rel">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;500;600;800;900&amp;family=Montserrat:wght@100;200;300;400;500;600&amp;family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&amp;family=Montserrat:wght@100;200;300;400;500;600&amp;display=swap"
        rel="stylesheet" />

</head>

<body>
    @yield('content')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/signup.js') }}"></script>
</body>

</html>
