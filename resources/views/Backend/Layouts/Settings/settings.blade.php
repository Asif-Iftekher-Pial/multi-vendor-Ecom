@extends('Backend.backEndMaster')
@section('main_content')
    <div class="card">

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="body">
                    <h5>Add project information</h5>
                    <form action="{{ route('setting.update') }}" method="POST">
                        @method('put')
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
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Project Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Title" name="title"
                                        value="{{ $setting->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Company Address" name="address"
                                        value="{{ $setting->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ $setting->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Phone number<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" placeholder="Phone number" name="phone"
                                        value="{{ $setting->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Fax<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Fax" name="fax"
                                        value="{{ $setting->fax }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Footer<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Footer" name="footer"
                                        value="{{ $setting->footer }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Facebook address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="https://myaddress.com" name="facebook_url"
                                        value="{{ $setting->facebook_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Twitter address<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="https://myaddress.com" name="twitter_url"
                                        value="{{ $setting->twitter_url }}">
                                </div><div class="form-group">
                                    <label for="">Linkedin url<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="https://myaddress.com" name="linkedin_url"
                                        value="{{ $setting->linkedin_url }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Keywords</label>
                                    <input type="text" class="form-control" placeholder="Keywords" name="meta_keywords"
                                        value="{{ $setting->meta_keywords }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Meta Description</label>
                                    <textarea class="form-control" rows="5" placeholder="Write about this image"
                                        name="meta_description">{{ $setting->meta_description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Logo<span class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm" data-input="thumbnail" data-preview="holder"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail" class="form-control" type="text" name="logo"
                                            value="{{ $setting->logo }}">
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Favicon icon<span class="text-danger">*</span></label>

                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <a id="lfm1" data-input="thumbnail1" data-preview="holder1"
                                                class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                            </a>
                                        </span>
                                        <input id="thumbnail1" class="form-control" type="text" name="favicon" value="{{ $setting->favicon }}">
                                    </div>
                                    <div id="holder1" style="margin-top:15px;max-height:100px;"> </div>
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
