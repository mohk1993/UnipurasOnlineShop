@extends('user.user_master')
@section('content')

@section('title')
Wishlist
@endsection

<div class="my-wishlist-page">
    <div class="row">
        <div class="col-md-12 my-wishlist">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="heading-title">@if(session()->get('language') == 'lithuanian') Mano norų sąrašas @else My Wishlist @endif</th>
                        </tr>
                    </thead>
                    <tbody id="wishlist">
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.row -->
</div><!-- /.sigin-in-->
<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<div id="brands-carousel" class="logo-slider wow fadeInUp">
   
</div><!-- /.logo-slider -->


@endsection