@php
    $prefix = Request::Route()->getPrefix();
    $route = Route::current()->getName();
@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <h3><b>Unipuras</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ ($route == 'dashboard')? 'active':''}}">
                <a href="{{ url('admin/dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ ($prefix == '/partner')? 'active':''}}" >
                <a href="#">
                    <i data-feather="users"></i>
                    <span>Partners</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.partners')? 'active':''}}"><a href="{{ route('view.partners') }}"><i class="ti-more"></i>Partners</a></li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/caegory')? 'active':''}}">
                <a href="#">
                    <i data-feather="layers"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.category')? 'active':''}}"><a href="{{ route('view.category') }}"><i class="ti-more"></i>Categories</a></li>
                    <li class="{{ ($route == 'view.subcategory')? 'active':''}}"><a href="{{ route('view.subcategory') }}"><i class="ti-more"></i>SubCaegory</a></li>
                    <li class="{{ ($route == 'view.subsubcategory')? 'active':''}}"><a href="{{ route('view.subsubcategory') }}"><i class="ti-more"></i>SubSubCaegory</a></li>
                </ul>
            </li>

            <li class="treeview  {{ ($prefix == '/products')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.products')? 'active':''}}"><a href="{{ route('view.products') }}"><i class="ti-more"></i>Products</a></li>
                </ul>
            </li>
            <li class="treeview  {{ ($prefix == '/sliders')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Sliders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.sliders')? 'active':''}}"><a href="{{ route('view.sliders') }}"><i class="ti-more"></i>Sliders</a></li>
                </ul>
            </li>
            <li class="treeview  {{ ($prefix == '/shipment')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.divisions')? 'active':''}}"><a href="{{ route('view.divisions') }}"><i class="ti-more"></i>Manage Divisions</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.districts')? 'active':''}}"><a href="{{ route('view.districts') }}"><i class="ti-more"></i>Manage Districts</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.states')? 'active':''}}"><a href="{{ route('view.states') }}"><i class="ti-more"></i>Manage States</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview  {{ ($prefix == '/orders')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.pending.orders')? 'active':''}}"><a href="{{ route('view.pending.orders') }}"><i class="ti-more"></i>Pending Orders</a></li>
                    <li class="{{ ($route == 'view.confirmed.orders')? 'active':''}}"><a href="{{ route('view.confirmed.orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>
                    <li class="{{ ($route == 'view.processing.orders')? 'active':''}}"><a href="{{ route('view.processing.orders') }}"><i class="ti-more"></i>Processing Orders</a></li>
                    <li class="{{ ($route == 'view.shipped.orders')? 'active':''}}"><a href="{{ route('view.shipped.orders') }}"><i class="ti-more"></i>Shiped Orders</a></li>
                    <li class="{{ ($route == 'view.delivered.orders')? 'active':''}}"><a href="{{ route('view.delivered.orders') }}"><i class="ti-more"></i>Delivered Orders</a></li>
                    <li class="{{ ($route == 'view.canceled.orders')? 'active':''}}"><a href="{{ route('view.canceled.orders') }}"><i class="ti-more"></i>Canceled Orders</a></li>
                </ul>
            </li>

            <li class="treeview  {{ ($prefix == '/reports')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.reports')? 'active':''}}"><a href="{{ route('view.reports') }}"><i class="ti-more"></i>Search Orders</a></li>
                </ul>
            </li>
            <li class="treeview  {{ ($prefix == '/users')? 'active':''}}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'view.users')? 'active':''}}"><a href="{{ route('view.users') }}"><i class="ti-more"></i>Users</a></li>
                </ul>
            </li>
        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>