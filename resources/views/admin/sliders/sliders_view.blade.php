@extends('admin.admin_master')
@section('admin')

<div class="content-header">
    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Our Sliders</h3>
                <div class="d-md-flex justify-content-md-end">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-add">Add Slider</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Slider Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>

                                <td>{{ $slider->slider_name_en}}</td>
                                <td>
                                    <img src="{{ asset($slider->slider_image)}}" style="width: 45px; height: 45px">
                                </td>
                                <td>
                                    @if($slider->slider_status == 1)
                                    <a href="{{ route('slider.inactive',$slider->id) }}"><span class="badge badge-pill badge-success">Active</span></a>
                                    @else
                                    <a href="{{ route('slider.active',$slider->id) }}"><span class="badge badge-pill badge-danger">Inactive</span></a>
                                    @endif
                                </td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('view.update.slider',$slider->id) }}" class="btn btn-info" title="Update Data" style="margin-right: 10px;"><i class="fa fa-pencil"></i></a>
                                    <a href="{{ route('view.delete.slider',$slider->id) }}" id="delete" class="btn btn-danger" title="Delete Data"><i class="fa fa-trash"></i></a>
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