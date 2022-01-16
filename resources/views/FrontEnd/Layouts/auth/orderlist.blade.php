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
                            <li><a href="{{ route('my.account') }}">Dashboard</a></li>
                            <li class="active"><a href="{{ route('orderlist') }}">Orders</a></li>
                            <li ><a href="{{ route('my.address') }}">Addresses</a></li>
                            <li><a href="{{ route('my.accountdetail') }}">Account Details</a></li>
                            <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-9">

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

                    <div class="col-12 col-lg-15">
                        <div class="my-account-content mb-50">
                            <div class="cart-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderlist as $item)
                                           <tr>
                                            <th scope="row">
                                                {{ $item->order_number }}
                                            </th>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td>
                                                {{ $item->payment_status }}
                                            </td>
                                            <td>${{ $item->total_amount }}</td>
                                            @if ($item->payment_status=='unpaid')
                                            <td>
                                                <a href="{{ route('hosted.payment') }}" class="btn btn-primary btn-sm m-2">Pay</a>
                                            </td>
                                            @else
                                                
                                            @endif
                                          
                                        </tr>
                                           @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('frontend_css_style')

    <style>
        /* by this , modal view will not conflict with footer */
        .footer_area {
            z-index: -1;
        }

    </style>

@endsection
