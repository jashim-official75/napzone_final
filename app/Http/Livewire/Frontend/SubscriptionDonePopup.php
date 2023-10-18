<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use Livewire\Component;
use Illuminate\Http\Request;

class SubscriptionDonePopup extends Component
{
    public $number = '01500000000';

    public function mount(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        $this->number = $subscriber->phone_num ?? '01500000000';
    }

    public function done()
    {
        return redirect()->route('home')->with('success', 'If all games are not unlocked yet, Please refresh the webpage.');
    }
    public function render()
    {
        return view('livewire.frontend.subscription-done-popup');
    }
}
