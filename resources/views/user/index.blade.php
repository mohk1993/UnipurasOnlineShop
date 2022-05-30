@extends('user.user_master')
@section('content')

@section('title')
Metal Sheet Shop-home
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('user.body.side_navigation')
                <!-- /.side-menu -->
              
                <!-- <div class="home-banner"> <img src="{{asset('user-tmp/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div> -->
            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO - Slider ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                        <div class="item" style="background-image: url('{{ asset($slider->slider_image) }}');">
                            <div class="container-fluid">
                                <div class="caption bg-color vertical-center text-left">
                                    <div class="slider-header fadeInDown-1">@if(session()->get('language') == 'lithuanian') {{$slider->slider_name_lith}} @else {{$slider->slider_name_en}} @endif</div>
                                    <div class="excerpt fadeInDown-2 hidden-xs"> <span> @if(session()->get('language') == 'lithuanian') {{$slider->slider_Discription}} @else {{$slider->slider_Discription}} @endif</span> </div>
                                    <div class="button-holder fadeInDown-3"> <a href="{{route('request.new.product.view')}}" class="btn-lg btn btn-uppercase btn-primary shop-now-button">@if(session()->get('language') == 'lithuanian') Specialus užsakymas @else   Special Order @endif</a> </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                        @endforeach
                        <!-- /.item -->

                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">@if(session()->get('language') == 'lithuanian') Produktai @else Products @endif </h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">@if(session()->get('language') == 'lithuanian') Visi @else All @endif</a></li>
                            @foreach($categories as $category)
                            <li><a data-transition-type="backSlide" href="#category{{$category->id}}" data-toggle="tab">@if(session()->get('language') == 'lithuanian') {{ $category->category_name_lith}} @else {{ $category->category_name_en}} @endif</a></li>
                            @endforeach
                            <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
                            <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->

                                                    <!-- <div class="tag new"><span>new</span></div> -->
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'lithuanian') {{ $product->product_name_lith}} @else {{ $product->product_name_en}} @endif</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description">@if(session()->get('language') == 'lithuanian') {{ $product->product_short_dic_lith}} @else {{ $product->product_short_dic_en}} @endif</div>
                                                    <div class="product-price">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif </div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id}}" onclick="productModalCartView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'lithuanian') Į krepšelį @else Add to cart @endif </button>
                                                            </li>
                                                            <button class="btn btn-primary icon" type="button" title="WishList" id="{{ $product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @endforeach
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                    @php
                                    $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    @forelse($catwiseProduct as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                                                    <!-- /.image -->

                                                    <!-- <div class="tag new"><span>new</span></div> -->
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'lithuanian') {{ $product->product_name_lith}} @else {{ $product->product_name_en}} @endif</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description">@if(session()->get('language') == 'lithuanian') {{ $product->product_short_dic_lith}} @else {{ $product->product_short_dic_en}} @endif</div>
                                                    <div class="product-price">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif</div>
                                                    <!-- /.product-price -->

                                                </div>
                                                <!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                    <ul class="list-unstyled">
                                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id}}" onclick="productModalCartView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                                                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'lithuanian') Į krepšelį @else Add to cart @endif </button>
                                                            </li>
                                                            <button class="btn btn-primary icon" type="button" title="WishList" id="{{ $product->id}}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>
                                                            <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /.action -->
                                                </div>
                                                <!-- /.cart -->
                                            </div>
                                            <!-- /.product -->

                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.item -->
                                    @empty
                                    <h5 class="text-danger">@if(session()->get('language') == 'lithuanian') Nėra produktų, kuriuos būtų galima įsigyti dabar @else No Products Avilable Now @endif</h5>
                                    @endforelse
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('user.body.brands')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
@endsection