@extends('Backend.backEndMaster')

@section('main_content')

    <div class="row clearfix">
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ $total_products }} <i class="icon-basket-loaded float-right"></i></h3>
                    <span>Total Products</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal={{ $total_products }}></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ $total_categories }} <i class="icon-basket-loaded float-right"></i></h3>
                    <span>Total Categories</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal={{ $total_categories }}></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ app\models\Categorie::where(['status' => 'active'])->where('is_parent',1)->count() }} <i class=" fa fa-sitemap float-right"></i></h3>
                    <span>Active parent categories</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                    <div class="progress-bar" data-transitiongoal={{ $total_categories }}></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ $total_brands }} <i class="icon-user-follow float-right"></i></h3>
                    <span>Total Brands</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-purple m-b-0">
                    <div class="progress-bar" data-transitiongoal={{ $total_brands }}></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>2,318 <i class="fa fa-money float-right"></i></h3>
                    <span>Net Profit</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-yellow m-b-0">
                    <div class="progress-bar" data-transitiongoal="89"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ app\models\User::get()->count() }}<i class="icon-user-follow float-right"></i></h3>
                    <span>Total Customer</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                    <div class="progress-bar" data-transitiongoal= {{ app\models\User::get()->count() }}></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card overflowhidden">
                <div class="body">
                    <h3>{{ app\models\User::where(['status' =>'active'])->count() }}<i class="fa fa-user float-right"></i></h3>
                    <span>Active Customer</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                    <div class="progress-bar" data-transitiongoal= {{ app\models\User::where(['status' =>'active'])->count() }}></div>
                </div>
            </div>
        </div>
    </div>



    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2 class="badge badge-success">Recent Orders</h2>
                    <ul class="header-dropdown">
                       <a href="" class="btn btn-sm btn-success">View all</a>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:60px;">S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Payment Method</th>
                                    <th>Order Status</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Hossein</td>
                                    <td>IPONE-7</td>
                                    <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                    <td>3</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                    <td>$ 356</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    <h2 class="badge badge-success">New Orders</h2>
                </div>
                <div class="body">
                    <table class="table table-hover">
                        <thead class="thead-success">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Customers</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>IPONE-7</td>
                                <td>
                                    <ul class="list-unstyled team-info margin-0">
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar1.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar6.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                    </ul>
                                </td>
                                <td>$ 356</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>NOKIA-8</td>
                                <td>
                                    <ul class="list-unstyled team-info margin-0">
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar1.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar5.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar9.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                    </ul>
                                </td>
                                <td>$ 542</td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>IPONE-7</td>
                                <td>
                                    <ul class="list-unstyled team-info margin-0">
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar5.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                    </ul>
                                </td>
                                <td>$ 356</td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>NOKIA-8</td>
                                <td>
                                    <ul class="list-unstyled team-info margin-0">
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar3.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                        <li><img src="{{ asset('backend/assets/images/xs/avatar2.jpg') }}" title="Avatar"
                                                alt="Avatar"></li>
                                    </ul>
                                </td>
                                <td>$ 542</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
