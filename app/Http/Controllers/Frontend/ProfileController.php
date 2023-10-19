<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

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
        //---check subscriber call api---
        $purchasePlanDetail = null;
        if ($subscriber) {
            $purchaseDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
            if ($purchaseDetail) {
                if ($purchaseDetail->autorenew) {
                    $autorenew = 1;
                } else {
                    $autorenew = 2;
                }
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'UTF-8',
                ])->post('http://wap.teletalk.com.bd/napgames/napgetstatusjson.php', [
                    "msisdn" => $subscriber->phone_num,
                    "servicename" => 'NapTechGames',
                    "subservicename" => 'NapTechGames',
                    'servicetype' => $purchaseDetail->service_type,
                    "groupid" => $autorenew,
                ]);
                // dd(json_decode($response));
                $result = json_decode($response);
                if ($result == null) {
                    $purchasePlanDetail = null;
                } elseif ($result->result_code == 400) {
                    $purchasePlanDetail = null;
                } elseif ($request->result_code == 0) {
                    $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
                }
            }
        }
        return view('frontend.pages.profile', compact('subscriber', 'logIn', 'purchasePlanDetail'));
    }
    //---profile_update
    public function profile_update(Request $request, $id)
    {
        $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->update([
            'name' => $request->username
        ]);
        if ($request->hasFile('imageupload')) {
            if ($subscriber->image) {
                File::delete($subscriber->image);
            }
            $image = $request->file('imageupload')->getClientOriginalExtension();
            $imageName = uniqid() . '.' . $image;
            $imagePath = 'assets/frontend/images/uploads/user/' . $imageName;
            $request->file('imageupload')->move(public_path('assets/frontend/images/uploads/user'), $imageName);
            $subscriber->update([
                'image' => $imagePath
            ]);
        }
        return redirect()->back()->with('update', 'Your Profile Has Been Updated!');
    }
}
