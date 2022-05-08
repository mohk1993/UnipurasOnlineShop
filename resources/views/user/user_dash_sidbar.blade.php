@php
$id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp

<div class="card mb-3" style="max-width: 540px;">
    <div class="col-md-4">
        <img src="{{ (!empty($user->profile_photo_path))
                                        ?url('user-images/'.$user->profile_photo_path)
                                        :url('user-images/blank_profile_picture.png') }}" class="img-fluid rounded-start" alt="..." style="width: 150px; height: 250px; border-radius: 50%;">
    </div>
    <div class="col-md-4">
        <ul class="list-group list-group-flush">
            <a href="{{ route('user.orders')}}" class="btn btn-primary btn-block">My Orders</a>
            <a href="{{ route('user.profile')}}" class="btn btn-primary btn-block">Profile Settings</a>
            <a href="{{ route('view.user.update.password')}}" class="btn btn-primary btn-block">Change Password</a>
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Logout</a>
        </ul>
    </div>
</div>