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
                        <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Pavadinimas @else Name @endif<span>*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') El. paštas @else Email @endif<span>*</span></label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Telefono numeris @else Phone Number @endif<span>*</span></label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">@if(session()->get('language') == 'lithuanian') Profilio nuotrauka @else Profile Photo @endif<span>*</span></label>
                        <input type="file" name="profile_photo_path" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-upper btn btn-primary ">@if(session()->get('language') == 'lithuanian') Atnaujinti @else Update @endif</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection