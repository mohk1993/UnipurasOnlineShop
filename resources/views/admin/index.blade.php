@extends('admin.admin_master')
@section('admin')

@php
    $users = App\Models\User::get();
    $day_date = date('d-m-y');
    $month_date = date('F');
    $year_date = date('Y');
    $today_orders = App\Models\Order::where('order_date',$day_date)->sum('amount');
    $month_orders = App\Models\Order::where('order_month',$month_date)->sum('amount');
    $year_orders = App\Models\Order::where('order_year',$year_date)->sum('amount');
    $total_orders = App\Models\Order::get()->sum('amount');
    $orders = App\Models\Order::get();
    $pending_orders = App\Models\Order::where('status','pending')->get();
    $partners = App\Models\Partner::get();
    $categories = App\Models\Category::get();
    $sliders = App\Models\Slider::get();
    $sliders = App\Models\Slider::get();
    $available_products = App\Models\Product::where('product_qty','>',0)->get();
    $unavailable_products = App\Models\Product::where('product_qty','=',0)->get();
@endphp
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Users</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($users)}} </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($orders)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 fa fa-pause"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Pending Orders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($pending_orders)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-cash"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Total Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">€ {{ $total_orders}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-cash"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Today's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">€ {{ $today_orders}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-cash"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">This Month's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">€ {{ $month_orders}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-warning-light rounded w-60 h-60">
                            <i class="text-info mr-0 font-size-24 mdi mdi-cash"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">This Year's Sales</p>
                            <h3 class="text-white mb-0 font-weight-500">€ {{ $year_orders}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-info-light rounded w-60 h-60">
                            <i class="text-success mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Available Products</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($available_products)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-store">Unavailable Products</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($unavailable_products)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-store">Partners</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($partners)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-store">Categories</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($categories)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-danger-light rounded w-60 h-60">
                            <i class="text-danger mr-0 font-size-24 mdi mdi-store"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-store">Sliders</p>
                            <h3 class="text-white mb-0 font-weight-500">{{ count($sliders)}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection