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
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
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
                                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                                    <input type="text" name="shipping_name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Full Name" value="{{ $userName }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                                    <input type="email" name="shipping_email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ $userEmail }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                                                    <input type="text" name="shipping_phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ $userPhone }}" required="">
                                                </div>


                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
                                                    <input type="text" name="post_code" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" required="">
                                                </div>



                                            </div>
                                            <!-- guest-login -->

                                            <!-- already-registered-login -->
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <div class="form-group">
                                                    <h5><b>Division Select </b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="division_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select Division</option>
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
                                                    <h5><b>District Select</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select District</option>

                                                        </select>
                                                        @error('district_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <h5><b>State Select</b> <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="state_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Select State</option>

                                                        </select>
                                                        @error('state_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
                                                    <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
                                                </div>
                                            </div>

                                            <!-- already-registered-login -->
                                            @if(!Auth::check())
                                            <h4 class="checkout-subtitle outer-top-vs">Register and save time</h4>
                                            <p class="text title-tag-line ">Register with us for future convenience:</p>

                                            <ul class="text instruction inner-bottom-30">
                                                <li class="save-time-reg">- Fast and easy check out</li>
                                                <li>- Easy access to your order history and status</li>
                                            </ul>

                                            <a href="{{route('login')}}" type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">login</a>
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
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Image: </strong>
                                            <img src="{{ asset($item->options->image) }}" style="height: 50px; width: 50px;">
                                        </li>

                                        <li>
                                            <strong>Qty: </strong>
                                            ( {{ $item->qty }} )
                                            <strong>Product Name: </strong>
                                            ( {{ $item->name }} )
                                        </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            <strong>Grand Total Befor Tax : </strong> ${{ $totalBeforTax }}
                                        </li>
                                        <li>
                                            <strong>Tax: </strong> ${{ $cartTax }}
                                        </li>
                                        <li>
                                            <strong>Grand Total After Tax : </strong> ${{ $totalAfterTax }}
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
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('user-tmp/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('user-tmp/assets/images/payments/3.png') }}">
                                    </div> <!-- end col md 4 -->

                                    <div class="col-md-4">
                                        <label for="">Cash</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('user-tmp/assets/images/payments/cash.jpg') }}" style="height: 30px; width: 60px;">
                                    </div> <!-- end col md 4 -->
                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button"> Proceed to Pay</button>
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