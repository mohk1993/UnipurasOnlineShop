@extends('admin.admin_master')
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Slider Info</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('update.slider',$slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <input type="hidden" name="current_image" value="{{ $slider->slider_image }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Slider Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="slider_name_en" class="form-control" value="{{ $slider->slider_name_en }}" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('slider_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Name Lith<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="slider_name_lith" value="{{ $slider->slider_name_lith }}" class="form-control" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('slider_name_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Decription En</h5>
                                        <div class="controls">
                                            <input type="text" name="slider_description_en" class="form-control" value="{{ $slider->slider_description_en }}">
                                            <div class="help-block"></div>
                                            @error('slider_description_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Decription Lith</h5>
                                        <div class="controls">
                                            <input type="text" name="slider_description_lith" class="form-control" value="{{ $slider->slider_description_lith }}">
                                            <div class="help-block"></div>
                                            @error('slider_description_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Slider Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="slider_image" class="form-control">
                                            <div class="help-block"></div>
                                            @error('slider_image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection