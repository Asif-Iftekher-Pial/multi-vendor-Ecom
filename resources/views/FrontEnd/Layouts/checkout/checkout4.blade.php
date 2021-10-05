@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout_steps_area">
        <a class="complated" href="{{ route('checkout1') }}"><i class="icofont-check-circled"></i> Billing</a>
        <a class="complated" href="{{ route('checkout2.store') }}"><i class="icofont-check-circled"></i> Shipping</a>
        <a class="complated" href="{{ route('checkout3.store') }}"><i class="icofont-check-circled"></i> Payment</a>
        <a class="active" href="checkout-5.html"><i class="icofont-check-circled"></i> Review</a>
    </div>
    <div class="checkout_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="checkout_details_area clearfix">
                        <h5 class="mb-30">Review Your Order</h5>

                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-30">
                                    <thead>
                                        <tr>
                                            
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
                                                @php
                                                    $photo = explode(',', $item->model->photo); // its because theres multiple photo
                                                @endphp
                                               
                                                <td>
                                                    <img src="{{ $photo[0] }}" alt="Product">
                                                </td>
                                                <td>
                                                    <a href="{{ route('product.detail', $item->model->slug) }}">{{ $item->name }}</a></a>
                                                </td>
                                                <td>${{ number_format($item->price, 2) }}</td>
                                                <td>
                                                    {{ $item->qty }} 
                                                </td>
                                                <td>${{ $item->subtotal() }}</td>
                                            </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-7 ml-auto">
                    <div class="cart-total-area">
                       
                        <h5 class="mb-3">Cart Totals</h5>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>${{ Cart::subtotal() }}</td>
                                    </tr>

                                    @if (Session::has('coupon'))
                                        <tr>
                                            <td>Discount</td>
                                            <td>${{ number_format(Session::get('coupon')['value'], 2) }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Discount</td>
                                            <td>
                                                <p class="badge badge-danger">No coupon applied</p>
                                            </td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>Shipping</td>
                                        <td>${{ number_format(Session::get('checkout')[0]['delivery_charge'], 2) }}</td>
                                        {{-- session delivery_charge- --}}
                                    </tr>

                                    <tr>
                                        <td>Total</td>
                                        @if (Session::has('coupon') && Session::has('checkout'))
                                            @php
                                                $subtotal = (float) str_replace(',', '', Cart::subtotal());
                                                $coupondiscount = (float) str_replace(',', '', Session::get('coupon')['value']);
                                                $deliverycharge = Session::get('checkout')[0]['delivery_charge'];
                                            @endphp
                                            {{-- {{ $total=$subtotal-$coupondiscount + $deliverycharge }}
                                            @dd($total) --}}
                                            <td>${{ number_format($subtotal - $coupondiscount + $deliverycharge, 2) }}
                                            </td>
                                            {{-- if session has coupon then coupon value will display --}}
                                        @elseif (Session::has('checkout'))
                                            @php
                                                $subtotal = (float) str_replace(',', '', Cart::subtotal());
                                                $deliverycharge = Session::get('checkout')[0]['delivery_charge'];
                                            @endphp


                                            <td>${{ $subtotal + $deliverycharge }}</td>


                                            {{-- @php
                                                $subtotal = (float) str_replace(',', '', Cart::subtotal());
                                                $coupondiscount = (float) str_replace(',', '', Session::get('coupon')['value']);
                                                $deliverycharge = Session::get('checkout')[0]['delivery_charge'];
                                            @endphp --}}
                                            {{-- <td>${{ number_format((float) str_replace(',', '', Cart::subtotal() + Session::get('checkout')[0]['delivery_charge']), 2) }}
                                            </td> --}}
                                            {{-- <td>${{ number_format($subtotal + $deliverycharge, 2) }}</td> --}}
                                            {{-- if session doesnt have any coupon thn delivery charge + subtotal --}}

                                            {{-- @elseif (Session::has('coupon') && Session::has('checkout'))
                                            <td>${{ number_format(($subtotal  - $coupondiscount) + $deliverycharge, 2) }}
                                               
                                            </td> --}}

                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="checkout_pagination d-flex justify-content-end mt-3">
                            <a href="checkout-4.html" class="btn btn-primary mt-2 ml-2 d-none d-sm-inline-block">Go Back</a>
                            <a href="{{ route('checkout.store') }}" class="btn btn-primary mt-2 ml-2">Confirm</a>
                        </div>

                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
