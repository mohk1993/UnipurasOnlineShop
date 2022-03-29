@extends('user.user_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="col-md-4">
                    <img src="{{ (!empty($user->profile_photo_path))
                                        ?url('user-images/'.$user->profile_photo_path)
                                        :url('user-images/blank_profile_picture.png') }}" class="img-fluid rounded-start" alt="..." style="width: 150px; height: 250px; border-radius: 50%;">
                </div>
                <div class="col-md-4">
                    <ul class="list-group list-group-flush">
                        <a href="{{ route('user.profile')}}" class="btn btn-primary btn-block">Profile Settings</a>
                        <a href="{{ route('view.user.update.password')}}" class="btn btn-primary btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection