@extends('FrontEnd.Master.master')
@section('main')

    <!-- Quick View Modal Area -->
    {{-- <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                               
                                
                                    @php
                                        $photo = explode(',', $categories->photo); // its because theres multiple photo
                                    @endphp
                                    
                                    <div class="col-12 col-lg-5">
                                        <div class="quickview_pro_img">
                                            <img class="first_img" src="{{ $photo[0] }}" alt="">
                                            <img class="hover_img" src="frontend/img/product-img/new-1.png" alt="">
                                            <!-- Product Badge -->
                                            <div class="product_badge">
                                                <span class="badge-new">{{ $categories->conditions }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7">
                                        <div class="quickview_pro_des">
                                            <h4 class="title">{{ Str::ucfirst($categories->title) }}</h4>
                                            <div class="top_seller_product_rating mb-15">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                            <h5 class="price">${{ number_format($categories->offer_price, 2) }} <span>
                                                    <del class="text-danger">${{ number_format($categories->price, 2) }}
                                                    </del></span></h5>
                                            <p>{!! html_entity_decode($categories->description) !!}</p>
                                            <a href="{{ route('product.detail',$categories->slug) }}">View Full Product Details</a>
                                        </div>
                                        <!-- Add to Cart Form -->
                                        <form class="cart" method="post">
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty" step="1" min="1"
                                                    max="12" name="quantity" value="1">
                                            </div>
                                            <button type="submit" name="addtocart" value="5" class="cart-submit">Add to
                                                cart</button>
                                            <!-- Wishlist -->
                                            <div class="modal_pro_wishlist">
                                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                            </div>
                                            <!-- Compare -->
                                            <div class="modal_pro_compare">
                                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                                            </div>
                                        </form>
                                        <!-- Share -->
                                        <div class="share_wf mt-30">
                                            <p>Share with friends</p>
                                            <div class="_icon">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Quick View Modal Area -->

    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Shop Grid</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $categories->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shop Top Sidebar -->
                    <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
                        <div class="view_area d-flex">
                            <div class="grid_view">
                                <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="Grid View"><i class="icofont-layout"></i></a>
                            </div>
                            <div class="list_view ml-3">
                                <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top" title=""
                                    data-original-title="List View"><i class="icofont-listine-dots"></i></a>
                            </div>
                        </div>
                        <select id="sortBy" class="small right" style="display: none;">
                            <option selected="">Default</option>
                            <option value="priceAsc" {{ old('sortBy') == 'priceAsc' ? 'selected' : '' }}>Price - Lower to
                                Higher</option>
                            <option value="priceDesc" {{ old('sortBy') == 'priceDesc' ? 'selected' : '' }}>Price - Higher
                                to
                                Lower</option>
                            <option value="titleAsc" {{ old('sortBy') == 'titleAsc' ? 'selected' : '' }}>Alphabetical
                                Ascending</option>
                            <option value="titleDesc" {{ old('sortBy') == 'titleDesc' ? 'selected' : '' }}>Alphabetical
                                Descending</option>
                            <option value="discAsc" {{ old('sortBy') == 'discAsc' ? 'selected' : '' }}>Discount - Lower to
                                Higher</option>
                            <option value="discDesc" {{ old('sortBy') == 'discDesc' ? 'selected' : '' }}>Discount - Higher
                                to Lower</option>
                        </select>
                        {{-- <div class="nice-select small right" tabindex="0"><span class="current">Short by
                                Popularity</span>
                            <ul class="list">
                                <li data-value="Short by Popularity" class="option selected">Short by Popularity</li>
                                <li data-value="1" class="option">Short by Newest</li>
                                <li data-value="2" class="option">Short by Sales</li>
                                <li data-value="3" class="option">Short by Ratings</li>
                            </ul>
                        </div> --}}
                    </div>

                    <div class="shop_grid_product_area">
                        <div class="row justify-content-center" id="product-data">
                            @include('FrontEnd.Layouts.categorizedProduct.singleProducts')
                        </div>
                    </div>
                    <div class="ajax-load text-center" style="display: none">
                        <img src="{{ asset('frontend/loader.gif') }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('front_end_script')

    {{-- Product sorting --}}
    <script>
        $('#sortBy').change(function() {
            var sort = $('#sortBy').val();
            //alert(sort);
            window.location = "{{ url('' . $route . '') }}/{{ $categories->slug }}?sort=" +
                sort; //$route is the variable pass fron Indexcontroller
        });
    </script>

    {{-- loadmoredata --}}

    <script>
        function loadmoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: 'get',
                    beforeSend: function() {
                        $('.ajax-load').show();
                    },
                })
                .done(function(data) {
                    if (data.html == '') { //if no product available 
                        $('.ajax-load').html('No more Product found');
                        return;
                    }
                    //if product available thn load more products
                    $('.ajax-load').hide();
                    $('#product-data').append(data.html);

                })
                .fail(function() {
                    alert('Something went wrong!Please try again');
                });
        }

        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() + 120 >= $(document).height()) {
                page++;
                loadmoreData(page);
            }
        })
    </script>

    {{--  Add to cart,
         and 
        
        data-quantity="1" data-product-id="{{ $item->id }}" class="add_to_cart" id="add_to_cart{{ $item->id }}"
    all are set up in directory FrontEnd.Layouts.categorizedProduct.singleProducts --}}

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $(document).on('click', '.add_to_cart', function(e) {
            e.preventDefault();
            var product_id = $(this).data('product-id');
            var product_qty = $(this).data('quantity');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('cart.store') }}";


            // alert(product_qty);
            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,

                },
                beforeSend: function() {
                    $('#add_to_cart' + product_id).html(
                        '<i class="fa fa-spinner fa-spin"></i> Loading....');
                },
                complete: function() {
                    $('#add_to_cart' + product_id).html('<i class="fa fa-cart-plus"></i> Add to Cart');
                },
                success: function(data) {
                    console.log(data);
                    // $('body #header-ajax').html(data['header']);
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #cart-counter').html(data['cart_count']);
                        swal({
                            title: "Good job!",
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

    {{-- add to wishlist --}}

    <script>
        $(document).on('click', '.add_to_wishlist', function(e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var product_qty = $(this).data('quantity');
            var token = "{{ csrf_token() }}";
            var path = "{{ route('wishlist.store') }}";


            // alert(product_qty);
            $.ajax({
                url: path,
                type: "POST",
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    product_qty: product_qty,
                    _token: token,

                },
                beforeSend: function() {
                    $('#add_to_wishlist_' + product_id).html('<i class="fa fa-spinner fa-spin"></i>');
                },
                complete: function() {
                    $('#add_to_wishlist_' + product_id).html('<i class="fa fa-heart"></i> Add to Cart');
                },
                success: function(data) {
                    console.log(data);
                    // $('body #header-ajax').html(data['header']);
                    if (data['status']) {
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Good job!",
                            text: data['message'],
                            icon: "success",
                            button: "OK!",
                        });
                    }
                    else if(data['present']){
                        $('body #header-ajax').html(data['header']);
                        $('body #wishlist_counter').html(data['wishlist_count']);
                        swal({
                            title: "Opps!",
                            text: data['message'],
                            icon: "warning",
                            button: "OK!",
                        });
                    }
                    else{
                        swal({
                            title: "Sorry!",
                            text: "You can't add that product",
                            icon: "error",
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
@endsection
