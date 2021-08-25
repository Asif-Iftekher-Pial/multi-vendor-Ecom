@extends('Backend.backEndMaster')
@section('main_content')

    <div class="container-fluid">

        <div class="row clearfix">

            <div class="col-lg-6 col-md-12">
                <div class="card profile-header">
                    <div class="body">
                        <div class="profile-image"> <img src="../assets/images/user.png" class="rounded-circle" alt="">
                        </div>
                        <div>
                            <h4 class="m-b-0"><strong>{{ auth()->user()->full_name }}</strong></h4>
                            <span>{{ auth()->user()->username }}</span>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2>Info</h2>

                    </div>
                    <div class="body">
                        <small class="text-muted">Address: </small>
                        <p>{{ auth()->user()->address }}</p>

                        <hr>
                        <small class="text-muted">Email address: </small>
                        <p>{{ auth()->user()->email }}</p>
                        <hr>
                        <small class="text-muted">Mobile: </small>
                        <p>{{ auth()->user()->phone }}</p>
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
                        <div class="card">
                            <div class="body">
                                <div class="new_post">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize"
                                            placeholder="Please type what you want..."></textarea>
                                    </div>
                                    <div class="post-toolbar-b">
                                        <button class="btn btn-warning"><i class="icon-link"></i></button>
                                        <button class="btn btn-warning"><i class="icon-camera"></i></button>
                                        <button class="btn btn-primary">Post</button>
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
                                <form action="" method="POST">
                                    @csrf
                                    <h6>Basic Information</h6>
                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="full_name" class="form-control"
                                                    placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="User Name">
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
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </form>
                            </div>


                        </div>

                        <div class="card">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Account Data</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="alizeethomas" disabled=""
                                                placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" value="alizee.info@yourdomain.com"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <h6>Change Password</h6>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </div>

                        <div class="card">
                            <div class="body">
                                <h6>General Information</h6>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Phone Number">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>--Select Language</option>

                                                <option value="uk" lang="uk">Українська</option>
                                                <option value="vi" lang="vi">Tiếng Việt</option>
                                                <option value="zh_CN" lang="zh">简体中文</option>
                                                <option value="zh_TW" lang="zh">繁體中文</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option>--TimeZone--</option>
                                                <optgroup label="Africa">

                                                    <option value="Africa/Tripoli">Tripoli</option>
                                                    <option value="Africa/Tunis">Tunis</option>
                                                    <option value="Africa/Windhoek">Windhoek</option>
                                                </optgroup>
                                                <optgroup label="America">

                                                    <option value="America/Yakutat">Yakutat</option>
                                                    <option value="America/Yellowknife">Yellowknife</option>
                                                </optgroup>
                                                <optgroup label="Antarctica">
                                                    <option value="Antarctica/Casey">Casey</option>
                                                    <option value="Antarctica/Davis">Davis</option>
                                                    <option value="Antarctica/DumontDUrville">DumontDUrville</option>
                                                    <option value="Antarctica/Macquarie">Macquarie</option>
                                                    <option value="Antarctica/Mawson">Mawson</option>
                                                    <option value="Antarctica/McMurdo">McMurdo</option>
                                                    <option value="Antarctica/Palmer">Palmer</option>
                                                    <option value="Antarctica/Rothera">Rothera</option>
                                                    <option value="Antarctica/Syowa">Syowa</option>
                                                    <option value="Antarctica/Troll">Troll</option>
                                                    <option value="Antarctica/Vostok">Vostok</option>
                                                </optgroup>
                                                <optgroup label="Arctic">
                                                    <option value="Arctic/Longyearbyen">Longyearbyen</option>
                                                </optgroup>
                                                <optgroup label="Asia">
                                                    <option value="Asia/Aden">Aden</option>

                                                    <option value="Asia/Ust-Nera">Ust-Nera</option>
                                                    <option value="Asia/Vientiane">Vientiane</option>
                                                    <option value="Asia/Vladivostok">Vladivostok</option>
                                                    <option value="Asia/Yakutsk">Yakutsk</option>
                                                    <option value="Asia/Yekaterinburg">Yekaterinburg</option>
                                                    <option value="Asia/Yerevan">Yerevan</option>
                                                </optgroup>
                                                <optgroup label="Atlantic">
                                                    <option value="Atlantic/Azores">Azores</option>
                                                    <option value="Atlantic/Bermuda">Bermuda</option>
                                                    <option value="Atlantic/Canary">Canary</option>
                                                    <option value="Atlantic/Cape_Verde">Cape Verde</option>
                                                    <option value="Atlantic/Faroe">Faroe</option>
                                                    <option value="Atlantic/Madeira">Madeira</option>
                                                    <option value="Atlantic/Reykjavik">Reykjavik</option>
                                                    <option value="Atlantic/South_Georgia">South Georgia</option>
                                                    <option value="Atlantic/Stanley">Stanley</option>
                                                    <option value="Atlantic/St_Helena">St Helena</option>
                                                </optgroup>
                                                <optgroup label="Australia">
                                                    <option value="Australia/Adelaide">Adelaide</option>
                                                    <option value="Australia/Brisbane">Brisbane</option>
                                                    <option value="Australia/Broken_Hill">Broken Hill</option>
                                                    <option value="Australia/Currie">Currie</option>
                                                    <option value="Australia/Darwin">Darwin</option>
                                                    <option value="Australia/Eucla">Eucla</option>
                                                    <option value="Australia/Hobart">Hobart</option>
                                                    <option value="Australia/Lindeman">Lindeman</option>
                                                    <option value="Australia/Lord_Howe">Lord Howe</option>
                                                    <option value="Australia/Melbourne">Melbourne</option>
                                                    <option value="Australia/Perth">Perth</option>
                                                    <option value="Australia/Sydney">Sydney</option>
                                                </optgroup>
                                                <optgroup label="Europe">

                                                    <option value="Europe/Zurich">Zurich</option>
                                                </optgroup>
                                                <optgroup label="Indian">
                                                    <option value="Indian/Antananarivo">Antananarivo</option>
                                                    <option value="Indian/Chagos">Chagos</option>
                                                    <option value="Indian/Christmas">Christmas</option>
                                                    <option value="Indian/Cocos">Cocos</option>
                                                    <option value="Indian/Comoro">Comoro</option>
                                                    <option value="Indian/Kerguelen">Kerguelen</option>
                                                    <option value="Indian/Mahe">Mahe</option>
                                                    <option value="Indian/Maldives">Maldives</option>
                                                    <option value="Indian/Mauritius">Mauritius</option>
                                                    <option value="Indian/Mayotte">Mayotte</option>
                                                    <option value="Indian/Reunion">Reunion</option>
                                                </optgroup>
                                                <optgroup label="Pacific">
                                                    <option value="Pacific/Apia">Apia</option>

                                                    <option value="Pacific/Tarawa">Tarawa</option>
                                                    <option value="Pacific/Tongatapu">Tongatapu</option>
                                                    <option value="Pacific/Wake">Wake</option>
                                                    <option value="Pacific/Wallis">Wallis</option>
                                                </optgroup>
                                                <optgroup label="UTC">
                                                    <option value="UTC">UTC</option>
                                                </optgroup>
                                                <optgroup label="Manual Offsets">
                                                    <option value="UTC-12">UTC-12</option>

                                                    <option value="UTC+13.75">UTC+13:45</option>
                                                    <option value="UTC+14">UTC+14</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date Format</label>
                                            <div class="fancy-radio">
                                                <label><input name="dateFormat" value="" type="radio"><span><i></i>May 18,
                                                        2018</span></label>&nbsp;&nbsp;
                                                <label><input name="dateFormat" value="" type="radio"><span><i></i>2018,
                                                        May, 18</span></label>&nbsp;&nbsp;
                                                <label><input name="dateFormat" value="" type="radio"
                                                        checked=""><span><i></i>2018-03-10</span></label>&nbsp;&nbsp;
                                                <label><input name="dateFormat" value=""
                                                        type="radio"><span><i></i>02/09/2018</span></label>&nbsp;&nbsp;
                                                <label><input name="dateFormat" value=""
                                                        type="radio"><span><i></i>10/05/2018</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <h6>Email from Lucid</h6>
                                        <p>I'd like to receive the following emails:</p>
                                        <ul class="list-unstyled list-email-received">
                                            <li>
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" checked=""><span>Weekly account
                                                        summary</span></label>
                                            </li>
                                            <li>
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox"><span>Campaign reports</span></label>
                                            </li>
                                            <li>
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" checked=""><span>Promotional news such as offers
                                                        or discounts</span></label>
                                            </li>
                                            <li>
                                                <label class="fancy-checkbox">
                                                    <input type="checkbox" checked=""><span>Tips for campaign setup, growth
                                                        and client success stories</span></label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary">Update</button> &nbsp;&nbsp;
                                <button class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
