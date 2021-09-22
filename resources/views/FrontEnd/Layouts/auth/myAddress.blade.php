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
                            <li><a href="order-list.html">Orders</a></li>
                            <li><a href="downloads.html">Downloads</a></li>
                            <li class="active"><a href="{{ route('my.address') }}">Addresses</a></li>
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

                    <div class="my-account-content mb-50">
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                                <h6 class="mb-3">Billing Address</h6>
                                <address>
                                    {{ $user->full_name }}<br>
                                    {{ $user->address }} <br>
                                    {{ $user->state }} <br>
                                    {{ $user->city }} <br>
                                    {{ $user->postcode }} <br>
                                    {{ $user->country }} <br>
                                </address>
                                {{-- <a href="{{ route('editaddress') }}" class="btn btn-primary btn-sm">Edit Address</a> --}}

                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editAddress">
                                    Edit Address
                                </button>
                                <div class="modal fade" id="editAddress" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false"
                                    style="background: rgba(0,0,0,.5);">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('editbillingaddress', $user->id) }}" method="POST">

                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="address">Address</label>
                                                        <textarea name="address" class="form-control"
                                                            id="">{{ $user->address }}</textarea>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="country">Country</label>
                                                        <input type="text" class="form-control" id="" name="country"
                                                            placeholder="Country" value="{{ $user->country }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="ship-city" name="city"
                                                            placeholder="City" value="{{ $user->city }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="state">State</label>
                                                        <input type="text" class="form-control" id="ship-state"
                                                            name="state" placeholder="State" value="{{ $user->state }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="postcode">Postcode/Zip</label>
                                                        <input type="number" class="form-control" id="ship-postcode"
                                                            name="postcode" placeholder="Postcode / Zip"
                                                            value="{{ $user->postcode }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12 col-lg-6">
                                <h6 class="mb-3">Shipping Address</h6>
                                <address>
                                    {{ $user->full_name }}<br>
                                    {{ $user->saddress }} <br>
                                    {{ $user->sstate }} <br>
                                    {{ $user->scity }} <br>
                                    {{ $user->spostcode }} <br>
                                    <p class="badge badge-success">Contact: </p>
                                    {{ $user->phone }}<br>
                                    {{ $user->scountry }} <br>
                                </address>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#editShippingAddress">
                                    Edit shipping Address
                                </button>
                                <div class="modal fade" id="editShippingAddress" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="false"
                                    style="background: rgba(0,0,0,.5);">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit shipping
                                                    address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('editshippingaddress',$user->id ) }}" method="POST">
                                               
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="address">Shipping Address</label>
                                                        <textarea name="saddress" class="form-control"
                                                            id="">{{ $user->saddress }}</textarea>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="country">Shipping Country</label>
                                                        <input type="text" class="form-control" id="" name="scountry"
                                                            placeholder="Country" value="{{ $user->scountry }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="city">Shipping City</label>
                                                        <input type="text" class="form-control" id="ship-city"
                                                            name="scity" placeholder="City" value="{{ $user->scity }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="state">Shipping State</label>
                                                        <input type="text" class="form-control" id="ship-state"
                                                            name="sstate" placeholder="State" value="{{ $user->sstate }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="postcode">Shipping Postcode/Zip</label>
                                                        <input type="number" class="form-control" id="ship-postcode"
                                                            name="spostcode" placeholder="Postcode / Zip"
                                                            value="{{ $user->spostcode }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="phone">Contact Number</label>
                                                        <input type="number" class="form-control" id="ship-postcode"
                                                            name="phone" placeholder="Contact Number"
                                                            value="{{ $user->phone }}">
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary btn-sm">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
