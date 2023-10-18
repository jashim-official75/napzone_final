<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use App\Models\Support;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function show(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $subscribers = Subscriber::paginate(10);

        return view('backend.pages.subscriber.subscriber',  compact('subscribers', 'notification'));
    }

    public function search(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $phone_number = $request->input('phone_number');
        $page = 'search';
        $subscribers = Subscriber::where('Phone_num', 'LIKE', '%' . $phone_number . '%')->paginate(10);
        return view('backend.pages.subscriber.subscriber',  compact('subscribers', 'page', 'notification'));
    }

    public function purchasePlans(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $allPurchasedPlans = PurchasePlan::where('purchase_confirmed', 1)->paginate(10);

        return view('backend.pages.subscriber.purchasePlan', compact('allPurchasedPlans', 'notification'));
    }
}
