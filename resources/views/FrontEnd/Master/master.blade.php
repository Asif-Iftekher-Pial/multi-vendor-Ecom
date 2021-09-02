<!doctype html>
<html lang="en">


<!-- Mirrored from demo.designing-world.com/bigshop-2.3.0/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 10:41:45 GMT -->
<head>
    @include('FrontEnd.Partials.head')
</head>

<body>
    {{-- <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> --}}

    <!-- Header Area -->
    @include('FrontEnd.Partials.header')
    <!-- Header Area End -->

    @yield('main')



    <!-- Footer Area -->
   @include('FrontEnd.Partials.footer')
    <!-- Footer Area -->

   @include('FrontEnd.Partials.script')

</body>


<!-- Mirrored from demo.designing-world.com/bigshop-2.3.0/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 10:43:02 GMT -->
</html>