<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Autorenewal;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function charged(Request $request)
    {
        try {

            // $clientIp = request()->getClientIp();
            // $authorizedIp = '35.214.39.112';

            // if ($clientIp == $authorizedIp) {
                $startTime = $request->input('start_time');
                $endTime = $request->input('end_time');
                $msisdn = $request->input('msisdn');
                // get the subscriber 
                $subscriber = Subscriber::where('phone_num', $msisdn)->first();
                // Get the purchase plan of the subscriber and change end time.
                $purchasePlan = PurchasePlan::where('subscriber_id', $subscriber->id)
                    ->where('end_at', '<', Carbon::now())
                    ->where('confirmed_by_user', 1)
                    ->latest()
                    ->first();

                if (!empty($purchasePlan)) {
                    $updatePlan = $purchasePlan->update(['end_at' => $endTime, 'start_at' => $startTime, 'purchase_confirmed' => 1]);

                    return response()->json([
                        'status' => true,
                        'message' => 'Plan Has been updated',
                    ], 200);
                } elseif ($purchasePlan == null) {
                    return response()->json([
                        'status' => false,
                        'message' => 'user is not requestd to subscribe',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'User is already subscribed',
                    ], 200);
                }
            // } else {
            //     return response()->json([
            //         'status' => false,
            //         'message' => "Ip:" . $clientIp .  " is not allowed",
            //     ], 200);
            // }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage(),
            ], 400);
        }
    }

    public function autorenew(Request $request)
    {
        try {

            // $clientIp = request()->getClientIp();
            // $authorizedIp = '35.214.39.112';

            // if ($clientIp == $authorizedIp) {
                $startTime = $request->input('start_time');
                $endTime = $request->input('end_time');
                $msisdn = $request->input('msisdn');
                // get the subscriber 
                $subscriber = Subscriber::where('phone_num', $msisdn)->first();
                // Get the purchase plan of the subscriber and change end time.
                $purchasePlan = PurchasePlan::where('subscriber_id', $subscriber->id)
                    ->where('end_at', '<', Carbon::now()->addMinutes(60))
                    ->where('confirmed_by_user', 1)
                    ->latest()
                    ->first();
                // Get autorenew number of subscriptions
                if (!empty($purchasePlan)) {
                    $autorenew = $purchasePlan->renewed;
                    $updatePlan = $purchasePlan->update(['end_at' => $endTime, 'start_at' => $startTime, 'renewed' => $autorenew + 1]);
                    $autorenewData = [
                        'subscriber_id' => $purchasePlan->subscriber_id,
                        'plan_id' => $purchasePlan->plan_id,
                        'start_at' => $startTime,
                        'end_at' => $endTime,
                    ];
                    Autorenewal::create($autorenewData);
                    return response()->json([
                        'status' => true,
                        'message' => 'Plan Has been renewed',
                    ], 200);
                } elseif ($purchasePlan == null) {
                    return response()->json([
                        'status' => false,
                        'message' => 'user plan is not expired or user is not requested to renew',
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'User is already subscribed',
                    ], 200);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => "Ip:" . $clientIp .  " is not allowed",
                ], 200);
            }
        // } catch (\Exception $exception) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => $exception->getMessage(),
        //     ], 400);
        // }
    }
}
