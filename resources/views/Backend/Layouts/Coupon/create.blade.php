@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Create new coupon</h5>
                    <form action="{{ route('coupon.store') }}" method="POST">
                        @csrf

                        {{-- new error message --}}
                        {{-- <div class="col-lg-12">
                            @include('Backend.Partials.Notification.notification')
                        </div> --}}

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
                                    <label for="">Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="ex. flash sell" name="code"
                                        value="{{ old('code') }}">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="">Coupon Value <span class="text-danger">*</span></label>
                                    <input type="number" min="0" class="form-control" placeholder="ex. 10%" name="value"
                                        value="{{ old('value') }}">
                                </div>



                                <div class="form-group">
                                    <label for="">Type <span class="text-danger">*</span></label>
                                    <select name="type" class="form-control show-tick">
                                        <option value="">-- Type --</option>
                                        <option value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed
                                        </option>
                                        <option value="percent" {{ old('type') == 'percent' ? 'selected' : '' }}>Percent
                                        </option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Select status --</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button> &nbsp;&nbsp;
                        <button type="" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
