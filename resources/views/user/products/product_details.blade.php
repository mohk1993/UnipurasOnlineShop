@extends('user.user_master')
@section('content')

@section('title')
{{$product->product_name_en}} product details
@endsection


<div class='row single-product'>
    <div class='col-md-3 sidebar'>
        <div class="sidebar-module-container">
            <div class="home-banner outer-top-n">
                <!-- <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> -->
            </div>



            <div class="sidebar-widget hot-deals wow fadeInUp outer-top-vs">
                <h3 class="section-title">@if(session()->get('language') == 'lithuanian')Išsami informacija @else Details @endif</h3>
                <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">

                </div>
            </div>

        </div>
    </div><!-- /.sidebar -->
    <div class='col-md-9'>
        <div class="detail-block">
            <div class="row  wow fadeInUp">

                <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                    <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="owl-single-product">
                            @foreach($multiImg as $image)
                            <div class="single-product-gallery-item" id="slide{{$image->id}}">
                                <a data-lightbox="image-1" data-title="Gallery" href="{{ asset($image->img_name) }}">
                                    <img class="img-responsive" alt="" src="{{ asset($image->img_name) }}" data-echo="{{ asset($image->img_name) }}" />
                                </a>
                            </div><!-- /.single-product-gallery-item -->
                            @endforeach
                        </div><!-- /.single-product-slider -->

                        <div class="single-product-gallery-thumbs gallery-thumbs">
                            <div id="owl-single-product-thumbnails">
                                @foreach($multiImg as $image)
                                <div class="item">
                                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide{{$image->id}}">
                                        <img class="img-responsive" width="85" alt="" src="{{ asset($image->img_name) }}" data-echo="{{ asset($image->img_name) }}" />
                                    </a>
                                </div>
                                @endforeach
                            </div><!-- /#owl-single-product-thumbnails -->
                        </div><!-- /.gallery-thumbs -->
                    </div><!-- /.single-product-gallery -->
                </div><!-- /.gallery-holder -->
                <div class='col-sm-6 col-md-7 product-info-block'>
                    <div class="product-info">
                        <h1 class="name" id="productName">@if(session()->get('language') == 'lithuanian') {{$product->product_name_lith}} @else {{$product->product_name_en}} @endif</h1>
                        <div class="rating-reviews m-t-20">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="rating rateit-small"></div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.rating-reviews -->
                        <div class="stock-container info-container m-t-10">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="stock-box">
                                        <span class="label">@if(session()->get('language') == 'lithuanian')Prieinamumas @else Availability @endif :</span>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <div class="stock-box">
                                        <span class="value">@if(session()->get('language') == 'lithuanian')Yra sandėlyje @else In Stock @endif</span>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.stock-container -->

                        <div class="description-container m-t-20">
                            @if(session()->get('language') == 'lithuanian') {{$product->product_short_dic_lith}} @else {{$product->product_short_dic_en}} @endif
                        </div><!-- /.description-container -->
                        <div class="description-container m-t-20" id="code"> @if(session()->get('language') == 'lithuanian') Kodas @else Code @endif:
                            @if(session()->get('language') == 'lithuanian') {{$product->product_code}} @else {{$product->product_code}} @endif
                        </div><!-- /.description-container -->

                        <div class="price-container info-container m-t-20">
                            <div class="row">


                                <div class="col-sm-6">
                                    <div class="price-box">
                                        <span class="price" id="productPrice">@if(session()->get('language') == 'lithuanian') {{$product->product_price}} @else {{$product->product_price}} @endif</span>
                                    </div>
                                </div>


                            </div><!-- /.row -->
                        </div><!-- /.price-container -->

                        <div class="quantity-container info-container">
                            <div class="row">

                                <div class="col-sm-2">
                                    <span class="label">@if(session()->get('language') == 'lithuanian')Kiekis @else Qty @endif :</span>
                                </div>

                                <div class="col-sm-2">
                                    <div class="cart-quantity">
                                        <div class="quant-input">
                                            <input type="number" value="1" id="qty" min="1" oninput="validity.valid||(value='');">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="product_id" value="{{ $product->id}}" min="1">
                                <div class="col-sm-7">
                                    <button type="submit" onclick="addToCart()" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i>@if(session()->get('language') == 'lithuanian')PRIDĖTI Į KREPŠELĮ @else ADD TO CART @endif </button>
                                </div>


                            </div><!-- /.row -->
                        </div><!-- /.quantity-container -->






                    </div><!-- /.product-info -->
                </div><!-- /.col-sm-7 -->
            </div><!-- /.row -->
        </div>

        <div class="product-tabs inner-bottom-xs  wow fadeInUp">
            <div class="row">
                <div class="col-sm-3">
                    <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                        <li class="active"><a data-toggle="tab" href="#description">@if(session()->get('language') == 'lithuanian')APRAŠYMAS @else DESCRIPTION @endif</a></li>
                        <li><a data-toggle="tab" href="#review">@if(session()->get('language') == 'lithuanian')APŽVALGA @else REVIEW @endif</a></li>
                        <li><a data-toggle="tab" href="#tags">@if(session()->get('language') == 'lithuanian')ŽYMOS @else TAGS @endif</a></li>
                    </ul><!-- /.nav-tabs #product-tabs -->
                </div>
                <div class="col-sm-9">

                    <div class="tab-content">

                        <div id="description" class="tab-pane in active">
                            <div class="product-tab">
                                <p class="text">@if(session()->get('language') == 'lithuanian') {{!!$product->product_long_dic_lith!!}} @else {{!!$product->product_long_dic_en!!}} @endif</p>
                            </div>
                        </div><!-- /.tab-pane -->

                        <div id="review" class="tab-pane">
                            <div class="product-tab">



                            </div><!-- /.product-tab -->
                        </div><!-- /.tab-pane -->


                    </div><!-- /.tab-content -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.product-tabs -->

        <!-- ============================================== Similar PRODUCTS ============================================== -->
        <section class="section featured-product wow fadeInUp">
            <h3 class="section-title">@if(session()->get('language') == 'lithuanian')Panašūs produktai @else Similar products @endif</h3>
            <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                @foreach($similarProducts as $product)
                <div class="item item-carousel">
                    <div class="products">

                        <div class="product">
                            <div class="product-image">
                                <div class="image">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{asset($product->product_thambnail)}}" alt=""></a>
                                </div><!-- /.image -->

                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"></a></h3>
                                <div class="rating rateit-small"></div>
                                <div class="description">@if(session()->get('language') == 'lithuanian') {{ $product->product_short_dic_lith}} @else {{ $product->product_short_dic_en}} @endif</div>

                                <div class="product-price">
                                    <span class="price">
                                        @if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif </span>
                                    <span class="price-before-discount">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif</span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
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
                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div><!-- /.product -->

                    </div><!-- /.products -->
                </div><!-- /.item -->
                @endforeach
            </div><!-- /.home-owl-carousel -->
        </section><!-- /.section -->
        <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

    </div><!-- /.col -->
    <div class="clearfix"></div>
</div><!-- /.row -->



@endsection