@extends('admin.admin_master')
@section('admin')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users</h3>
                        <span class="badge badge-pill badge-success">{{count($users)}}</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>

                                        <td>
                                            <img src="{{ (!empty($user->profile_photo_path))
                                        ?url('user-images/'.$user->profile_photo_path)
                                        :url('user-images/blank_profile_picture.png') }}" class="img-fluid rounded-start" alt="..." style="width: 50px; height: 50px; border-radius: 50%;">
                                        </td>
                                        <td>{{ $user->name}}</td>
                                        <td>{{ $user->email}}</td>
                                        <td>{{ $user->phone}}</td>

                                        <td>
                                            @if($user->isUserOnline())
                                                <span class="badge badge-pill badge-success">Active</span>
                                            @else
                                                <span class="badge badge-pill badge-danger">{{Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>
                                            @endif
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