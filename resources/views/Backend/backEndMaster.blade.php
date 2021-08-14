@include('Backend.Partials.header')


<body class="theme-cyan">


    <!-- Overlay For Sidebars -->
    <div id="wrapper">

        @include('Backend.Partials.navbar')



        @include('Backend.Partials.leftSidebar')


        <div id="main-content">
            <div class="container-fluid">
                <div class="block-header">
                    <div class="row">
                        <div class="col-lg-5 col-md-8 col-sm-12">
                            <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></a>Dashboard</h2>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                                <li class="breadcrumb-item active">eCommerce</li>
                            </ul>
                        </div>
                       
                    </div>
                </div>


                
                {{-- @yield('notifyCards') --}}


                @yield('main_content')


                
{{-- 
                @yield('recentTransaction')

               

                @yield('newOrder')
                --}}



            </div>
        </div>

    </div>




    @include('Backend.Partials.footer')


</body>

<!-- Mirrored from www.wrraptheme.com/templates/lucid/html/light/index8.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 10:14:04 GMT -->

</html>
