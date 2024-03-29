@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                    <h3 class="widget-user-username">{{$adminData->name}}</h3>
                    <a href="{{ route('edit.admin.profile') }}" style="float:right;" class="btn btn-rounded btn-primary mb-5">Edit Profile</a>
                    <h6 class="widget-user-desc">{{$adminData->email}}</h6>
                </div>
                <div class="widget-user-image">
                    <img class="rounded-circle" src="{{ (!empty($adminData->profile_photo_path))
                         ?url('admin-images/'.$adminData->profile_photo_path)
                         :url('admin-images/blank_profile_picture.png') }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="description-block">
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 br-1 bl-1">
                            <div class="description-block">
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection