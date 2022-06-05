@extends('user.user_master')
@section('content')

@section('title')
Cash
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">@if(session()->get('language') == 'lithuanian') Pagrindinis @else Home @endif</a></li>
                <li class='active'>@if(session()->get('language') == 'lithuanian') Grynieji pinigai @else Cash @endif</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="col-md-6">
            <!-- checkout-progress-sidebar -->
            <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">@if(session()->get('language') == 'lithuanian') Pereiti prie užsakymo @else Proceed To Order @endif</h4>
                        </div>
                        <div class="">
                            <ul class="nav nav-checkout-progress list-unstyled">
                                <li>
                                    <strong>@if(session()->get('language') == 'lithuanian') Bendra suma prieš mokesčius @else Grand Total Befor Tax @endif : </strong> ${{ $totalBeforTax }}
                                </li>
                                <hr>
                                <li>
                                    <strong>@if(session()->get('language') == 'lithuanian') Mokesčiai @else Tax @endif: </strong> ${{ $cartTax }}
                                </li>
                                <hr>
                                <li>
                                    <strong>@if(session()->get('language') == 'lithuanian') Bendra suma po mokesčių @else Grand Total After Tax @endif : </strong> ${{ $totalAfterTax }}
                                    <hr>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-progress-sidebar -->
        </div>
        <div class="col-md-6">
            <!-- checkout-progress-sidebar -->
            <div class="checkout-progress-sidebar ">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="unicase-checkout-title">@if(session()->get('language') == 'lithuanian') Užsakymas ir užsakymas @else Order and Checkout @endif</h4>
                        </div>

                        <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                            @csrf
                            <div class="form-row">
                            <img src="{{ asset('user-tmp/assets/images/payments/cash.jpg') }}">
                                <label for="card-element">
                                    <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                    <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                    <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                    <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                    <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                    <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                    <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                    <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                </label>

                            </div>
                            <br>
                            <button class="btn btn-primary">@if(session()->get('language') == 'lithuanian') Užsisakykite @else Order @endif</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection