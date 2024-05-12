<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usersX; // Assuming your model name is UserX

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([

            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',

        ]);

        // Create a new user instance
        $user = new usersX(); // Adjust model name here
        // Set the user attributes
     $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password for security

        // Save the user to the database
        $user->save();

        // Redirect back to the page with a success message
        return redirect()->back()->with('success', 'User added successfully.');
    }

    // Other controller methods...

}
