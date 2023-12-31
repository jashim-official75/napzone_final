@extends('frontend.layouts.app')

@section('styles')
    <style>
        footer#footer {
            background-color: #18212b;
        }

    </style>
@endsection

@section('content')
    <!-- ------------------------- Top Action And Top Multiplayer Start ---------------------- -->
    <section id="supportZone">
  
        <div class="supportZone__form">
            @if (@session('success'))
                <h2 style="text-align: center; margin: 10px 0px;">Successfully submitted. We will reach you as soon as
                    possible.</h2>
            @else

                <form action="{{ route('support.submit') }}" method="POST">
                    <p id="title">NapZone Support Center</p>
                    @csrf
                    <label for="phonenumber"> Phone Number </label>
                    <div>
                        <input type="number" name="phone_num" class="@error('phone_num')is-invalid @enderror" id="phonenumber"
                            placeholder="Enter your subscription number" style="padding-left: 10px"
                            value="{{ old('phone_num') }}">
                    </div>
                    @error('phone_num')
                        <p class='error'>Invalid Phone Number</p>
                    @enderror

                    <div id="supportZone__form__prb_tab">
                        <label for="problemBox">Describe the Problem </label>
                        <textarea type="text" name="problem" id="problemBox" placeholder="Describe your problem..."
                            style="padding-left: 10px" value="{{ old('problem') }}"></textarea>
                    </div>
                    @error('problem')
                        <p class='error' style="margin-top: 0px !important">{{ $message }}</p>
                    @enderror
                    <div>
                        <button type="submit" class="btn__primary">Submit</button>
                    </div>
                </form>
            @endif
        </div>
    </section>
    <!-- ------------------------- Top Action And Top Multiplayer End ---------------------- -->
@endsection
