@extends('user.user_master')
@section('content')

@section('title')
Checkout
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">@if(session()->get('language') == 'lithuanian') Pagrindinis @else Home @endif</a></li>
                <li class='active'>@if(session()->get('language') == 'lithuanian') Atsiskaitymas @else Checkout @endif</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <!-- panel-heading -->
                            <!-- panel-heading -->
                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        @php
                                        if (Auth::check()){
                                        $userName = Auth::user()->name;
                                        $userPhone = Auth::user()->phone;
                                        $userEmail = Auth::user()->email;
                                        }else {
                                        $userName = "";
                                        $userPhone = "";
                                        $userEmail = "";
                                        }
                                        @endphp

                                        <form class="register-form" action="{{ route('checkout.store') }}" method="POST">
                                            @csrf
                                            <div class="col-md-6 col-sm-6 guest-login">
                                                <h4 class="checkout-subtitle">@if(Auth::check()) Hi... {{Auth::user()->name}} @else Enter Your Information @endif</h4>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Pavadinimas @else Name @endif <span>*</span></label>
                                                    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ $userName }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') El. paštas @else Email @endif <span>*</span></label>
                                                    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ $userEmail }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Telefonas @else Phone @endif <span>*</span></label>
                                                    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ $userPhone }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Pašto kodas @else Post Code @endif <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
                                                </div>



                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <div class="form-group">
                                                    <h5><b>@if(session()->get('language') == 'lithuanian') Pasirinkti skyrių @else Division Select @endif </b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">@if(session()->get('language') == 'lithuanian') Pasirinkite skyrių @else Select Division @endif</option>
                                                            @foreach($divisions as $item)
                                                            <option value="{{ $item->id }}">{{ $item->shipment_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('division_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5><b>@if(session()->get('language') == 'lithuanian') Pasirinkti rajoną @else District Select @endif</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">@if(session()->get('language') == 'lithuanian') Pasirinkite apygardą @else Select District @endif</option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5><b>@if(session()->get('language') == 'lithuanian') Pasirinkite valstybę @else State Select @endif</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="state_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">@if(session()->get('language') == 'lithuanian') Pasirinkite valstybę @else Select State @endif</option>

                                                        </select>
                                                        @error('state_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Pastabos @else Notes @endif <span>*</span></label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                                </div>
                                            </div>

                                            <!-- already-registered-login -->
                                            @if(!Auth::check())
                                            <h4 class="checkout-subtitle outer-top-vs">@if(session()->get('language') == 'lithuanian') Registruokitės ir sutaupykite laiko @else Register and save time @endif</h4>
                                            <p class="text title-tag-line ">@if(session()->get('language') == 'lithuanian') Užsiregistruokite pas mus, kad ateityje būtų patogu @else Register with us for future convenience @endif :</p>

                                            <ul class="text instruction inner-bottom-30">
                                                <li class="save-time-reg">-@if(session()->get('language') == 'lithuanian') Greitas ir paprastas patikrinimas @else Fast and easy check out @endif </li>
                                                <li>- @if(session()->get('language') == 'lithuanian') Lengva prieiga prie užsakymų istorijos ir būsenos @else Easy access to your order history and status @endif</li>
                                            </ul>

                                            <a href="{{route('login')}}" type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">@if(session()->get('language') == 'lithuanian') prisijungimas @else login @endif</a>
                                            @endif
                                    </div>
                                </div>
                                <!-- panel-body  -->
                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->
                    </div><!-- /.checkout-steps -->
                </div>

                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">@if(session()->get('language') == 'lithuanian') Atsiskaitymo eiga @else Your Checkout Progress @endif</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach($carts as $item)
                                        <li>
                                            <strong>@if(session()->get('language') == 'lithuanian') Vaizdas @else Image @endif: </strong>
                                            <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
                                        </li>

                                        <li>
                                            <strong>@if(session()->get('language') == 'lithuanian') Kiekis @else Qty @endif: </strong>
                                            ( {{ $item->qty }} )
                                            <strong>@if(session()->get('language') == 'lithuanian') Produkto pavadinimas @else Product Name @endif: </strong>
                                            ( {{ $item->name }} )
                                        </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            <strong>@if(session()->get('language') == 'lithuanian') Bendra suma prieš mokesčius @else Grand Total Befor Tax @endif : </strong> ${{ $totalBeforTax }}
                                        </li>
                                        <li>
                                            <strong>@if(session()->get('language') == 'lithuanian') Mokesčiai @else Tax @endif: </strong> ${{ $cartTax }}
                                        </li>
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
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">@if(session()->get('language') == 'lithuanian') Pasirinkite mokėjimo būdą @else Select Payment Method @endif</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">@if(session()->get('language') == 'lithuanian') Stripe @else Stripe @endif</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('user-tmp/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">@if(session()->get('language') == 'lithuanian') Kortelė @else Card @endif</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('user-tmp/assets/images/payments/3.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">@if(session()->get('language') == 'lithuanian') Grynieji pinigai @else Cash @endif</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('user-tmp/assets/images/payments/cash.jpg') }}" style="height: 30px; width: 60px;">
                                    </div> <!-- end col md 4 -->
                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button"> @if(session()->get('language') == 'lithuanian') Pereiti prie mokėjimo @else Proceed to Pay @endif</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="division_id"]').on('change', function() {
                var division_id = $(this).val();
                if (division_id) {
                    $.ajax({
                        url: "{{  url('/district-get/ajax') }}/" + division_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="state_id"]').empty();
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{  url('/state-get/ajax') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="state_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

        });
    </script>
    @endsection