<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class AdminController extends Controller
{

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message'   => 'Logout Successfully',
            'alert-type'=> 'success',
        );

        return redirect('/logout')->with($notification);
    }

    public function LogoutPage(){

        return view('admin.logout_page');
    }



    public  function AdminProfile(){

        $admin_id = Auth::user()->id;
        $adminData = User::findOrFail($admin_id);
        return view('admin.admin_profile',compact('adminData'));
    }

    public function AdminProfileUpdate(Request $request)
    {

        $admin_id = Auth::user()->id;
        $adminData = User::findORFail($admin_id);
        $old_image = $adminData->photo;

        if ($request->file('photo')) {
            $image = $request->file('photo');
            unlink($old_image);
            $image_rename = hexdec(uniqid('', false)) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(150, 150)->save('upload/admin_image/' . $image_rename);
            $image_save = 'upload/admin_image/' . $image_rename;
            User::findOrFail($admin_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'photo'=>$image_save,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message'   => 'Admin Profile Updated Successfully',
                'alert-type'=> 'success',
            );
            return redirect()->back()->with($notification);
        }
        else{
            User::findOrFail($admin_id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message'   => 'Admin Profile Without Image Updated Successfully',
                'alert-type'=> 'success',
            );
            return redirect()->back()->with($notification);
        }
    }


    public function ChangePassword(){
        return view('admin.change_password');
    }// End Method


    public function AdminProfileStore(Request $request){
       $request->validate([
          'old_password' => 'required',
          'new_password' => 'required|confirmed',
          'new_password_confirmation' => 'required|same:new_password',

       ]);

       if (!Hash::check($request->old_password, Auth::user()->password)){
           $notification = array(
               'message'   => 'Password does not match',
               'alert-type'=> 'error',
           );
           return redirect()->back()->with($notification);
       }
       else{
           User::findOrFail(Auth::id())->update([
               'password' => Hash::make($request->new_password),
           ]);

           Auth::guard('web')->logout();

           $request->session()->invalidate();

           $request->session()->regenerateToken();

           $notification = array(
               'message'   => 'Password Updated Successfully',
               'alert-type'=> 'success',
           );
           return redirect('/logout')->with($notification);
       }

    }// End Method


    /////////////// All admin users roles and permission////////////////////////

    public function AllAdminUser(){

        $all_admin_user = User::all();
        return view('backend.admin.all_admin',compact('all_admin_user'));
    } //end method
    public function AddAdmin(){

        $roles = Role::all();
        return view('backend.admin.add_admin',compact('roles'));
    }

}
