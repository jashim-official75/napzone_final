<div wire:ignore.self class="modal fade" id="subscriptionConfirm" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth" role="document">
        <div class="modal-content bg">
            <img src="{{ asset('assets/frontend/img/x.png') }}" data-dismiss="modal" class="close-btn">
            <section class="packagePopup__body">
                <section id="packagePopup">
                    <div id="topHeading">
                        <span id="headingNote">Confirmation</span>
                        <p id="confirmationNote">Are you sure want to submit a request to start the subscription?</p>
                    </div>
                    <div class="confirmationsBtn">
                        <form wire:submit.prevent='send'>
                            <button type="submit" class="conBtn">Yes</button>
                        </form>
                        <a data-dismiss="modal" class="conBtn">No</a>
                    </div>
                </section>
        </div>
    </div>
</div>
