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
                    <h3>2,318 <i class="fa fa-dollar float-right"></i></h3>
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
                    <h3>68% <i class=" icon-heart float-right"></i></h3>
                    <span>Customer Satisfaction</span>
                </div>
                <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                    <div class="progress-bar" data-transitiongoal="68"></div>
                </div>
            </div>
        </div>
    </div>



    <div class="row clearfix">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <h2>Recent Transactions</h2>
                    <ul class="header-dropdown">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false"></a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another Action</a></li>
                                <li><a href="javascript:void(0);">Something else</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width:60px;">#</th>
                                    <th>Name</th>
                                    <th>Item</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Amount</th>
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
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Camara</td>
                                    <td>NOKIA-8</td>
                                    <td>2595 Pearlman Avenue Sudbury, MA 01776 </td>
                                    <td>3</td>
                                    <td><span class="badge badge-default">Delivered</span></td>
                                    <td>$ 542</td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Maryam</td>
                                    <td>NOKIA-456</td>
                                    <td>Porterfield 508 Virginia Street Chicago, IL 60653</td>
                                    <td>4</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                    <td>$ 231</td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Micheal</td>
                                    <td>SAMSANG PRO</td>
                                    <td>508 Virginia Street Chicago, IL 60653</td>
                                    <td>1</td>
                                    <td><span class="badge badge-success">DONE</span></td>
                                    <td>$ 601</td>
                                </tr>
                                <tr>
                                    <td><img src="http://via.placeholder.com/60x50" alt="Product img"></td>
                                    <td>Frank</td>
                                    <td>NOKIA-456</td>
                                    <td>1516 Holt Street West Palm Beach, FL 33401</td>
                                    <td>13</td>
                                    <td><span class="badge badge-warning">PENDING</span></td>
                                    <td>$ 128</td>
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
                    <h2>New Orders</h2>
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
