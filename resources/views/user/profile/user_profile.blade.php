@extends('user.user_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            @include('user.user_dash_sidbar')
            <div class="col-md-6">
                <form method="POST" action="{{ route('update.user.profile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Name<span>*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number<span>*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Profile Photo<span>*</span></label>
                        <input type="file" name="profile_photo_path" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-upper btn btn-primary ">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection