<div wire:ignore.self class="modal fade" id="login" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-color">
            <div class="form-container">
                <span class="form-container__title">
                    Log In or Register
                </span>
                <form wire:submit.prevent='login' mthod="get">
                    <div class="form-group">
                        @error('phoneNumber')
                            <span class="error" style="color: red;">{{ $message }}</span>
                        @enderror
                        <input type="text" class="form-control" id="phoneNumber" name="phone"
                            aria-describedby="emailHelp" placeholder="Your TeleTalk Number"
                            wire:model.lazy='phoneNumber'>
                    </div>
                    <button type="submit" class="btn">Log In</button>
                </form>
                <div class="form-container__option">
                    <span>
                        Note: Only TeleTalk Number is Accepted.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
