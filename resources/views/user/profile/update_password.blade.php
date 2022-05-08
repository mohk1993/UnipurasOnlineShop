@extends('user.user_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="row" style="padding-top: 20px;">
            @include('user.user_dash_sidbar')
            <div class="col-md-6">
                <form method="POST" action="{{ route('update.user.password') }}">
                    @csrf
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Current Password<span>*</span></label>
                        <input type="password" id="current_password" name="current_password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">New Password<span>*</span></label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password<span>*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
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