@extends('user.user_master')
@section('content')
<div class="row" style="padding-top: 20px;">
    @include('user.user_dash_sidbar')
    <h4>
        <span class="text-danger"> Shipment Details</span>
    </h4>
    <div class="col-md-8">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Recipient Name</th>
                    <th scope="col">Recipient Phone</th>
                    <th scope="col">Recipient Email</th>
                    <th scope="col">Division</th>
                    <th scope="col">District</th>
                    <th scope="col">State</th>
                    <th scope="col">Post Code</th>
                    <th scope="col">Order Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->division->shipment_name }}</td>
                    <td>{{ $order->district->district_name }}</td>
                    <td>{{ $order->state->state_name }}</td>
                    <td>{{ $order->post_code }}</td>
                    <td>{{ $order->order_date }}</td>
                </tr>
            </tbody>
        </table>
        <h4>Order Details
            <span class="text-danger"> Invoice : {{ $order->invoice_no }}</span>
        </h4>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Recipient Name</th>
                    <th scope="col">Recipient Phone</th>
                    <th scope="col"> Payment Type</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Invoice </th>
                    <th scope="col">Order Total</th>
                    <th scope="col">Order Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->phone }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td> {{ $order->transaction_id }}</td>
                    <td> {{ $order->invoice_no }} </td>
                    <td>{{ $order->amount }}</td>
                    <td><span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr style="background: #e2e2e2;">
                            <td class="col-md-1">
                                <label for=""> Image</label>
                            </td>
                            <td class="col-md-3">
                                <label for=""> Product Name </label>
                            </td>
                            <td class="col-md-3">
                                <label for=""> Product Code</label>
                            </td>
                            <td class="col-md-1">
                                <label for=""> Quantity </label>
                            </td>
                            <td class="col-md-1">
                                <label for=""> Price (1 vnt) </label>
                            </td>
                            <td class="col-md-1">
                                <label for=""> Tax </label>
                            </td>
                            <td class="col-md-1">
                                <label for=""> Price Total </label>
                            </td>
                        </tr>
                        @foreach($orderItem as $item)
                        <tr>
                            <td class="col-md-1">
                                <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
                            </td>
                            <td class="col-md-3">
                                <label for=""> {{ $item->product->product_name_en }}</label>
                            </td>
                            <td class="col-md-3">
                                <label for=""> {{ $item->product->product_code }}</label>
                            </td>
                            <td class="col-md-2">
                                <label for=""> {{ $item->qty }}</label>
                            </td>
                            <td class="col-md-2">
                                <label for=""> €{{ $item->price }}</label>
                            </td>
                            <td class="col-md-2">
                                <label for=""> €{{ ($item->price * $item->qty)*0.05 }}  </label>
                            </td>
                            <td class="col-md-2">
                                <label for=""> €{{ (($item->price * $item->qty)*0.05) + ($item->price * $item->qty) }}</label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> <!-- / end col md 8 -->
    </div> <!-- // END ORDER ITEM ROW -->
</div>
@endsection