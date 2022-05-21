@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Search Reports </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('date.search')}}">
                                @csrf
                                <div class="form-group">
                                    <h5>Chose Date <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="date" class="form-control"">
                                        @error('date')
                                        <span class=" text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Reports Found</h3>
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
                                            <a href="{{ route('admin.download.invoice',$order->id) }}" id="download" class="btn btn-info" title="Download Invoice"><i class="fa fa-download"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection