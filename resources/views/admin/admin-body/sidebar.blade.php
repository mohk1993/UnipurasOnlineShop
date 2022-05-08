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

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
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