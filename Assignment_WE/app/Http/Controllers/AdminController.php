<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminUsername = 'admin';
    private $adminPassword = 'password123';  // Change this to a more secure password

    public function showLoginForm()
    {
        return view('admin.login');  // Ensure the login view exists
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $this->adminUsername && $request->password === $this->adminPassword) {
            session(['isAdmin' => true]);  // Store the admin status in the session
            return redirect()->route('admin.dashboard');  // Ensure that this route exists
        }

        return back()->withErrors(['login' => 'Invalid credentials.']);
    }


    public function logout()
    {
        session()->forget('isAdmin');  // Clear the session data
        return redirect()->route('login');  // Redirect back to the login page
    }

    public function dashboard()
    {
        return view('admin.dashboard');  // Ensure this view exists
    }
}
