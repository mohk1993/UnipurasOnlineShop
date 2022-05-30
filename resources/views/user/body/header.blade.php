<header class="header-style-1">
    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i> @if(session()->get('language') == 'lithuanian') Mano paskyra @else My Account @endif </a></li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>@if(session()->get('language') == 'lithuanian') Pageidavimų sąrašas @else My Wishlist @endif </a></li>
                        <li><a href="{{ route('cart') }}"><i class="icon fa fa-shopping-cart"></i>@if(session()->get('language') == 'lithuanian') Mano krepšelis @else My Cart @endif </a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>@if(session()->get('language') == 'lithuanian') Atsiskaitymas @else Checkout @endif </a></li>
                        <li>
                            @auth
                            <a href="{{ route('user.profile') }}"><i class="icon fa fa-user"></i>@if(session()->get('language') == 'lithuanian') Profilis @else Profile @endif </a>
                            @else
                            <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>@if(session()->get('language') == 'lithuanian') Prisijungimas @else Login @endif </a>
                            @endauth
                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">
                                    @if(session()->get('language') == 'lithuanian') Kalba @else Language @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'lithuanian')
                                <li><a href="{{ route('english.language')}}">English</a></li>
                                @else
                                <li><a href="{{ route('lithuanian.language')}}">Lietuvių kalba</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="{{url('/')}}"> Unipuras </a> </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="POST" action="{{ route('search.product')}}">
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                 
                                </ul>
                                <input type="search" class="search-field" placeholder="Search here..." name="search" />
                                <button type="submit" class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count" id="cartQty"></span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> 
                                <span class="total-price"> <span class="sign">$</span>
                                <span class="value" id="cartSubTotal"></span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!-- Ajax Cart -->
                                <div id="miniCart">

                                </div>
                                <!-- Ajax Cart -->
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span class='price' id="cartSubTotal"></span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
                <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="{{url('/')}}"> @if(session()->get('language') == 'lithuanian') Pagrindinis @else Home @endif </a>
                                </li>
                                @php
                                $categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
                                @endphp

                                @foreach($categories as $category)
                                <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'lithuanian') {{ $category->category_name_lith}} @else {{ $category->category_name_en}} @endif</a>
                                    <ul class="dropdown-menu container">
                                        <li>
                                            <div class="yamm-content ">
                                                <div class="row">
                                                    @php
                                                    $sub_categories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                                                    @endphp

                                                    @foreach($sub_categories as $sub_category)
                                                    <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                        <a href="{{ url('subcategory/product/'.$sub_category->id.'/'.$sub_category->subcategory_slug_en)}}">
                                                            <h2 class="title">@if(session()->get('language') == 'lithuanian') {{$sub_category->subcategory_name_lith}} @else {{$sub_category->subcategory_name_en}} @endif</h2>
                                                        </a>
                                                        @php
                                                        $sub_sub_categories = App\Models\SubSubCategory::where('subcategory_id',$sub_category->id)->orderBy('sub_subcategory_name_en','ASC')->get();
                                                        @endphp

                                                        @foreach($sub_sub_categories as $sub_subcategory)
                                                        <ul class="links">
                                                            <li><a href="{{ url('sub_subcategory/product/'.$sub_subcategory->id.'/'.$sub_subcategory->sub_subcategory_slug_en)}}">@if(session()->get('language') == 'lithuanian') {{$sub_subcategory->sub_subcategory_name_lith}} @else {{$sub_subcategory->sub_subcategory_name_en}} @endif </a></li>
                                                        </ul>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                    <!-- /.col -->
                                                    <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                        <img class="img-responsive" src="assets/images/banners/top-menu-banner.jpg" alt="">
                                                    </div>
                                                    <!-- /.yamm-content -->
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>