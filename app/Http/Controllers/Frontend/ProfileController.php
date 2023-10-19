<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //--profile
    public function profile(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        return view('frontend.pages.profile', compact('subscriber', 'logIn'));
    }
}
