@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Wishlist</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="wishlist-table section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive" id="wishlist_list">
                            @include('FrontEnd.Layouts.wishlists._wishlist')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


@section('front_end_script')

{{-- move wishlist product to the cart --}}
    <script>
        $('.move-to-cart').on('click', function(e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            //alert(rowId);
            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.move.cart') }}";
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    rowId: rowId,

                },

                beforeSend: function() {
                    $(this).html('<i class="fa fa-spinner fa-spin"></i>');

                },

                success: function(data) {
                    console.log(data); 
                    if (data['status']) {
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } 
                    else {
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "something went wrong",
                            button: "OK!",
                        });
                    }
                },
                error: function(err) {
                    swal({
                        title: "Error!",
                        text: "something went wrong, please refresh the page",
                        icon: "error",
                        button: "OK!",
                    });

                }
            })
        })
    </script>

    {{-- delete wishlist --}}
    <script>
        $('.delete_wishlist').on('click', function(e) {
            e.preventDefault();
            var rowId = $(this).data('id');
            //alert(rowId);
            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.delete') }}";
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    rowId: rowId,

                },
                success: function(data) {
                    console.log(data); 
                    if (data['status']) {
                        $('body #cart_counter').html(data['cart_count']);
                        $('body #wishlist_list').html(data['wishlist_list']);
                        $('body #header-ajax').html(data['header']);
                        swal({
                            title: "Success!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                    } 
                    else {
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "something went wrong",
                            button: "OK!",
                        });
                    }
                },
                error: function(err) {
                    swal({
                        title: "Error!",
                        text: "something went wrong, please refresh the page",
                        icon: "error",
                        button: "OK!",
                    });

                }
            })
        })
    </script>


@endsection
