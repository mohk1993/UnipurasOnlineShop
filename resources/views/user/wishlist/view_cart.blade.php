@extends('user.user_master')
@section('content')

@section('title')
Cart
@endsection

<div class="row">
    <div class="shopping-cart">
        <div class="shopping-cart-table ">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="4" class="heading-title">@if(session()->get('language') == 'lithuanian') Mano krepšelis @else My Cart @endif</th>
                        </tr>
                        <tr>
                            <th class="cart-description item">Image</th>
                            <th class="cart-product-name item">Product Name</th>
                            <th class="cart-qty item">Quantity</th>
                            <th class="cart-sub-total item">Subtotal</th>
                            <th class="cart-total last-item">Remove</th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody id="cartPage">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4 pull-right">
            <a href="{{ route('checkout')}}" type="submit" class="btn btn-primary btn-lg">PROCEED TO CHECKOUT</a>
        </div>
    </div><!-- /.row -->
</div><!-- /.sigin-in-->

@endsection