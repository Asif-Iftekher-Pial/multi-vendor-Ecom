@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Create new User</h5>
                    <form action="{{ route('user.store') }}" method="POST">
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
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="email" name="email" value=""
                                        required>
                                </div>
{{-- 
                                <div class="form-group">
                                    <label for="">Password<span class="text-danger"> *</span></label>
                                    <input type="password" class="form-control" name="password" id="signin-password"
                                        value="" placeholder="Password" required>
                                </div> --}}


                                <div class="form-group">
                                    <label for="">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control show-tick">
                                        <option value="">-- Select Role --</option>
                                        <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                                        <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                        </option>

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
