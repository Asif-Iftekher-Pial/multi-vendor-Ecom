@extends('FrontEnd.Master.master')
@section('main')

    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Product Details</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>

                        <li class="breadcrumb-item active">Product Details</li>
                        <li class="breadcrumb-item active"> {{ $productDetails->title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="single_product_details_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <!-- Carousel Inner -->
                            <div class="carousel-inner">

                                @php
                                    $photos = explode(',', $productDetails->photo); // its because theres multiple photo
                                @endphp

                                @foreach ($photos as $key => $photo)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <a class="gallery_img" href="{{ $photo }}"
                                            title="{{ $productDetails->title }}">
                                            <img class="d-block w-100" src="{{ $photo }}"
                                                alt="{{ $productDetails->title }}">
                                        </a>
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">{{ $productDetails->conditions }}</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <!-- Carosel Indicators -->
                            <ol class="carousel-indicators">

                                @php
                                    $photos = explode(',', $productDetails->photo); // its because theres multiple photo
                                @endphp

                                @foreach ($photos as $key => $photo)
                                    <li class="{{ $key == 0 ? 'active' : '' }}" data-target=" #product_details_slider"
                                        data-slide-to="{{ $key }}"
                                        style="background-image: url({{ $photo }});">
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Single Product Description -->
                <div class="
                                    col-12 col-lg-6">
                    <div class="single_product_desc">
                        <h4 class="title mb-2">{{ Str::ucfirst($productDetails->title) }}</h4>
                        <div class="single_product_ratings mb-2">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="text-muted">(8 Reviews)</span>
                        </div>
                        <h4 class="price mb-4">${{ number_format($productDetails->offer_price, 2) }}
                            <span>${{ number_format($productDetails->price, 2) }}</span>
                        </h4>

                        <!-- Overview -->
                        <div class="short_overview mb-4">
                            <h6>Overview</h6>
                            <p>
                                {!! html_entity_decode($productDetails->summary) !!}
                            </p>
                        </div>

                        <!-- Color Option -->
                        {{-- <div class="widget p-0 color mb-3">
                                            <h6 class="widget-title">Color</h6>
                                            <div class="widget-desc d-flex">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label black" for="customRadio1"></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label pink" for="customRadio2"></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label red" for="customRadio3"></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio4" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label purple" for="customRadio4"></label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio5" name="customRadio"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label white" for="customRadio5"></label>
                                                </div>
                                            </div>
                                        </div> --}}

                        <!-- Size Option -->
                        <div class="widget p-0 size mb-3">
                            <h6 class="widget-title">Size</h6>
                            <div class="widget-desc" style="display: block; width: 45%;">
                                @php
                                    $product_attr=App\Models\ProductAttribute::where('product_id',$productDetails->id)->get();
                                @endphp
                                <select name="size" id="">
                                    @foreach ( $product_attr as $size)
                                    <option value="{{ $size->size }}">{{ $size->size }}</option>
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix my-5 d-flex flex-wrap align-items-center" method="post">
                            <div class="quantity">
                                <input type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="12"
                                    name="quantity" value="1">
                            </div>
                            <button type="submit" name="addtocart" value="5"
                                class="btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart</button>
                        </form>

                        <!-- Others Info -->
                        <div class="others_info_area mb-3 d-flex flex-wrap">
                            <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart"
                                    aria-hidden="true"></i> WISHLIST</a>
                            <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i>
                                COMPARE</a>
                            <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i> SHARE
                                WITH FRIEND</a>
                        </div>

                        <!-- Size Guide -->
                        <div class="sizeguide">
                            <h6>Size Guide</h6>

                            <div class="size_guide_thumb d-flex">
                                @php
                                    $size_guide = explode(',', $productDetails->size_guide);
                                @endphp
                                @foreach ($size_guide as $sg)
                                    <a class="size_guide_img" href="{{ $sg }}"
                                        style="background-image: url({{ $sg }});">
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab section_padding_100_0 clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab"
                                    aria-selected="false">Reviews <span class="text-muted">(3)</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab"
                                    aria-selected="false">Additional Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Return &amp;
                                    Cancellation</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active show" id="description">
                                <div class="description_area">
                                    <h5>Description</h5>
                                    {!! html_entity_decode($productDetails->description) !!}
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <div class="reviews_area">
                                    <ul>
                                        <li>
                                            <div class="single_user_review mb-15">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Quality</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep
                                                            2019</span></p>
                                                </div>
                                            </div>
                                            <div class="single_user_review mb-15">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Design</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep
                                                            2019</span></p>
                                                </div>
                                            </div>
                                            <div class="single_user_review">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Value</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep
                                                            2019</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <span>Your Ratings</span>
                                            <div class="stars">
                                                <input type="radio" name="star" class="star-1" id="star-1">
                                                <label class="star-1" for="star-1">1</label>
                                                <input type="radio" name="star" class="star-2" id="star-2">
                                                <label class="star-2" for="star-2">2</label>
                                                <input type="radio" name="star" class="star-3" id="star-3">
                                                <label class="star-3" for="star-3">3</label>
                                                <input type="radio" name="star" class="star-4" id="star-4">
                                                <label class="star-4" for="star-4">4</label>
                                                <input type="radio" name="star" class="star-5" id="star-5">
                                                <label class="star-5" for="star-5">5</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nickname</label>
                                            <input type="email" class="form-control" id="name" placeholder="Nazrul">
                                        </div>
                                        <div class="form-group">
                                            <label for="options">Reason for your rating</label>
                                            <select class="form-control small right py-0 w-100" id="options">
                                                <option>Quality</option>
                                                <option>Value</option>
                                                <option>Design</option>
                                                <option>Price</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="comments">Comments</label>
                                            <textarea class="form-control" id="comments" rows="5"
                                                data-max-length="150"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <h5>Additional Info</h5>
                                   {!! html_entity_decode($productDetails->additional_info) !!}
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="refund">
                                <div class="refund_area">
                                    <h6>Return Policy</h6>
                                    {!! html_entity_decode($productDetails->return_cancellation) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Related Products Area -->
    <section class="you_may_like_area section_padding_0_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_heading new_arrivals">
                        <h5>You May Also Like</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="you_make_like_slider owl-carousel">

                        <!-- Single Product -->
                        @foreach ($productDetails->related_products as $item)


                            <div class="single-product-area">
                                <div class="product_image">
                                    <!-- Product Image -->
                                    @php
                                        $photo = explode(',', $item->photo); // its because theres multiple photo
                                    @endphp
                                    <img class="normal_img" src="{{ $photo[0] }}" alt="{{ $item->title }}">
                                    <img class="hover_img" src="{{ $photo[1] }}" alt="{{ $item->title }}">

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
                                    <a
                                        href="{{ route('product.detail', $item->slug) }}">{{ Str::ucfirst($item->title) }}</a>
                                    <h6 class="product-price">${{ number_format($item->offer_price, 2) }}
                                        <small><del class="text-danger">${{ number_format($item->price, 2) }}
                                            </del></small>
                                    </h6>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('frontend_css_style')
<style>
    .nice-select{
        float: none;
    }

    .widget.size .widget-desc li{
        display: block;
    }
    .nice-select.open.list{
        width:100%;
    }

</style>
    
@endsection
