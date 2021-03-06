@extends('FrontEnd.Master.master')
@section('main')
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>My Account</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                            <li class="{{ \Request::is('user/my-account') ? 'active' : '    '}}"><a href="{{ route('my.account') }}">Dashboard</a></li>
                            <li><a href="{{ route('orderlist') }}">Orders</a></li>
                            <li><a href="downloads.html">Downloads</a></li>
                            <li><a href="{{ route('my.address') }}">Addresses</a></li>
                            <li><a href="{{ route('my.accountdetail') }}">Account Details</a></li>
                            <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="my-account-content mb-50">
                        <p>Hello <strong>{{ $user->full_name }}</strong> (not
                            <strong>{{ $user->full_name }}</strong>? <a
                                href="{{ route('customer.logout') }}">Log out</a>)</p>
                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing
                            addresses, and <a href="account-details.html">edit your password and account details</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
