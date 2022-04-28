@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Our Products</h3>
                <div class="d-md-flex justify-content-md-end">
                    <a href="{{ route('view.add.product') }}" class="btn btn-primary">Add Product</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name En</th>
                                <th>Product Name Lith</th>
                                <th>Product Image</th>
                                <th>Product Quantity</th>
                                <th>Product Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name_en}}</td>
                                <td>{{ $product->product_name_lith}}</td>
                                <td><img src="{{ asset($product->product_thambnail)}}" style="width: 50px; height: 50px;"></td>
                                <td>{{ $product->product_qty}}</td>
                                <td>
                                    @if($product->product_status == 1)
                                    <a href="{{ route('product.inactive',$product->id) }}"><span class="badge badge-pill badge-success">Active</span></a>
                                    @else
                                    <a href="{{ route('product.active',$product->id) }}"><span class="badge badge-pill badge-danger">Inactive</span></a>
                                    @endif
                                </td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('view.update.product',$product->id) }}" class="btn btn-info" title="Update Data" style="margin-right: 10px;"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('delete.product',$product->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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
@endsection