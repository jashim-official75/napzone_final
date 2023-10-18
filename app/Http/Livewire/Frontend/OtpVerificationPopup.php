<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class OtpVerificationPopup extends Component
{
    public $number;
    public $sequence;
    public $otp;
    public $otpResult;
    public $otpExpireTime;
    public $resend;
    protected $rules = [
        'otp' => ['required', 'digits:4', 'numeric'],
    ];

    protected $listeners = ['refresh' => 'refresh'];

    public function refresh(Request $request)
    {
        $this->number = $request->session()->get('number');
        $this->sequence = $request->session()->get('sequence');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Request $request)
    {
        $this->number = $request->session()->get('number');
        $this->sequence = $request->session()->get('sequence');
        $this->otpResult = "";
        $this->otpExpireTime = time() + 300;
        $this->resend = false;
    }

    public function verify(Request $request)
    {
        $this->validate();
        $otpFromSystem = $request->session()->get('otp');
        $otpFromUser = $this->otp;
        $userNumber = $request->session()->get('number');

        if ((strlen($userNumber) == 13) && substr($userNumber, 0, 5) == "88015") {
            $strPhone = $userNumber;
        } else if ((strlen($userNumber) == 14) && substr($userNumber, 0, 6) == "+88015") {
            $strPhone = substr($userNumber, 1);
        } else if ((strlen($userNumber) == 15) && substr($userNumber, 0, 7) == "0088015") {
            $strPhone = substr($userNumber, 2);
        } else if ((strlen($userNumber) == 11) && substr($userNumber, 0, 3) == "015") {
            $strPhone = "88" . $userNumber;
        } else if ((strlen($userNumber) == 10) && substr($userNumber, 0, 2) == "15") {
            $strPhone = "880" . $userNumber;
        } else {
            $strPhone = $userNumber;
        }

        if ($this->otpExpireTime > time()) {
            if ($otpFromSystem == $otpFromUser) {
                $subscriber = Subscriber::where('phone_num', $strPhone)->first();
                $subscriber->otp_verified = 1;
                $subscriber->save();
                $request->session()->put('accessor', $subscriber->token);
                return redirect()->route('home');
            } else {
                $this->otpResult = 1;
            }
        } else {
            $this->otpResult = 2;
        }
    }



    public function resend(Request $request)
    {
        $subscriber = Subscriber::where('phone_num', $this->number)->first();
        $otp = rand(1000, 9999);
        $this->sequence = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 2);
        $request->session()->put('otp', $otp);
        $request->session()->put('sequence', $this->sequence);

        $sendOTP = Http::get('http://wap.teletalk.com.bd/napgames/napotpsmsjson.php', [
            'msisdn' => $subscriber->phone_num,
            'sequence' => $this->sequence,
            'otp' => $otp,
            'refid' =>  $subscriber->id,
        ]);

        $this->resend = true;
    }

    public function render()
    {
        return view('livewire.frontend.otp-verification-popup');
    }
}
