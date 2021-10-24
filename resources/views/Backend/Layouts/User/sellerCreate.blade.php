@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <div class="dropdown">
                        <a class="btn btn-warning btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Select Position
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                          <li><a class="dropdown-item" href="{{ route('user.create') }}">Employee</a></li>
                          
                          <li><a class="dropdown-item" href="{{ route('sellerAdd') }}">Seller</a></li>
                        </ul>
                    </div>


                    <br>
                    <br>

                    <h5>Create Seller</h5>
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

                                
{{-- 
                                <div class="form-group">
                                    <label for="">Role <span class="text-danger">*</span></label>
                                    <select name="role" class="form-control show-tick">
                                        <option value="">-- Select Role --</option>
                                        <option value="employee" {{ old('role') == 'employee' ? 'selected' : '' }}>Employee</option>
                                        <option value="vendor" {{ old('role') == 'vendor' ? 'selected' : '' }}>Vendor</option>
                                        </option>

                                    </select>
                                </div> --}}

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
@section('backend_script')
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
