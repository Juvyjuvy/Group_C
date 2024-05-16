<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth; // Don't forget to import Auth

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Correct way to get authenticated user
        // Ensure you pass the profile if it's used in the view
        $profiles = Profile::where('user_id', $user->id)->first();

        return view ('profile', compact('user'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        // Update profile information
        $user->name = $request->input('name');
        $user->course = $request->input('course');
        $user->address = $request->input('address');
        $user->religion = $request->input('religion');
        $user->birthday = $request->input('birthday');
        $user->contact_number = $request->input('contact_number');
        $user->profile_image = $request->input('profile_image');
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/profile'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
