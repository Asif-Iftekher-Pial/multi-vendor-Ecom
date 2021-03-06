@extends('FrontEnd.Master.master')
@section('main')

    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Login &amp; Register</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Login &amp; Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="bigshop_reg_log_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Login</h5>
                        {{-- @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" id="alert" role="alert">
                                    {{ $error }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif --}}

                        <form action="{{ route('customer.signin') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-check">
                                <div class="custom-control custom-checkbox mb-3 pl-1">
                                    <input type="checkbox" class="custom-control-input" id="customChe">
                                    <label class="custom-control-label" for="customChe">Remember me for this
                                        computer</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="#">Forget Password?</a>
                        </div>

                        <br>
                        
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <strong>Login with social media</strong>
                               <p>for facebook login <a href="http://localhost:8000/">Click here...</a></p> 
                                <br>
                                <a href="{{ route('login.google') }}" class="btn btn-danger btn-sm">Google</a>
                                <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-sm">Facebook</a>
                                <a href="{{ route('login.github') }}" class="btn btn-dark btn-sm">Github</a>
                            </div>
                        </div>
                       
                       
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Register</h5>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" id="alert" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('customer.registration') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    placeholder="Full Name">
                            </div>
                            @error('fullname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="User Name">
                            </div>
                            @error('username')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="male"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="female"
                                    id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                            </div>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirmpassword" id="password"
                                    placeholder="Repeat Password">
                            </div>
                            @error('confirmpassword')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="btn btn-outline-success mb-1">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('front_end_script')
    {{-- validation error --}}
    <script>
        setTimeout(function() {
            $('#alert').slideUp();
        }, 4000);
    </script>

    
@endsection
