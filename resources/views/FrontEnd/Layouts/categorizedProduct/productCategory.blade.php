@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Shop Grid</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Shop Grid</li>
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
                                                    $photo=explode(',',$item->photo);  // its because theres multiple photo
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

                                                <p class="brand_name">{{ App\Models\Brand::where('id',$item->brand_id)->value('title') }}</p>
                                                <a href="#">{{ Str::ucfirst($item->title) }}</a>
                                                <h6 class="product-price">${{ number_format($item->offer_price,2) }} <small><del class="text-danger">${{ number_format($item->price,2) }} </del></small></h6>
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
