<div wire:ignore.self class="modal fade" id="subscription" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth" role="document">
        <div class="modal-content bg">
            <img src="{{ asset('assets/frontend/img/x.png') }}" data-dismiss="modal" class="close-btn">
            <section class="packagePopup__body">
                <form wire:submit.prevent='next' method="get">
                    <section id="packagePopup">
                        <div id="topHeading">
                            <span>Packages</span>
                        </div>
                        <div id="title">
                            Available plans
                        </div>
                        <section id="packageName">
                            <div class="package">
                                <label class="container">5<small>TK</small><span class="pkg__duration">1
                                        day</span>
                                    <input type="radio" name="plan_name" value="daily" wire:model.lazy="package">
                                    <span class="checkmark"></span></label>
                                    <p>Charges apply</p>
                            </div>
                            <div class="package">
                                <label class="container">25<small>TK</small><span class="pkg__duration">7
                                        days</span>
                                    <input type="radio" name="plan_name" value="weekly" wire:model.lazy="package">
                                    <span class="checkmark"></span></label>
                                    <p>Charges apply</p>
                            </div>
                            <div class="package">
                                <label class="container">50<small>TK</small><span class="pkg__duration">30
                                        days</span>
                                    <input type="radio" name="plan_name" value="monthly" wire:model.lazy="package">
                                    <span class="checkmark"></span></label>
                                    <p>Charges apply</p>
                            </div>
                        </section>
                        <div id="bottomContents">
                            <span id="afterPackage_note">You will find amazing games to play !!</span>
                           
                                <div id="renewalCheckbox">
                                    <label class="renewal">
                                    
                                    <div class="check_img">
                                    <img class="img"
                                            src="{{ asset('assets/frontend/img/r8-tick2.png') }}">
                                    </div>
                                    Autorenewal
                                       
    
                                        
                                    </label>
                                </div>
                          
                            <span id="beforeButton_note">You can play all the amazing games as long as <br> subscription
                                active.</span>
                            <button type="submit">Proceed</button>
                        </div>
                    </section>
                </form>
            </section>
        </div>
    </div>
</div>
