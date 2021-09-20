@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>My Account</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="my-account-area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="my-account-navigation mb-50">
                        <ul>
                            <li><a href="{{ route('my.account') }}">Dashboard</a></li>
                            <li><a href="order-list.html">Orders</a></li>
                            <li><a href="downloads.html">Downloads</a></li>
                            <li class="active"><a href="{{ route('my.address') }}">Addresses</a></li>
                            <li><a href="{{ route('my.accountdetail') }}">Account Details</a></li>
                            <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="my-account-content mb-50">
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                                <h6 class="mb-3">Shipping Address</h6>
                                <address>
                                    {{ auth()->user()->full_name }}<br>
                                    {{ auth()->user()->phone }}<br>
                                    {{ auth()->user()->address }} <br>
                                </address>
                                <a href="{{ route('editaddress') }}" class="btn btn-primary btn-sm">Edit Address</a>
                            </div>
                            {{-- <div class="col-12 col-lg-6">
                                <h6 class="mb-3">Shipping Address</h6>
                                <address>
                                    You have not set up this type of address yet.
                                </address>
                                <a href="#" class="btn btn-primary btn-sm">Edit Address</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
