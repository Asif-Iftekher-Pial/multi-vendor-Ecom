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
    <header class="header_area" id="header-ajax">
    @include('FrontEnd.Partials.header')
    </header>
    <!-- Header Area End -->

    @yield('main')



    <!-- Footer Area -->
   @include('FrontEnd.Partials.footer')
    <!-- Footer Area -->

   @include('FrontEnd.Partials.script')
   
   {{-- cart delete script --}}
   
   <script>
       $(document).on('click', '.cart_delete', function(e) {
            e.preventDefault();
            var cart_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.delete') }}";


            // alert(product_qty);
            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    cart_id:cart_id,
                   
                    _token: token,

                },
               
                success: function(data) {
                    console.log(data);
                   
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart-counter').html(data['cart_count']);
                        swal({
                            title: "Removed!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                },
                error:function (err){
                    console.log(err);
                }
            });


        });
   </script>
   

</body>


<!-- Mirrored from demo.designing-world.com/bigshop-2.3.0/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Aug 2021 10:43:02 GMT -->
</html>

