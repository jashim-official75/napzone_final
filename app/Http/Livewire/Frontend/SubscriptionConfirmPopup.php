<?php

namespace App\Http\Livewire\Frontend;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class SubscriptionConfirmPopup extends Component
{
    public function send(Request $request)
    {
        // Get subscriber details
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        // dd($subscriber);
        // Get last unconfirmed subscription request
        $lastUnconfmPlan = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 0)->latest()->first();
        // Autorenew perameter pass
        $autorenew = 1;
        //---sub api call
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'charset' => 'UTF-8',
        ])->post('http://wap.teletalk.com.bd/napgames/napsubjson.php', [
            'msisdn' => $subscriber->phone_num,
            'servicename' => 'NapTechGames',
            'subservicename' => 'NapTechGames',
            'servicetype' => $lastUnconfmPlan->service_type,
            'groupid' => $autorenew,
            'refid' => $lastUnconfmPlan->refid,
        ]);
        // dd(json_decode($response));
        // Get response from API
        $result = json_decode($response);
        if ($result->result_code == 0) {
            $lastUnconfmPlan->update(['confirmed_by_user' => 1]);
            $this->emit('packageFinish');
        } else {
            return redirect()->route('home')->with('error', 'Plan Subscription failed! Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.frontend.subscription-confirm-popup');
    }
}
