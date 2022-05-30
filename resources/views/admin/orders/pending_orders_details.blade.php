@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="col-12">
        @if($order->status == 'Pending')
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('confirm.order',$order->id)}}" class="btn btn-primary btn-round btn-block" id="confirm" style="margin-bottom:10px;">Confirm Order</a>
            <a href="{{ route('cancel.order',$order->id)}}" class="btn btn-primary btn-round btn-block" id="cancelled" style="margin-bottom:10px;">Cancel Order</a>
        </div>
        @elseif($order->status == 'confirmed')
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('process.order',$order->id)}}" class="btn btn-primary btn-round btn-block" id="process" style="margin-bottom:10px;">Process Order</a>
        </div>
        @elseif($order->status == 'processing')
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('ship.order',$order->id)}}" class="btn btn-primary btn-round btn-block" id="ship" style="margin-bottom:10px;">Ship Order</a>
        </div>
        @elseif($order->status == 'shipped')
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('delivered.order',$order->id)}}" class="btn btn-primary btn-round btn-block" id="delivered" style="margin-bottom:10px;">Delivered Order</a>
        </div>
        @endif
        <div class="box box-solid box-inverse box-info">
            <div class="box-header with-border">
                <h4 class="box-title">Order <strong>Details</strong></h4>

            </div>

            <div class="box-body">
                <table class="table table table-bordered table-striped">
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
                            <td>€ {{ $order->amount }}</td>
                            <td><span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box box-solid box-inverse box-info">
            <div class="box-header with-border">
                <h4 class="box-title">Shipment <strong>Details</strong></h4>

            </div>

            <div class="box-body">
                <table class="table table table-bordered table-striped">
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
            </div>
        </div>
        <div class="box box-solid box-inverse box-info">
            <div class="box-header with-border">
                <h4 class="box-title">Invoice : <strong>{{ $order->invoice_no }}</strong></h4>

            </div>

            <div class="box-body">
                <table class="table table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td class="col-md-2">
                                <label for=""> Image</label>
                            </td>
                            <td class="col-md-3">
                                <label for=""> Product Name </label>
                            </td>
                            <td class="col-md-2">
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
                            <td class="col-md-2">
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
                                <label for=""> €{{ ($item->price * $item->qty)*0.05 }} </label>
                            </td>
                            <td class="col-md-2">
                                <label for=""> €{{ (($item->price * $item->qty)*0.05) + ($item->price * $item->qty) }}</label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@include('admin.sliders.add_slider_view')

@endsection