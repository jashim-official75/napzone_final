<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use App\Models\Support;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function show(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }

        // Check if user is subscribed or not.
        $subscriber = Subscriber::where('token', $accessor)->first();
        if ($subscriber) {
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('end_at', '>', Carbon::now())->latest()->first();
        } else {
            $purchasePlanDetail = null;
        }

        return view('frontend.pages.support', compact('logIn'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'phone_num' => 'required|min:10',
            'problem' => 'required',
        ], [
            'problem.required' => 'Description field is required'
        ]);
        $support = $request->all();
        if (Support::create($support)) {
            return redirect()->back()->with('success', 'Successfully submitted. We will reach you as soon as possible.');
        }
        return redirect()->back()->with('error', 'Submit Error! Please try again.');
    }
}
