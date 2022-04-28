@php
$categories = App\Models\Category::orderBy('category_name_en','ASC')->get();
@endphp
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            @foreach($categories as $category)
            <li class="dropdown menu-item"> <a href="" class="dropdown-toggle" data-toggle="dropdown">@if(session()->get('language') == 'lithuanian') {{ $category->category_name_lith}} @else {{ $category->category_name_en}} @endif</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @php
                            $sub_categories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name_en','ASC')->get();
                            @endphp

                            @foreach($sub_categories as $sub_category)
                            <div class="col-sm-12 col-md-3">
                                <a href="{{ url('subcategory/product/'.$sub_category->id.'/'.$sub_category->subcategory_slug_en)}}">
                                    <h2 class="title">@if(session()->get('language') == 'lithuanian') {{$sub_category->subcategory_name_lith}} @else {{$sub_category->subcategory_name_en}} @endif</h2>
                                </a>
                                @php
                                $sub_sub_categories = App\Models\SubSubCategory::where('subcategory_id',$sub_category->id)->orderBy('sub_subcategory_name_en','ASC')->get();
                                @endphp

                                @foreach($sub_sub_categories as $sub_subcategory)
                                <ul class="links list-unstyled">
                                    <li><a href="{{ url('sub_subcategory/product/'.$sub_subcategory->id.'/'.$sub_subcategory->sub_subcategory_slug_en)}}">@if(session()->get('language') == 'lithuanian') {{$sub_subcategory->sub_subcategory_name_lith}} @else {{$sub_subcategory->sub_subcategory_name_en}} @endif</a></li>
                                </ul>
                                @endforeach
                            </div>
                            @endforeach
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>