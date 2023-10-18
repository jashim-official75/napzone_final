<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        return view('backend.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->except('_token');

        if (auth()->attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'Login successful');
        }
        return redirect()->route('admin.login')->with('error', 'Login failed! Please try again.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login')->with('success', 'Logout successful.');
    }
}
