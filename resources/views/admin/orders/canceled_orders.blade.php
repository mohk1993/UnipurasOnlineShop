@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Canceled Orders</h3>
                <!-- <div class="d-md-flex justify-content-md-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add Slider</a>
                </div> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Invoice</th>
                                <th>Pyment</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>

                                <td>{{ $order->order_date}}</td>
                                <td>{{ $order->invoice_no}}</td>
                                <td>{{ $order->payment_type}}</td>
                                <td>€ {{ $order->amount}}</td>
                                <td>
                                    <a href=" "><span class="badge badge-pill badge-primary">{{ $order->status}}</span></a>
                                </td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('pending.order.details',$order->id) }}" class="btn btn-info" title="Update Data" style="margin-right: 10px;"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('view.delete.slider',$order->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
@include('admin.sliders.add_slider_view')
@endsection