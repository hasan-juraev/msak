<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    // destroy method
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // toastr notification
        $notification = array (
            'message' => 'Logged out.',
            'alert-type' => 'info'
        );

        return redirect('/login')->with($notification);
    } // end destroy method

    // profile
    public function profile()
    {
        // store user id from Auth::user in $id
        $id = Auth::user()->id;

        // find the user $id from User model which retrieves data from our database table
        $adminData = User::find($id);
        return view('admin.admin_profile_view', compact('adminData'));
    } // end profile

    // editProfile
    public function editProfile() 
    {
        // store user id from Auth::user in $id
        $id = Auth::user()->id;

        // find the user $id from User model which retrieves data from our database table
        $editData = User::find($id);
        return view('admin.admin_profile_edit', compact('editData'));
    } //end editProfile

    // sotreProfile
    // since the storeProfile is used in POST request,
    // Request $request must be included
    public function storeProfile(Request $request) {
        
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')) {
            // assign $file with 'profile_image' from POST $request
            $file = $request->file('profile_image');

            // make a uniqe name for new file being uploaded by adding filename to date
            $filename = date('YmdHis').$file->getClientOriginalName();

            // move the file being uploaded to the 'upload/admin_images' with the name of $filename
            $file->move(public_path('upload/admin_images'), $filename);

            // assign $data array index 'profile_image' with $filename
            $data['profile_image'] = $filename;
        }

        // save the data in database
        $data->save();

        // toastr notification
        $notification = array (
            'message' => 'Admin Profile Updated Sucessfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    } // end Method

    // changePassword
    public function changePassword() 
    {
        return view('admin.admin_change_password');
    }// end method

    // updatePassword
    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        // check if the old password matches the from database value
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            // assign id value of Authorized user to $users; by finding from User model,
            // from Auth::id()
            $users = User::find(Auth::id());

            // encrypt user newpassword;
            // assign 'password' column of `users` table with exncrypted $request->newpassword
            $users->password = bcrypt($request->newpassword);

            // save into database
            $users->save();

            // add message in session
            session()->flash('message', 'Password updated successfully');
            return redirect()->back();

        } else {
            
            // add message in session
            session()->flash('message', 'Old password does not match');
            return redirect()->back();
        }

    }// end method

   

  

}
