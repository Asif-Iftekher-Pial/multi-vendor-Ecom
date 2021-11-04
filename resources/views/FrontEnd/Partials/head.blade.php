<meta charset="UTF-8">
    <meta name="description" content="{{ get_setting('meta_description') }}">
    <meta name="keywords" content="{{ get_setting('meta_keywords') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>{{ get_setting('title') }} | Responsive multi vendor E-commerce</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset( get_setting('favicon')) }}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    {{-- search autoComplete --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    @yield('frontend_css_style')