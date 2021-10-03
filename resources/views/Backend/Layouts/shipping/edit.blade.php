@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Edit new shipping</h5>
                    <form action="{{ route('shipping.update',$shippings->id) }}" method="POST">
                        @csrf
                        @method('patch')

                        

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

                        {{-- @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif --}}
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-12">
                                <div class="form-group">
                                    <label for="">Shipping Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Shipping Address" name="shipping_address"
                                        value="{{ $shippings->shipping_address }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Delivery Time <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Delivery Time" name="delivery_time"
                                        value="{{ $shippings->delivery_time }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Delivery charge <span class="text-danger">*</span></label>
                                    <input type="number" step="any" class="form-control" placeholder="Delivery Charge" name="delivery_charge"
                                        value="{{$shippings->delivery_charge}}">
                                </div>
                               
                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control show-tick">
                                        <option value=" ">-- Select status --</option>
                                        <option value="active" {{$shippings->status == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{$shippings->status == 'inactive' ? 'selected' : '' }}>Inactive</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                        <button type="" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
