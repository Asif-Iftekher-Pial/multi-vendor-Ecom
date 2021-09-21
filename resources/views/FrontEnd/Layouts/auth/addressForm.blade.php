@extends('FrontEnd.Master.master')
@section('main')

<div class="breadcumb_area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <h5>Address</h5>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Customer Address</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="shortcodes_area section_padding_100">
    <div class="container">
        <!-- Shortcodes Content -->
        <div class="row">
            <div class="col-12">

                <!-- Shortcodes Title -->
                <div class="shortcodes_title mb-30">
                    <h5>Edit your address</h5>
                    <p>The following addresses will be used on the checkout page by default.<code></code><code></code></p>
                </div>

                <!-- +++++++++++
                Bootstrap’s Form
                ++++++++++++ -->
                <div class="shortcodes_content">
                    <form action="#" class="bigshop-form" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="full_name">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="full_name" value="" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Last Name" value="" required="">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" id="phone_number" name="phone" min="0" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100 form-control" name="country" id="country">
                                    <option value="bd">Bangladesh</option>
                                    <option value="usa">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="ger">Germany</option>
                                    <option value="fra">France</option>
                                    <option value="ind">India</option>
                                    <option value="aus">Australia</option>
                                    <option value="bra">Brazil</option>
                                    <option value="cana">Canada</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" id="street_address" name="address" placeholder="Street Address" value="">
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode / Zip" value="">
                            </div>
                            
                        </div>

                        <!-- Different Shipping Address -->
                        <div class="different-address mt-50">
                            <div class="ship-different-title mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Ship to a different address?</label>
                                </div>
                            </div>
                            <div class="row shipping_input_field">
                               
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100 form-control" name="scountry" id="ship-country">
                                        <option value="bd">Bangladesh</option>
                                        <option value="usa">United States</option>
                                        <option value="uk">United Kingdom</option>
                                        <option value="ger">Germany</option>
                                        <option value="fra">France</option>
                                        <option value="ind">India</option>
                                        <option value="aus">Australia</option>
                                        <option value="bra">Brazil</option>
                                        <option value="cana">Canada</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="street_address">Street address</label>
                                    <input type="text" class="form-control" id="street-address" name="saddress" placeholder="Street Address" value="">
                                </div>
                               
                                <div class="col-md-6 mb-3">
                                    <label for="city">City</label> 
                                    <input type="text" class="form-control" id="ship-city" name="scity" placeholder="Town/City" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="ship-state" name="sstate" placeholder="State" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="ship-postcode" name="spostcode" placeholder="Postcode / Zip" value="">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div style="text-align: end">
                            <a class="btn btn-outline-warning mb-1" href="{{ route('home') }}">Go Home</a>
                        </div>
                        
                    </form>
                </div>
                <!-- ++++++++++++
                Bootstrap’s Form
                +++++++++++++ -->
            </div>
        </div>
    </div>
</div>
    
@endsection