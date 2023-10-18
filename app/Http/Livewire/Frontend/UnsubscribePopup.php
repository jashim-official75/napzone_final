<?php

namespace App\Http\Livewire\Frontend;

use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class UnsubscribePopup extends Component
{

    public function send(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        $purchasePlanDetail = null;
        if ($subscriber) {
            $purchaseDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
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
            }
            elseif($result->result_code == 400){
                $purchasePlanDetail = null;
            }
            elseif($request->result_code == 0){
                $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
            }
        }
        // dd($purchasePlanDetail);

        if (empty($purchasePlanDetail)) {
            return redirect()->route('home')->with('error', 'You are already unsubscribed! Or Please try again later.');
        }

        if ($purchasePlanDetail->autorenew) {
            $autorenew = 1;
        } else {
            $autorenew = 2;
        }
        // Unsubscribe API 
        $result = Http::get('http://wap.teletalk.com.bd/napgames/napunsubjson.php', [
            'msisdn' => $subscriber->phone_num,
            'servicename' => 'NapTechGames',
            'subservicename' => 'NapTechGames',
            'servicetype' => $purchasePlanDetail->service_type,
            'groupid' => $autorenew,
        ]);
        $response = json_decode($result);

        // If API was successful update database else redirect on homepage with error.
        if ($response->result_code == 0) {
            $purchasePlanDetail->update(['unsubscribe' => 1]);
            return redirect()->route('home')->with('success', 'You have successfully Unsubscribed!');
        } else {
            return redirect()->route('home')->with('error', 'Unsubscription failed! Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.frontend.unsubscribe-popup');
    }
}
