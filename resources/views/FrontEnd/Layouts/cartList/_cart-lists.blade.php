
<div class="col-12">
    <div class="cart-table">
        <div class="table-responsive" >
            <table class="table table-bordered mb-30">
                <thead>
                    <tr>
                        <th scope="col"><i class="icofont-ui-delete"></i></th>
                        <th scope="col">Image</th>
                        <th scope="col">Product</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::instance('shopping')->content() as $item)
                        <tr>
                            <th scope="row">
                                <i class="icofont-close cart_delete" data-id="{{ $item->rowId }}"></i>
                            </th>
                            @php
                                $photo = explode(',', $item->model->photo); // its because theres multiple photo
                            @endphp
                            <td>
                                <img src=" {{ $photo[0] }}" alt="Product">
                            </td>
                            <td>
                                <a
                                    href="{{ route('product.detail', $item->model->slug) }}">{{ $item->name }}</a>
                            </td>
                            <td>${{ $item->price }}</td>
                            <td>
                                <div class="quantity">
                                    <input type="number" class="qty-text" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}" step="1" 
                                        max="99" name="quantity" value="{{ $item->qty }}">
                                    <input type="hidden" data-id="{{ $item->rowId }}" data-product-quantity="{{ $item->model->stock }}" id="update-cart-{{ $item->rowId  }}">
                                </div>
                            </td>
                            <td>${{ $item->subtotal() }}</td>
                        </tr>
            
                    @endforeach
            
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-12 col-lg-6">
    <div class="cart-apply-coupon mb-30">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        @endif
        <h6>Have a Coupon?</h6>
        <p>Enter your coupon code here &amp; get awesome discounts!</p>
        <!-- Form -->
        <div class="coupon-form">
            <form action="{{ route('coupon.add') }}" id="coupon-form" method="post">
                @csrf
                <input type="text" class="form-control" name="code" placeholder="Enter Your Coupon Code">
                <button type="submit" class="coupon-btn btn btn-primary">Apply Coupon</button>
            </form>
        </div>
    </div>
</div>

<div class="col-12 col-lg-5">
    <div class="cart-total-area mb-30">
        <h5 class="mb-3">Cart Totals</h5>
        <div class="table-responsive">
            <table class="table mb-3">
                <tbody>

                    <tr>
                        <td>Sub Total</td>
                        <td>${{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <td>Save amount</td>
                        <td>
                            @if (Session::has('coupon'))
                                ${{ number_format(Session::get('coupon')['value'], 2) }}

                            @else
                                $0

                            @endif
                        </td>
                    </tr>
                    {{-- <tr>
                        <td>VAT (10%)</td>
                        <td>$5.60</td>
                    </tr> --}}
                    <tr>
                        @if (Session::has('coupon'))
                            @php
                                $subtotal = (float) str_replace(',', '', Cart::subtotal());
                                $coupondiscount = (float) str_replace(',', '', Session::get('coupon')['value']);
                            @endphp
                            <td>Total(coupon applied):</td>
                            <td> {{ number_format($subtotal - $coupondiscount, 2) }}</td>

                        @else
                            <td>Total:</td>
                            <td>${{ Cart::subtotal() }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="{{ route('checkout1') }}" class="btn btn-primary d-block">Proceed To Checkout</a>
    </div>
</div>