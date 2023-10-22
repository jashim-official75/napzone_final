<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Plan;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SubscriptionPopup extends Component
{
    public $package = 'weekly';
    public $autorenewal = 1;
    public function next(Request $request)
    {
        $plan = Plan::where('plan_name', $this->package)->first();
        // Get Subscriber
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        // Get the service type
        if ($this->package == 'daily') {
            $serviceType = 'D';
        } elseif ($this->package == 'weekly') {
            $serviceType = 'W';
        } else {
            $serviceType = 'M';
        }
        $purchasePlanDetail = [
            'plan_id' => $plan->id,
            'subscriber_id' => $subscriber->id,
            'service_type' => $serviceType,
            'autorenew' => $this->autorenewal,
            'refid' => $subscriber->id,
            'confirmed_by_user' => 1,
        ];
        //---sub api call
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'charset' => 'UTF-8',
        ])->post('http://wap.teletalk.com.bd/napgames/napsubjson.php', [
            'msisdn' => $subscriber->phone_num,
            'servicename' => 'NapTechGames',
            'subservicename' => 'NapTechGames',
            'servicetype' => $serviceType,
            'groupid' => $this->autorenewal,
            'refid' => $subscriber->id,
        ]);
        dd(json_decode($response));
        // Get response from API
        $result = json_decode($response);
        if ($result->result_code == 0) {
            PurchasePlan::create($purchasePlanDetail);
            $this->emit('packageFinish');
        } else {
            return redirect()->route('home')->with('error', 'Plan Subscription failed! Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.frontend.subscription-popup');
    }
}
