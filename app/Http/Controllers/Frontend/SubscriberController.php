<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('accessor');

        return redirect()->route('home')->with('status', 'You have been logged out!');
    }
}
