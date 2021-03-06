@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Cart</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="cart_area section_padding_100_70 clearfix">
        <div class="container">
            <div class="row justify-content-between" id="cart_list">
                @include('FrontEnd.Layouts.cartList._cart-lists')
                
            </div>
        </div>
    </div>

@endsection

@section('front_end_script')

    {{-- coupon script --}}


    <script>
        $(document).on('click', '.coupon-btn', function(e) {
            e.preventDefault();
            var code = $('input[name=code]').val();
            //alert(code);
            $('.coupon-btn').html('<i class="fa fa-spinner fa-spin"></i> Applying...');

            $('#coupon-form').submit();

        });
    </script>

    {{-- cart.index delete script --}}

    <script>
        $(document).on('click', '.cart_delete', function(e) {
            e.preventDefault();
            var cart_id = $(this).data('id');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('managecart.delete') }}";


            // alert(product_qty);
            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    cart_id: cart_id,

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
                error: function(err) {
                    console.log(err);
                }
            });
        });
    </script>

    {{-- qty incriment and update qty after adding in the cart --}}


    <script>
        $(document).on('click', '.qty-text', function() { //qty-text is the class name of quantity field
            var id = $(this).data('id');
            //alert(id);
            var spinner = $(this),
                input = spinner.closest("div.quantity").find('input[type="number"]');
            // alert(input.val());
            if (input.val() == 1) {
                return false;

            }
            if (input.val() != 1) {
                var newVal = parseFloat(input.val());
                $('#qty-input-' + id).val(newVal);
            }

            var productQuantity = $("#update-cart-" + id).data('product-quantity');
            //alert(productQuantity);
            update_cart(id, productQuantity)
        });

        function update_cart(id, productQuantity) {
            var rowId = id;
            var product_qty = $('#qty-input-' + rowId).val();
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.update') }}";
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    _token: token,
                    product_qty: product_qty,
                    rowId: rowId,
                    productQuantity: productQuantity,
                },
                success: function(data) {
                   // console.log(data);
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart-counter').html(data['cart_count']);
                        $('body #cart_list').html(data['cart_list']);
                        swal({
                            title: "Updated!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });

                        //alert(data['message']);
                    } else {
                        //alert(data['message']);
                        //if anything goes wrongly
                        swal({
                            title: "Stop!",
                            text: data['message'],
                            icon: "warning",
                            button: "OK!",
                        });
                    }

                }
            })
        }
    </script>


@endsection
