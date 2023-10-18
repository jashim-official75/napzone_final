<div wire:ignore.self class="modal fade" id="packageDone" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered fixwidth" role="document">
        <div class="modal-content bg">
            <img src="{{ asset('assets/frontend/img/x.png') }}" data-dismiss="modal" class="close-btn">
            <section class="packagePopup__body">
                <section id="packagePopup">
                    <div id="topHeading">
                        <span id="headingNote">Final</span>
                        <p id="confirmationNote">A confirmation message is sent to {{ $number ?? '01500000000' }}, to
                            make the
                            process
                            complete type "Y" and send us back. After that please refresh the website. Now BOOM! Enjoy
                            all games.</p>
                    </div>
                    <div class="confirmationsBtn">
                        <form wire:submit.prevent='done'>
                            <button type="submit" class="conBtn">Done</button>
                        </form>
                    </div>
                </section>
        </div>
    </div>
</div>
