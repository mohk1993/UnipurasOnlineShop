<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class AdminProfileController extends Controller
{
    public function adminProfile() {
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    public function adminProfileEdit() {
        $adminEditData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('adminEditData'));
    }
    public function adminProfileUpdate(Request $request) {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('admin-images/'.$data->profile_photo_path));
            $fileName = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('admin-images'),$fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notifications = array(
            'message' => 'Profile was updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notifications);
    }

    public function changeAdminPassword(){
        return view('admin.admin_change_password');
    }
    
    public function updateAdminPassword(Request $request)
    {
        $validate = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|confirmed',
        ]);

        $hashedPass = Admin::find(1)->password;
        $hashed = Hash::check($request->oldPassword,$hashedPass);
        Log::info($hashed);
        if(Hash::check($request->oldPassword,$hashedPass)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->newPassword);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }
}
