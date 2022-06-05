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
                            <th class="cart-description item">@if(session()->get('language') == 'lithuanian') Vaizdas @else Image @endif</th>
                            <th class="cart-product-name item">@if(session()->get('language') == 'lithuanian') Produkto pavadinimas @else Product Name @endif</th>
                            <th class="cart-qty item">@if(session()->get('language') == 'lithuanian') Kiekis @else Quantity @endif</th>
                            <th class="cart-sub-total item">@if(session()->get('language') == 'lithuanian') Tarpinė suma @else Subtotal @endif</th>
                            <th class="cart-total last-item">@if(session()->get('language') == 'lithuanian') Pašalinti @else Remove @endif</th>
                        </tr>
                    </thead><!-- /thead -->
                    <tbody id="cartPage">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-4 pull-right">
            <a href="{{ route('checkout')}}" type="submit" class="btn btn-primary btn-lg">@if(session()->get('language') == 'lithuanian') PEREITI PRIE KASOS @else PROCEED TO CHECKOUT @endif</a>
        </div>
    </div><!-- /.row -->
</div><!-- /.sigin-in-->

@endsection