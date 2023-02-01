<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    // Profile View
    public function ProfileView(){
        $user = User::find(Auth::id());
        return view('backend.profile.profile', compact('user'));
    }

    // Name Update
//    function ChangeName(Request $request)
//    {
//        User::find(Auth::id())->update([
//            'name' => $request->name,
//        ]);
//
//        $notification = array(
//            'message' => 'Admin Name Change Successfully',
//            'alert-type' => 'success'
//        );
//        return redirect()->route('profile')->with($notification);
//    }

    // Password Change
    public function ChangePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = User::find(Auth::id());
            $admin->password = Hash::make($request->password);
            $admin->save();

            $notification = array(
                'message' => 'Password Change Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('profile')->with($notification);

        } else{
            $notification = array(
                'message' => 'Password Error',
                'alert-type' => 'warning'
            );
            return redirect()->route('profile')->with($notification);
        }

    } // End Method

//    public function ChangeAvatar(Request $request){
//
//        $image = $request->file('admin_avatar');
//        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
//        Image::make($image)->save('uploads/avatar/'.$name_gen);
//        $save_url = 'uploads/avatar/'.$name_gen;
//
//        User::insert([
//            'profile_photo_path' => $save_url,
//        ]);
//        $notification = array(
//            'message' => 'About Insert Successfully',
//            'alert-type' => 'info'
//        );
//
//        return redirect()->back()->with($notification);
//    }

    // Profile Update
    public function ChangeAvatar(Request $request){
        $id = $request->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/admin_images/'.$data->profile_photo));
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/admin_images'),$filename);
            $data['profile_photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('profile')->with($notification);
    } // End method
}
