@extends('admin.admin_master')
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update Partner Info</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="POST" action="{{ route('update.partner',$partner->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $partner->id }}">
                            <input type="hidden" name="current_image" value="{{ $partner->partner_image }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Company Name EN<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="partner_name_en" class="form-control" value="{{ $partner->partner_name_en }}" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('partner_name_en')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Company Name Lith<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="partner_name_lith" value="{{ $partner->partner_name_lith }}" class="form-control" required="" data-validation-required-message="This field is required">
                                            <div class="help-block"></div>
                                            @error('partner_name_lith')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Company Image/Logo <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="partner_image" class="form-control">
                                            <div class="help-block"></div>
                                            @error('partner_image')
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