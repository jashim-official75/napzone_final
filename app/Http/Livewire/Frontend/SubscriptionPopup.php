<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Plan;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Illuminate\Http\Request;
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
        $subsecriber = Subscriber::where('token', $accessor)->first();

        // Get the service type
        if ($this->package == 'daily') {
            $serviceType = 'D';
        } elseif ($this->package == 'weekly') {
            $serviceType = 'W';
        } else {
            $serviceType = 'M';
        }

        // FigureOut the Autorenewal
        if (!$this->autorenewal) {
            $autorenewal = 0;
        } else {
            $autorenewal = 1;
        }

        $purchasePlanDetail = [
            'plan_id' => $plan->id,
            'subscriber_id' => $subsecriber->id,
            'service_type' => $serviceType,
            'autorenew' => $autorenewal,
            'refid' => $subsecriber->id,
        ];

        if (PurchasePlan::create($purchasePlanDetail)) {
            $this->emit('package');
        }
    }


    public function render()
    {
        return view('livewire.frontend.subscription-popup');
    }
}
