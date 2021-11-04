@extends('Backend.backEndMaster')
@section('main_content')

    <div class="container-fluid">

        <div class="row clearfix">

            <div class="col-lg-6 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        {{-- <div>
                            <img src="{{ $data->photo }}" class="rounded-circle" alt="profile photo" style="max-height: 90px; max-idth: 120px">
                        </div> --}}
                        <div class="profile-image"> <img src="{{ $data->photo }}" class="rounded-circle" style="height: 100px;width: 100px" alt=""> </div>
                        <div>
                            <h4 class="m-b-0"><strong>{{ auth('seller')->user()->full_name }}</strong></h4>
                            <span>{{ auth('seller')->user()->username }}</span> <br>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>Info</h2>

                    </div>
                    <div class="body">
                        <small class="text-muted">Gender: </small>
                        <p>{{ auth('seller')->user()->gender }}</p>
                        <hr>

                        <small class="text-muted">Address: </small>
                        <p>{{ auth('seller')->user()->address }}</p>

                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>{{ auth('seller')->user()->email }}</p>
                        <hr>
                        <small class="text-muted">Mobile: </small>
                        <p>{{ auth('seller')->user()->phone }}</p>
                        <hr>

                        <hr>
                        <small class="text-muted">Social: </small>
                        <p><i class="fa fa-twitter m-r-5"></i> twitter.com/example</p>
                        <p><i class="fa fa-facebook  m-r-5"></i> facebook.com/example</p>
                        <p><i class="fa fa-github m-r-5"></i> github.com/example</p>
                        <p><i class="fa fa-instagram m-r-5"></i> instagram.com/example</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-5 col-md-12">

                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs-new">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Overview">Overview</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Settings">Profile Settings</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content padding-0">

                    <div class="tab-pane active" id="Overview">
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
                        <div class="card">
                            <div class="body">
                                <div class="new_post">

                                    <div class="post-toolbar-b">
                                        <form action="{{ route('profilepicture') }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group">
                                                <label for="">Upload picture<span class="text-danger">*</span></label>

                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="thumbnail" class="form-control" type="text" name="photo">
                                                </div>
                                                <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                                            </div>
                                            <button type="submit" class="btn btn-warning"><i
                                                    class="icon-camera"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card single_post">
                            <div class="body">
                                <div class="img-post">
                                    <img class="d-block img-fluid" src="../assets/images/blog/blog-page-1.jpg"
                                        alt="First slide">
                                </div>
                                <h3><a href="blog-details.html">All photographs are accurate</a></h3>
                                <p>It is a long established fact that a reader will be distracted by the readable content of
                                    a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal</p>
                            </div>
                            <div class="footer">
                                <div class="actions">
                                    <a href="javascript:void(0);" class="btn btn-outline-secondary">Continue Reading</a>
                                </div>
                                <ul class="stats">
                                    <li><a href="javascript:void(0);">General</a></li>
                                    <li><a href="javascript:void(0);" class="icon-heart">28</a></li>
                                    <li><a href="javascript:void(0);" class="icon-bubbles">128</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="Settings">

                        <div class="card">

                            <div class="body">
                                <form action="{{ route('basicinfo') }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <h6>Update Basic Information</h6>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="full_name" class="form-control"
                                                    placeholder="Full Name" value="{{ auth('seller')->user()->full_name }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="User Name" value="{{ auth('seller')->user()->username }}">
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <label class="fancy-radio">
                                                        <input name="gender" value="male" type="radio" checked="">
                                                        <span><i></i>Male</span>
                                                    </label>
                                                    <label class="fancy-radio">
                                                        <input name="gender" value="female" type="radio">
                                                        <span><i></i>Female</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address" value="{{ auth('seller')->user()->address }}">
                                            </div>
                                            <div class="form-group">
                                                <input type="number" name="phone" class="form-control"
                                                    placeholder="phone" value="{{ auth('seller')->user()->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>

                        <div class="card">
                            <div class="body">
                                <form action="{{ route('changepassword') }}" method="POST">
                                    @csrf
                                    @method('patch')
                                    <div class="row clearfix">
                                      
                                        <div class="col-lg-12 col-md-12">
                                            <h6>Change Password</h6>
                                            <div class="form-group">
                                                <input type="password" name="OldPassword" class="form-control" placeholder="Current Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="NewPassword" class="form-control" placeholder="New Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="NewPasswordConfirm" class="form-control" placeholder="Confirm New Password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                    <button class="btn btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>

                      
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
