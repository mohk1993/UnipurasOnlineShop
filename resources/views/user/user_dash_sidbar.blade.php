@php
$id = Auth::user()->id;
$user = App\Models\User::find($id);
@endphp

<div class="card mb-3" style="max-width: 540px;">
    <div class="col-md-4">
        <img src="{{ (!empty($user->profile_photo_path))
                                        ?asset('user-images/'.$user->profile_photo_path)
                                        :asset('user-images/profileImage.png') }}" class="img-fluid rounded-start" alt="..." style="width: 150px; height: 250px; border-radius: 50%;">
    </div>
    <div class="col-md-4">
        <ul class="list-group list-group-flush">
            <a href="{{ route('user.orders')}}" class="btn btn-primary btn-block">@if(session()->get('language') == 'lithuanian') Mano užsakymai @else My Orders @endif</a>
            <a href="{{ route('user.profile')}}" class="btn btn-primary btn-block">@if(session()->get('language') == 'lithuanian') Profilio nustatymai @else Profile Settings @endif</a>
            <a href="{{ route('view.user.update.password')}}" class="btn btn-primary btn-block">@if(session()->get('language') == 'lithuanian') Keisti slaptažodį @else Change Password @endif</a>
            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">@if(session()->get('language') == 'lithuanian') Atsijungimas @else Logout @endif</a>
        </ul>
    </div>
</div>