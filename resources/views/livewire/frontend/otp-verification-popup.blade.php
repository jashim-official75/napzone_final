<div wire:ignore.self class="modal fade" id="login2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-color">
            <div class="form-container">
                <span class="form-container__title">
                    Verify OTP
                </span>
                <form wire:submit.prevent='verify' method="get">
                    <span id="userMgs">
                        A 4 Digit code will be send to
                        <number>
                            {{ $number }}
                        </number>
                    </span>

                    @error('otp')
                        <span class="error" style="color: red;">{{ $message }}</span>
                    @enderror
                    @if ($otpResult == 1)
                        <span class="error" style="color: red;">You have entered wrong OTP!</span>
                    @elseif($otpResult == 2)
                        <span class="error" style="color: red;">OTP expired! Resend it.</span>
                    @endif
                    <div class="form-group d-flex justify-content-center align-items-center">
                        <span id="sequence">{!! $sequence . ' -  ' !!}</span>
                        <input type="text" class="form-control" id="otp" aria-describedby="emailHelp"
                            placeholder="Inter the 4-Digit Code" style="width: 100%;" wire:model.lazy='otp'>
                    </div>
                    <button type="submit" class="btn">Submit</button>
                </form>
                <div class="form-container__option">
                    @if (!$resend)
                        <span id="beforeResend">You didn't get the otp! Resend button will appear within 1min.</span>
                        <div id="resend" style="display:none">
                            <span>
                                Didn't get the code?
                            </span>
                            <a wire:click='resend' class="resend-btn">Resend</a>
                        </div>
                    @else
                        <span id="beforeResend">OTP has been sent. Please check your phone.</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
