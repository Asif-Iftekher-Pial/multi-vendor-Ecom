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
                    <div class="my-account-content mb-50">
                        <p>The following addresses will be used on the checkout page by default.</p>

                        <div class="row">
                            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                                <h6 class="mb-3">Shipping Address</h6>
                                <address>
                                    {{ $user->full_name }}<br>
                                    {{ $user->phone }}<br>
                                    {{ $user->address }} <br>
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
                                            <form action="{{ route('editbillingaddress',$user->id) }}" method="POST">
                                                
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
                                    You have not set up this type of address yet.
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
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit shipping address</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                @method('patch')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="address">Shipping Address</label>
                                                        <textarea name="saddress" class="form-control"
                                                            id="">{{ $user->address }}</textarea>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="country">Shipping Country</label>
                                                        <input type="text" class="form-control" id="" name="scountry"
                                                            placeholder="Country" value="{{ $user->country }}">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="city">Shipping City</label>
                                                        <input type="text" class="form-control" id="ship-city" name="scity"
                                                            placeholder="City" value="{{ $user->city }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="state">Shipping State</label>
                                                        <input type="text" class="form-control" id="ship-state"
                                                            name="sstate" placeholder="State" value="{{ $user->state }}">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="postcode">Shipping Postcode/Zip</label>
                                                        <input type="number" class="form-control" id="ship-postcode"
                                                            name="spostcode" placeholder="Postcode / Zip"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
