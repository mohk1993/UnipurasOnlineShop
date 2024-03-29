@extends('user.user_master')
@section('content')

@section('title')
Category Wise Products
@endsection

<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
      <div class='col-md-3 sidebar'>
        <!-- ================================== TOP NAVIGATION ================================== -->
        @include('user.body.side_navigation')
        <!-- /.side-menu -->
        <!-- ================================== TOP NAVIGATION : END ================================== -->
        <div class="sidebar-module-container">
          <div class="sidebar-filter">
            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
            <div class="sidebar-widget wow fadeInUp">
              <h3 class="section-title">@if(session()->get('language') == 'lithuanian') apsipirkti pagal @else shop by @endif</h3>
              <div class="widget-header">
                <h4 class="widget-title">@if(session()->get('language') == 'lithuanian') Kategorija @else Category @endif</h4>
              </div>
              <div class="sidebar-widget-body">
                <div class="accordion">
                  @foreach($categories as $category)
                  <div class="accordion-group">
                    <div class="accordion-heading"> <a href="#collapse{{$category->id}}" data-toggle="collapse" class="accordion-toggle collapsed">@if(session()->get('language') == 'lithuanian') {{ $category->category_name_lith}} @else {{ $category->category_name_en}} @endif</a> </div>
                    <!-- /.accordion-heading -->
                    <div class="accordion-body collapse" id="collapse{{$category->id}}" style="height: 0px;">
                      <div class="accordion-inner">
                        @php
                        $sub_categories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                        @endphp
                        <ul>
                          @foreach($sub_categories as $sub_category)
                          <li><a href="{{ url('subcategory/product/'.$sub_category->id.'/'.$sub_category->subcategory_slug_en)}}">@if(session()->get('language') == 'lithuanian') {{$sub_category->subcategory_name_lith}} @else {{$sub_category->subcategory_name_en}} @endif</a></li>
                          @endforeach
                        </ul>
                      </div>
                      <!-- /.accordion-inner -->
                    </div>
                    <!-- /.accordion-body -->
                  </div>
                  <!-- /.accordion-group -->
                  @endforeach
                </div>
                <!-- /.accordion -->
              </div>
              <!-- /.sidebar-widget-body -->
            </div>
            <!-- /.sidebar-widget -->
            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->


          </div>
          <!-- /.sidebar-filter -->
        </div>
        <!-- /.sidebar-module-container -->
      </div>
      <!-- /.sidebar -->
      <div class='col-md-9'>
        <!-- ========================================== SECTION – HERO ========================================= -->
        @php
        $sliders = App\Models\Slider::where('slider_status',1)->orderBy('id','DESC')->limit(1)->get();
        @endphp
        @forelse($sliders as $slider)
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <div class="image"> <img src="{{asset($slider->slider_image)}}" alt="" class="img-responsive">
            </div>

            <div class="container-fluid">
              <div class="caption vertical-top text-left">
                <div class="big-text"> @if(session()->get('language') == 'lithuanian') {{ $slider->slider_name_en}} @else {{ $slider->slider_name_en}} @endif </div>
                <div class="excerpt-normal hidden-sm hidden-md">@if(session()->get('language') == 'lithuanian') {{ $slider->slider_name_en}} @else {{ $slider->slider_name_en}} @endif </div>
              </div>
              <!-- /.caption -->
            </div>
            <!-- /.container-fluid -->
          </div>
        </div>
        @empty
        <h5 class="text-danger">@if(session()->get('language') == 'lithuanian') Dabar nėra nuotraukų @else No Pics Avilable Now @endif </h5>
        @endforelse


        <div class="clearfix filters-container m-t-10">
          <div class="row">
            <div class="col col-sm-6 col-md-2">
              <div class="filter-tabs">
                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>@if(session()->get('language') == 'lithuanian') Tinklelis @else Grid @endif</a> </li>
                  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>@if(session()->get('language') == 'lithuanian') Sąrašas @else List @endif</a></li>
                </ul>
              </div>
            </div>
            <!-- <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">position</a></li>
                        <li role="presentation"><a href="#">Price:Lowest first</a></li>
                        <li role="presentation"><a href="#">Price:HIghest first</a></li>
                        <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Show</span>                 <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                        <li role="presentation"><a href="#">1</a></li>
                        <li role="presentation"><a href="#">2</a></li>
                        <li role="presentation"><a href="#">3</a></li>
                        <li role="presentation"><a href="#">4</a></li>
                        <li role="presentation"><a href="#">5</a></li>
                        <li role="presentation"><a href="#">6</a></li>
                        <li role="presentation"><a href="#">7</a></li>
                        <li role="presentation"><a href="#">8</a></li>
                        <li role="presentation"><a href="#">9</a></li>
                        <li role="presentation"><a href="#">10</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

          </div>
          <!-- /.row -->
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <!-- /.tab-pane #grid-container -->
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">
                  @foreach($products as $product)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}"><img src="{{asset($product->product_thambnail)}}" alt=""></a> </div>
                          <!-- /.image -->
                        </div>
                        <!-- /.product-image -->

                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'lithuanian') {{ $product->product_name_lith}} @else {{ $product->product_name_en}} @endif</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description">@if(session()->get('language') == 'lithuanian') {{ $product->product_short_dic_lith}} @else {{ $product->product_short_dic_en}} @endif</div>
                          <div class="product-price"> <span class="price">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif </span> <span class="price-before-discount">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif</span> </div>
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
                  @endforeach
                  <!-- /.item -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.category-product -->

            </div>
            <!-- /.tab-pane #grid-container -->

            <!-- /.tab-pane #list-container -->
            <div class="tab-pane " id="list-container">
              <div class="category-product">
                @foreach($products as $product)
                <div class="category-product-inner wow fadeInUp">
                  <div class="products">
                    <div class="product-list product">
                      <div class="row product-list-row">
                        <div class="col col-sm-4 col-lg-4">
                          <div class="product-image">
                            <div class="image"> <img src="{{asset($product->product_thambnail)}}" alt=""> </div>
                          </div>
                          <!-- /.product-image -->
                        </div>
                        <!-- /.col -->
                        <div class="col col-sm-8 col-lg-8">
                          <div class="product-info">
                            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en) }}">@if(session()->get('language') == 'lithuanian') {{ $product->product_name_lith}} @else {{ $product->product_name_en}} @endif</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> @if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif</span> <span class="price-before-discount">@if(session()->get('language') == 'lithuanian') {{ $product->product_price}} @else {{ $product->product_price}} @endif</span> </div>
                            <!-- /.product-price -->
                            <div class="description m-t-10">@if(session()->get('language') == 'lithuanian') {{ $product->product_short_dic_lith}} @else {{ $product->product_short_dic_en}} @endif</div>
                            <div class="description m-t-10">@if(session()->get('language') == 'lithuanian') {{ $product->product_long_dic_lith}} @else {{ $product->product_long_dic_en}} @endif</div>
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
                          <!-- /.product-info -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.product-list-row -->
                    </div>
                    <!-- /.product-list -->
                  </div>
                  <!-- /.products -->
                </div>
                @endforeach
                <!-- /.category-product-inner -->
              </div>
              <!-- /.category-product -->
            </div>
            <!-- /.tab-pane #list-container -->
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                <ul class="list-inline list-unstyled">
                  {{$products->links()}}
                </ul>
                <!-- /.list-inline -->
              </div>
              <!-- /.pagination-container -->
            </div>
            <!-- /.text-right -->

          </div>
          <!-- /.filters-container -->

        </div>
        <!-- /.search-result-container -->

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- ============================================== BRANDS CAROUSEL ============================================== -->
    @include('user.body.brands')
    <!-- /.logo-slider -->
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
  </div>
  <!-- /.container -->

</div>
<!-- /.body-content -->


@endsection