@extends('frontend.layouts.app')

@section('styles')
    <style>
        footer#footer {
            background-color: #18212b;
        }

        .taandtm__rr--item img {
            width: 100%;
            height: auto;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            background-color: #18212b;
            height: 150px;
        }

    </style>
@endsection

@section('content')
    <!-- ------------------------- Top Action And Top Multiplayer Start ---------------------- -->
    <section id="taandtm" class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-12 col-md-12  taandtm__rr--items">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h2 class="section__header--title" data-aos="fade-left">Games</h2>
                        </div>
                        @foreach ($games as $game)
                            <div class="col-md-2 col-4 taandtm__rr--item" data-aos="zoom-in">
                                <div class="card-hover">
                                    <a 
                                    href="@if ($logIn == 1 && (!empty($purchasePlanDetail) || $game->is_free)){{ route('game', $game->game_file) }} @else # @endif"
                                    target="_blank"
                                    @if($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription"  @endif
                                    >
                                        <img class=" taandtm__rr--img" src="{{ asset($game->game_thumbnail) }}" alt="{{ $game->game_name }}">
                                        <h3 class="taandtm__rr--title">{{ $game->game_name }}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ------------------------- Top Action And Top Multiplayer End ---------------------- -->
@endsection
