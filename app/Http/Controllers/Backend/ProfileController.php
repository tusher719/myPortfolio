<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Profile View
    public function ProfileView(){
        $user = User::find(Auth::id());
        return view('backend.profile.profile', compact('user'));
    }

    // Name Update
    function nameupdate(Request $request)
    {
        User::find(Auth::id())->update([
            'name' => $request->name,
        ]);
        return back()->with('nameupdate', 'Your Name Updated Successfully');
    }

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
}
