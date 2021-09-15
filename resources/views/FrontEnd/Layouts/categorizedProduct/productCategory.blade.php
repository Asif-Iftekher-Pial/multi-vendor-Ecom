@extends('FrontEnd.Master.master')
@section('main')

    <!-- Quick View Modal Area -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
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
                                            <a href="#">View Full Product Details</a>
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
    </div>
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
                        <select class="small right" style="display: none;">
                            <option selected="">Short by Popularity</option>
                            <option value="1">Short by Newest</option>
                            <option value="2">Short by Sales</option>
                            <option value="3">Short by Ratings</option>
                        </select>
                        <div class="nice-select small right" tabindex="0"><span class="current">Short by
                                Popularity</span>
                            <ul class="list">
                                <li data-value="Short by Popularity" class="option selected">Short by Popularity</li>
                                <li data-value="1" class="option">Short by Newest</li>
                                <li data-value="2" class="option">Short by Sales</li>
                                <li data-value="3" class="option">Short by Ratings</li>
                            </ul>
                        </div>
                    </div>

                    <div class="shop_grid_product_area">
                        <div class="row justify-content-center">

                            <!-- Single Product -->
                            @if (count($categories->products) > 0)
                                @foreach ($categories->products as $item)
                                    <div class="col-9 col-sm-6 col-md-4 col-lg-3">
                                        <div class="single-product-area mb-30">
                                            <div class="product_image">
                                                <!-- Product Image -->
                                                @php
                                                    $photo = explode(',', $item->photo); // its because theres multiple photo
                                                @endphp
                                                <img class="normal_img" src="{{ $photo[0] }}" alt="">
                                                <img class="hover_img" src="{{ $photo[1] }}" alt="">

                                                <!-- Product Badge -->
                                                <div class="product_badge">
                                                    <span>{{ $item->conditions }}</span>
                                                </div>

                                                <!-- Wishlist -->
                                                <div class="product_wishlist">
                                                    <a href="wishlist.html"><i class="icofont-heart"></i></a>
                                                </div>

                                                <!-- Compare -->
                                                <div class="product_compare">
                                                    <a href="compare.html"><i class="icofont-exchange"></i></a>
                                                </div>
                                            </div>

                                            <!-- Product Description -->
                                            <div class="product_description">
                                                <!-- Add to cart -->
                                                <div class="product_add_to_cart">
                                                    <a href="#"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                                                </div>

                                                <!-- Quick View -->
                                                <div class="product_quick_view">
                                                    <a href="#" data-toggle="modal" data-target="#quickview"><i
                                                            class="icofont-eye-alt"></i> Quick View</a>
                                                </div>

                                                <p class="brand_name">
                                                    {{ App\Models\Brand::where('id', $item->brand_id)->value('title') }}
                                                </p>
                                                <a href="{{ route('product.detail',$item->slug) }}">{{ Str::ucfirst($item->title) }}</a>
                                                <h6 class="product-price">${{ number_format($item->offer_price, 2) }}
                                                    <small><del
                                                            class="text-danger">${{ number_format($item->price, 2) }}
                                                        </del></small></h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                <p>
                                <h2>No Products Found...!</h2>
                                </p>
                            @endif
                            
                        </div>
                    </div>

                    <!-- Shop Pagination Area -->
                    <div class="shop_pagination_area mt-30">
                        <nav aria-label="Page navigation">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-left"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">...</a></li>
                                <li class="page-item"><a class="page-link" href="#">8</a></li>
                                <li class="page-item"><a class="page-link" href="#">9</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#"><i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
