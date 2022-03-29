<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index() {
        return view('user.index');
    }
    public function LogoutUser(){
        Auth::logout();
        return Redirect()->route('login');
    }
    public function GoToUserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.user_profile',compact('user'));
    }
    public function UpdateUserProfile(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('user-images/'.$data->profile_photo_path));
            $fileName = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('user-images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notifications = array(
            'message' => 'Profile was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notifications);
    }

    public function ViewUpdateUserPassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.update_password',compact('user'));
    }

    public function UpdateUserPassword(Request $request)
    {
        $validate = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Auth::user()->password;
        $hashed = Hash::check($request->current_password,$hashedPass);
        if(Hash::check($request->current_password,$hashedPass)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else{
            return redirect()->back();
        }
    }
}
