<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use App\Models\SubscriberDetail;
use Livewire\Component;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginPopup extends Component
{
    public $phoneNumber;
    protected $rules = [
        'phoneNumber' => ['required', 'regex:/(^(\+8801|8801|01|008801))[5]{1}(\d){8}$/', 'min:10'],
    ];

    protected $messages = [
        'phoneNumber.required' => 'Phone Number is Required',
        'phoneNumber.regex' => 'Please Input TeleTalk Number Only',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login(Request $request)
    {
        $this->validate();
        // Agent Object call
        $agent = new Agent();
        // Subscriber Details
        $getDevice = '';

        if ($agent->isMobile()) {
            $getDevice = 'Mobile';
        } elseif ($agent->isTablet()) {
            $getDevice = 'Tablet';
        } elseif ($agent->isDesktop()) {
            $getDevice = 'Computer';
        }
        $browser = $agent->browser();
        $version = $agent->version($browser);
        $browserWithVersion = $browser . ' version: ' . $version;
        $platform = $agent->platform();
        $userIpAddress = $request->ip();

        // Make structured phone Number Like 8801500000000

        if ((strlen($this->phoneNumber) == 13) && substr($this->phoneNumber, 0, 5) == "88015") {
            $strPhone = $this->phoneNumber;
        } else if ((strlen($this->phoneNumber) == 14) && substr($this->phoneNumber, 0, 6) == "+88015") {
            $strPhone = substr($this->phoneNumber, 1);
        } else if ((strlen($this->phoneNumber) == 15) && substr($this->phoneNumber, 0, 7) == "0088015") {
            $strPhone = substr($this->phoneNumber, 2);
        } else if ((strlen($this->phoneNumber) == 11) && substr($this->phoneNumber, 0, 3) == "015") {
            $strPhone = "88" . $this->phoneNumber;
        } else if ((strlen($this->phoneNumber) == 10) && substr($this->phoneNumber, 0, 2) == "15") {
            $strPhone = "880" . $this->phoneNumber;
        } else {
            $strPhone = $this->phoneNumber;
        }

        if (Subscriber::where('phone_num', $strPhone)->count() == 0) {
            $subscriber = [
                'unique_id' => Str::random(6),
                'phone_num' => $strPhone,
                'otp_verified' => 0,
                'token' => Str::random(30),
            ];

            if (Subscriber::create($subscriber)) {
                $subscriber = Subscriber::where('phone_num', $strPhone)->first();

                $subscriberDetails = [
                    'subscriber_id' => $subscriber->id,
                    'device' => $getDevice,
                    'ip' => $userIpAddress,
                    'platform' => $platform,
                    'browser' => $browserWithVersion,
                ];
                $otp = rand(1000, 9999);
                $sequence = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
                $request->session()->put('otp', $otp);
                $request->session()->put('sequence', $sequence);
                $request->session()->put('number', $subscriber->phone_num);

                if (SubscriberDetail::create($subscriberDetails)) {



                    $sendOTP = Http::get('http://wap.teletalk.com.bd/napgames/napotpsmsjson.php', [
                        'msisdn' => $strPhone,
                        'sequence' => $sequence,
                        'otp' => $otp,
                        'refid' =>  $subscriber->id,
                    ]);
                    $this->emit('confirm');
                    $this->emit('saved');
                }
            }
        } else {
            $subscriber = Subscriber::where('phone_num', $strPhone)->first();

            $subscriberDetails = [
                'subscriber_id' => $subscriber->id,
                'device' => $getDevice,
                'ip' => $userIpAddress,
                'platform' => $platform,
                'browser' => $browserWithVersion,
            ];

            SubscriberDetail::create($subscriberDetails);

            if ($subscriber->otp_verified == 0) {

                $otp = rand(1000, 9999);
                $sequence = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
                $request->session()->put('otp', $otp);
                $request->session()->put('sequence', $sequence);
                $request->session()->put('number', $subscriber->phone_num);

                $sendOTP = Http::get('http://wap.teletalk.com.bd/napgames/napotpsmsjson.php', [
                    'msisdn' => $strPhone,
                    'sequence' => $sequence,
                    'otp' => $otp,
                    'refid' =>  $subscriber->id,
                ]);
                $this->emit('confirm');
                $this->emit('saved');
            } else {
                $request->session()->put('accessor', $subscriber->token);
                return redirect()->route('home');
            }
        }
    }

    public function render()
    {
        return view('livewire.frontend.login-popup');
    }
}
