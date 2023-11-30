@extends('frontend.layouts.app')
@section('styles')
@endsection
@section('content')
    <section class="gamePlay">
        <div class="gamePlayscreen">
            <iframe src="{{ asset('AllGames/' . $game->game_file) }}" frameborder="0" height="100%" width="100%"
                id="gameframe"></iframe>
            <div class="gameBottom">
                <a href="#" class="gameName" title="Game Name">{{ $game->game_name }}</a>
                <span class="gameTotalPlay"> <img src="{{ asset('assets/frontend/img/gameplay.png') }}" alt=""
                    >Total Play : {{ $game->total_play }}</span>
                <div class="fullscreenBtn" title="Fullscreen">
                    <img src="{{ asset('assets/frontend/img/fullscreen.png') }}" alt=""
                        onclick="DesktopfullscreenIframe()">
                </div>
            </div>
        </div>
    </section>
    <div class="gamePlaydescription">
        <div class="container">
            <div class="gamescontent">
                <article>
                    <main>
                        <h2>Game Descripiton</h2>
                        <p>{{ $game->description }}</p>
                    </main>
                </article>
            </div>
        </div>
    </div>
    <!-- ------------------------- Related games Section Start ---------------------- -->
    <section id="exgame">
        <div class="container bg-color">
            <div class="row section__header">
                <div class="col-12 ">
                    <h2 class="section__header--title pt-5" data-aos="fade-left"> <span><i
                                class="fas fa-gamepad"></i></span> Related Games</h2>
                </div>
            </div>
            <div class="row p-4">
                @foreach ($allGames->take(4) as $game)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-6 card exgame__item" data-aos="zoom-in-up">
                        <div class="card-hover border-rad">
                            <a href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game.play', $game->game_file) }} @else # @endif"
                                class="game-btn"
                                @if ($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription" @endif>
                                <img class="card-img-top" src="{{ asset($game->game_thumbnail) }}"
                                    alt="{{ $game->game_name }}">
                            </a>
                            <div class="card-body">
                                <h2 class="card-title">{{ $game->game_name }}</h2>
                                <div class="card-bottom d-flex align-items-center justify-content-between">
                                    @foreach ($game->gameCategories->take(1) as $category)
                                        <a class="btn"
                                            href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game.play', $game->game_file) }} @else # @endif"
                                            style="text-transform: capitalize">{{ $category->categoryName->category_name }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ------------------------- Related games Section End ---------------------- -->
@endsection
@section('scripts')
    <script>
        function DesktopfullscreenIframe() {
            var iframe = document.querySelector('#gameframe');
            iframe.requestFullscreen();
        }
    </script>
@endsection
