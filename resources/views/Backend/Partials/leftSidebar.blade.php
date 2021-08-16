<div id="left-sidebar" class="sidebar">
    <div class="sidebar-scroll">
        <div class="user-account">
            <img src="{{ asset('backend/assets/images/user.png') }}" class="rounded-circle user-photo"
                alt="User Profile Picture">
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Alizee
                        Thomas</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li><a href="page-profile2.html"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="icon-power"></i>Logout</a></li>
                </ul>
            </div>
            <hr>
            <ul class="row list-unstyled">
                <li class="col-4">
                    <small>Sales</small>
                    <h6>456</h6>
                </li>
                <li class="col-4">
                    <small>Order</small>
                    <h6>1350</h6>
                </li>
                <li class="col-4">
                    <small>Revenue</small>
                    <h6>$2.13B</h6>
                </li>
            </ul>
        </div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a>
            </li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a>
            </li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i
                        class="icon-question"></i></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content p-l-0 p-r-0">
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu">
                        <li class="active">
                            <a href="{{ route('dashboard') }}" class="has-arrow"><i class="icon-home"></i>
                                <span>Dashboard</span></a>
                           
                        </li>
                        <li>
                            <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i>
                                <span>Widgets</span></a>
                            <ul>
                                <li><a href="{{ route('banner.index') }}">Show Banner</a></li>
                                <li><a href="{{ route('banner.create') }}">Add Banner</a></li>
                               
                            </ul>
                        </li>
                        <li>
                            <a href="#App" class="has-arrow"><i class="icon-grid"></i> <span>Depertment</span></a>
                            <ul>
                                <li><a href="">Category Management</a></li>
                                <li><a href="">Product Management</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#FileManager" class="has-arrow"><i class="icon-folder"></i> <span>Vendor Management
                                    </span></a>
                            <ul>
                                <li><a href="file-dashboard.html">Dashboard</a></li>
                                <li><a href="file-documents.html">Documents</a></li>
                                <li><a href="file-media.html">Media</a></li>
                                <li><a href="file-images.html">Images</a></li>
                            </ul>
                        </li> 
                        <li>
                            <a href="#FileManager" class="has-arrow"><i class="icon-user-follow"></i> <span>Customer Management
                                    </span></a>
                            <ul>
                                <li><a href="file-dashboard.html">Dashboard</a></li>
                                <li><a href="file-documents.html">Documents</a></li>
                                <li><a href="file-media.html">Media</a></li>
                                <li><a href="file-images.html">Images</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#FileManager" class=" has-arrow"><i class="icon-basket-loaded"></i> <span>Order Management
                                    </span></a>
                            <ul>
                                <li><a href="file-dashboard.html">Dashboard</a></li>
                                <li><a href="file-documents.html">Documents</a></li>
                                <li><a href="file-media.html">Media</a></li>
                                <li><a href="file-images.html">Images</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Blog" class="has-arrow"><i class="icon-globe"></i> <span>Review Management</span></a>
                            <ul>
                                <li><a href="blog-dashboard.html">Dashboard</a></li>
                                <li><a href="blog-post.html">New Post</a></li>
                                <li><a href="blog-list.html">Blog List</a></li>
                                <li><a href="blog-details.html">Blog Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#charts" class="has-arrow"><i class="icon-bar-chart"></i>
                                <span>Report Management</span></a>
                            <ul>
                                <li><a href="chart-morris.html"> <i class="fa fa-dollar"></i> Sell Report</a> </li>
                                <li><a href="chart-flot.html">Order Report</a> </li>
                                <li><a href="chart-chartjs.html">Vendor Products</a> </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#uiElements" class="has-arrow"><i class="icon-diamond"></i> <span>UI
                                    Elements</span></a>
                            <ul>
                                <li><a href="ui-typography.html">Typography</a></li>
                                <li><a href="ui-tabs.html">Tabs</a></li>
                                <li><a href="ui-buttons.html">Buttons</a></li>
                                <li><a href="ui-bootstrap.html">Bootstrap UI</a></li>
                                <li><a href="ui-icons.html">Icons</a></li>
                                <li><a href="ui-notifications.html">Notifications</a></li>
                                <li><a href="ui-colors.html">Colors</a></li>
                                <li><a href="ui-dialogs.html">Dialogs</a></li>
                                <li><a href="ui-list-group.html">List Group</a></li>
                                <li><a href="ui-media-object.html">Media Object</a></li>
                                <li><a href="ui-modals.html">Modals</a></li>
                                <li><a href="ui-nestable.html">Nestable</a></li>
                                <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                <li><a href="ui-range-sliders.html">Range Sliders</a></li>
                                <li><a href="ui-treeview.html">Treeview</a></li>
                            </ul>
                        </li>
                       
                        <li>
                            <a href="#Authentication" class="has-arrow"><i class="icon-lock"></i>
                                <span>Authentication</span></a>
                            <ul>
                                <li><a href="page-login.html">Login</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-lockscreen.html">Lockscreen</a></li>
                                <li><a href="page-forgot-password.html">Forgot Password</a></li>
                                <li><a href="page-404.html">Page 404</a></li>
                                <li><a href="page-403.html">Page 403</a></li>
                                <li><a href="page-500.html">Page 500</a></li>
                                <li><a href="page-503.html">Page 503</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Pages" class="has-arrow"><i class="icon-docs"></i> <span>Pages</span></a>
                            <ul>
                                <li><a href="page-blank.html">Blank Page</a> </li>
                                <li><a href="page-profile.html">Profile <span
                                            class="badge badge-default float-right">v1</span></a></li>
                                <li><a href="page-profile2.html">Profile <span
                                            class="badge badge-warning float-right">v2</span></a></li>
                                <li><a href="page-gallery.html">Image Gallery <span
                                            class="badge badge-default float-right">v1</span></a> </li>
                                <li><a href="page-gallery2.html">Image Gallery <span
                                            class="badge badge-warning float-right">v2</span></a> </li>
                                <li><a href="page-timeline.html">Timeline</a></li>
                                <li><a href="page-timeline-h.html">Horizontal Timeline</a></li>
                                <li><a href="page-pricing.html">Pricing</a></li>
                                <li><a href="page-invoices.html">Invoices</a></li>
                                <li><a href="page-invoices2.html">Invoices <span
                                            class="badge badge-warning float-right">v2</span></a></li>
                                <li><a href="page-search-results.html">Search Results</a></li>
                                <li><a href="page-helper-class.html">Helper Classes</a></li>
                                <li><a href="page-teams-board.html">Teams Board</a></li>
                                <li><a href="page-projects-list.html">Projects List</a></li>
                                <li><a href="page-maintenance.html">Maintenance</a></li>
                                <li><a href="page-testimonials.html">Testimonials</a></li>
                                <li><a href="page-faq.html">FAQ</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#forms" class="has-arrow"><i class="icon-pencil"></i>
                                <span>Forms</span></a>
                            <ul>
                                <li><a href="forms-validation.html">Form Validation</a></li>
                                <li><a href="forms-advanced.html">Advanced Elements</a></li>
                                <li><a href="forms-basic.html">Basic Elements</a></li>
                                <li><a href="forms-wizard.html">Form Wizard</a></li>

                                <li><a href="forms-dragdropupload.html">Drag &amp; Drop Upload</a></li>

                                <li><a href="forms-cropping.html">Image Cropping</a></li>
                                <li><a href="forms-summernote.html">Summernote</a></li>
                                <li><a href="forms-editors.html">CKEditor</a></li>
                                <li><a href="forms-markdown.html">Markdown</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#Tables" class="has-arrow"><i class="icon-tag"></i> <span>Tables</span></a>
                            <ul>
                                <li><a href="table-basic.html">Tables Example<span
                                            class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-normal.html">Normal Tables</a> </li>
                                <li><a href="table-jquery-datatable.html">Jquery Datatables</a> </li>
                                <li><a href="table-editable.html">Editable Tables</a> </li>
                                <li><a href="table-color.html">Tables Color</a> </li>
                                <li><a href="table-filter.html">Table Filter <span
                                            class="badge badge-info float-right">New</span></a> </li>
                                <li><a href="table-dragger.html">Table dragger <span
                                            class="badge badge-info float-right">New</span></a> </li>
                            </ul>
                        </li>
                       
                        <li>
                            <a href="#Maps" class="has-arrow"><i class="icon-map"></i> <span>Maps</span></a>
                            <ul>
                                <li><a href="map-google.html">Google Map</a></li>
                                <li><a href="map-yandex.html">Yandex Map</a></li>
                                <li><a href="map-jvectormap.html">jVector Map</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#menu-level-1" class="has-arrow"><i class="icon-tag"></i> <span>Menu Level
                                    1</span></a>
                            <ul>
                                <li>
                                    <a href="#menu-level-2" class="has-arrow">Menu Level 2</a>
                                    <ul>
                                        <li><a href="#">Link 1</a></li>
                                        <li><a href="#">Link 2</a></li>
                                        <li><a href="#">Link 3</a></li>
                                        <li><a href="#">Link 4</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="Chat">
                <form>
                    <div class="input-group m-b-20">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="right_chat list-unstyled">
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{ asset('backend/assets/images/xs/avatar4.jpg') }}"
                                    alt="">
                                <div class="media-body">
                                    <span class="name">Chris Fox</span>
                                    <span class="message">Designer, Blogger</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{ asset('backend/assets/images/xs/avatar5.jpg') }}"
                                    alt="">
                                <div class="media-body">
                                    <span class="name">Joge Lucky</span>
                                    <span class="message">Java Developer</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{ asset('backend/assets/images/xs/avatar2.jpg') }}"
                                    alt="">
                                <div class="media-body">
                                    <span class="name">Isabella</span>
                                    <span class="message">CEO, Thememakker</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="offline">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{ asset('/assets/images/xs/avatar1.jpg') }}" alt="">
                                <div class="media-body">
                                    <span class="name">Folisise Chosielie</span>
                                    <span class="message">Art director, Movie Cut</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="online">
                        <a href="javascript:void(0);">
                            <div class="media">
                                <img class="media-object " src="{{ asset('backend/assets/images/xs/avatar3.jpg') }}"
                                    alt="">
                                <div class="media-body">
                                    <span class="name">Alexander</span>
                                    <span class="message">Writter, Mag Editor</span>
                                    <span class="badge badge-outline status"></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="setting">
                <h6>Choose Skin</h6>
                <ul class="choose-skin list-unstyled">
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="cyan" class="active">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="blush">
                        <div class="blush"></div>
                        <span>Blush</span>
                    </li>
                </ul>
                <hr>
                <h6>General Settings</h6>
                <ul class="setting-list list-unstyled">
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Report Panel Usag</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Email Redirect</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox" checked>
                            <span>Notifications</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Auto Updates</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Offline</span>
                        </label>
                    </li>
                    <li>
                        <label class="fancy-checkbox">
                            <input type="checkbox" name="checkbox">
                            <span>Location Permission</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane p-l-15 p-r-15" id="question">
                <form>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <ul class="list-unstyled question">
                    <li class="menu-heading">HOW-TO</li>
                    <li><a href="javascript:void(0);">How to Create Campaign</a></li>
                    <li><a href="javascript:void(0);">Boost Your Sales</a></li>
                    <li><a href="javascript:void(0);">Website Analytics</a></li>
                    <li class="menu-heading">ACCOUNT</li>
                    <li><a href="javascript:void(0);">Cearet New Account</a></li>
                    <li><a href="javascript:void(0);">Change Password?</a></li>
                    <li><a href="javascript:void(0);">Privacy &amp; Policy</a></li>
                    <li class="menu-heading">BILLING</li>
                    <li><a href="javascript:void(0);">Payment info</a></li>
                    <li><a href="javascript:void(0);">Auto-Renewal</a></li>
                    <li class="menu-button m-t-30">
                        <a href="javascript:void(0);" class="btn btn-primary"><i class="icon-question"></i> Need
                            Help?</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
