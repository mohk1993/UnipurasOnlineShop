@php
$partners = App\Models\Partner::latest()->get();
@endphp
<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
            @forelse($partners as $partner)
            <div class="item m-t-15"> <a href="#" class="image"> <img data-echo="{{asset($partner->partner_image)}}" src="{{asset($partner->partner_image)}}" style="width: 175px; height: 175px; border-radius: 30%;"> </a> </div>
            <!--/.item-->
            @empty
            <h5 class="text-danger"> No Partners Avilable Now</h5>
            @endforelse
        </div>
        <!-- /.owl-carousel #logo-slider -->
    </div>
    <!-- /.logo-slider-inner -->

</div>