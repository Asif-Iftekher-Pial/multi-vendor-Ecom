<!-- Top Header Area -->
<div class="top-header-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-6">
                <div class="welcome-note">
                    <span class="popover--text" data-toggle="popover"
                        data-content="Welcome to Bigshop ecommerce template."><i class="icofont-info-square"></i></span>
                    <span class="text">Welcome to {{ get_setting('title') }}</span> 
                    {{-- get_setting is from helper function --}}
                </div>
            </div>
            <div class="col-6">
                <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                    <!-- Language Dropdown -->
                    <div class="language-dropdown">
                        <div class="dropdown">
                            <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                English
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="#">English</a>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Currency Dropdown -->
                    <div class="currency-dropdown">
                        <div class="dropdown">
                            <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                $ TK
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="#">৳ BDT</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Menu -->
<div class="bigshop-main-menu">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar" id="bigshopNav">

                <!-- Nav Brand -->
                <a href="{{ route('home') }}" class="nav-brand"><img src="frontend/img/core-img/logo.png"
                        alt="logo"></a>

                <!-- Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Close -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span
                                class="bottom"></span></div>
                    </div>

                    <!-- Nav -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a>

                            </li>
                            <li><a href="{{ route('shop') }}">Shop</a>
                                {{-- <ul class="dropdown">
                                    <li><a href="#">Shop Grid</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-grid-left-sidebar.html">Shop Grid Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-grid-right-sidebar.html">Shop Grid Right Sidebar</a>
                                            </li>
                                            <li><a href="shop-grid-top-sidebar.html">Shop Grid Top Sidebar</a></li>
                                            <li><a href="shop-grid-no-sidebar.html">Shop Grid No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Shop List</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a>
                                            </li>
                                            <li><a href="shop-list-top-sidebar.html">Shop List Top Sidebar</a></li>
                                            <li><a href="shop-list-no-sidebar.html">Shop List No Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="product-details.html">Single Product</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="#">Checkout</a>
                                        <ul class="dropdown">
                                            <li><a href="checkout-1.html">Login</a></li>
                                            <li><a href="checkout-2.html">Billing</a></li>
                                            <li><a href="checkout-3.html">Shipping Method</a></li>
                                            <li><a href="checkout-4.html">Payment Method</a></li>
                                            <li><a href="checkout-5.html">Review</a></li>
                                            <li><a href="checkout-complate.html">Complate</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Account Page</a>
                                        <ul class="dropdown">
                                            <li><a href="my-account.html">- Dashboard</a></li>
                                            <li><a href="order-list.html">- Orders</a></li>
                                            <li><a href="downloads.html">- Downloads</a></li>
                                            <li><a href="addresses.html">- Addresses</a></li>
                                            <li><a href="account-details.html">- Account Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                </ul> --}}
                            </li>
                            <li><a href="#">Pages</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="about-us.html">- About Us</a></li>
                                        <li><a href="faq.html">- FAQ</a></li>
                                        <li><a href="contact.html">- Contact</a></li>
                                        <li><a href="login.html">- Login &amp; Register</a></li>
                                        <li><a href="404.html">- 404</a></li>
                                        <li><a href="500.html">- 500</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="my-account.html">- Dashboard</a></li>
                                        <li><a href="order-list.html">- Orders</a></li>
                                        <li><a href="downloads.html">- Downloads</a></li>
                                        <li><a href="addresses.html">- Addresses</a></li>
                                        <li><a href="account-details.html">- Account Details</a></li>
                                        <li><a href="coming-soon.html">- Coming Soon</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-2">
                                        <div class="megamenu-slides owl-carousel">
                                            <a href="shop-grid-left-sidebar.html">
                                                <img src="img/bg-img/mega-slide-2.jpg" alt="">
                                            </a>
                                            <a href="shop-list-left-sidebar.html">
                                                <img src="img/bg-img/mega-slide-1.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-with-left-sidebar.html">Blog Left Sidebar</a></li>
                                    <li><a href="blog-with-right-sidebar.html">Blog Right Sidebar</a></li>
                                    <li><a href="blog-with-no-sidebar.html">Blog No Sidebar</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Elements</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="accordian.html">- Accordions</a></li>
                                        <li><a href="alerts.html">- Alerts</a></li>
                                        <li><a href="badges.html">- Badges</a></li>
                                        <li><a href="blockquotes.html">- Blockquotes</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="breadcrumb.html">- Breadcrumbs</a></li>
                                        <li><a href="buttons.html">- Buttons</a></li>
                                        <li><a href="forms.html">- Forms</a></li>
                                        <li><a href="gallery.html">- Gallery</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="heading.html">- Headings</a></li>
                                        <li><a href="icon-fontawesome.html">- Icon FontAwesome</a></li>
                                        <li><a href="icon-icofont.html">- Icon Ico Font</a></li>
                                        <li><a href="labels.html">- Labels</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li><a href="modals.html">- Modals</a></li>
                                        <li><a href="pagination.html">- Pagination</a></li>
                                        <li><a href="progress-bars.html">- Progress Bars</a></li>
                                        <li><a href="tables.html">- Tables</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Hero Meta -->
                <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                    <!-- Search -->
                    <div class="search-area">
                        <div class="search-btn"><i class="icofont-search"></i></div>
                        <!-- Form -->
                        <form action="{{ route('search') }}" method="GET">
                            
                            <div class="search-form d-flex">
                                <input type="search" id="search_text" name="query" class="form-control" placeholder="Search">
                                <button type="submit" class="btn btn-sm btn-primary" style="margin:7px">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Wishlist -->
                    <div class="wishlist-area">
                        <a href="{{ route('wishlist') }}" class="wishlist-btn" id="wishlist_counter"><i
                                class="icofont-heart"> {{ Cart::instance('wishlist')->count() }}</i></a>
                    </div>

                    <!-- Cart -->
                    <div class="cart-area">
                        <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity"
                                id="cart-counter">{{ \Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->count() }}</span>
                        </div>

                        <!-- Cart Dropdown Content -->
                        <div class="cart-dropdown-content">
                            <ul class="cart-list">
                                @foreach (\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping')->content() as $item)
                                    <li>
                                        @php
                                            $photo = explode(',', $item->model->photo); // its because theres multiple photo
                                        @endphp

                                        <div class="cart-item-desc">
                                            <a href="{{ route('product.detail', $item->model->slug) }}" class="image">
                                                <img src=" {{ $photo[0] }}" class="cart-thumb" alt="">
                                            </a>
                                            <div>
                                                <a
                                                    href="{{ route('product.detail', $item->model->slug) }}">{{ $item->name }}</a>
                                                <p>{{ $item->qty }} - <span
                                                        class="price">${{ number_format($item->price, 2) }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <span class="dropdown-product-remove cart_delete"
                                            data-id="{{ $item->rowId }}"><i class="icofont-bin"></i></span>
                                    </li>
                                @endforeach


                            </ul>
                            <div class="cart-pricing my-4">
                                <ul>
                                    <li>
                                        <span>Sub Total:</span>
                                        <span>${{ Cart::subtotal() }}</span>
                                    </li>
                                    <li>
                                        <span>Total:</span>
                                        @if (Session::has('coupon'))
                                            @php
                                                $subtotal = (float) str_replace(',', '', Cart::subtotal());
                                                $coupondiscount = (float) str_replace(',', '', Session::get('coupon')['value']);
                                            @endphp
                                            <span>${{ number_format($subtotal - $coupondiscount, 2) }}</span>
                                        @else
                                            <span>${{ Cart::subtotal() }}</span>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-box ">
                                <a href="{{ route('cart') }}" class="btn btn-success btn-sm">Manage</a>
                                <a href="checkout-1.html" class="btn btn-primary btn-sm">Checkout</a>
                            </div>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="account-area">

                        @auth
                            <div class="user-thumbnail">
                                @if (auth()->user()->photo)
                                    <img src="{{ auth()->user()->photo }}" alt="">
                                @else
                                    <img src="{{ Helper::userDefaultImage() }}" alt="">
                                @endif

                            </div>
                            <ul class="user-meta-dropdown">
                                @php
                                    $first_name = explode(' ', auth()->user()->full_name);
                                @endphp
                                <li class="user-title"><span>Hello, </span>{{ $first_name[0] }}!</li>
                                <li><a href="{{ route('my.account') }}">My Account</a></li>
                                <li><a href="order-list.html">Orders List</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li><a href="{{ route('customer.logout') }}"><i class="icofont-logout"></i>Logout</a>
                                </li>
                            </ul>
                        @else
                            <a class="badge badge-primary" href="{{ route('customer.login') }}">Login</a>
                        @endauth

                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
