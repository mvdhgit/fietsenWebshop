<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        return view('/profile', ['user'=>$user]);
    }

    public function changePasswordForm()
    {
        return view('profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|string',
        ]);

        if (password_verify($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            return redirect()->route('pages.profile')->with('success', 'Password updated successfully.');
        }
        return back()->withErrors(['current_password' => 'Incorrect current password.'])->withInput();
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed.
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // You can adjust the name if needed.
            $image->storeAs('public/images', $imageName);
            // Save the image path to the user's profile_picture field in the database
            $user = auth()->user();
            $user->profile_picture = $imageName;
            $user->save();
        }
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
    
    
}
