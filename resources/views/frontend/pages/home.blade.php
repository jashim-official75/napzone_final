@extends('frontend.layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <style>
        .favorite_icon {
            color: #f2b705;
            font-size: 24px;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <!-- ------------------------carousel slider---------------------  -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('assets/frontend/img/napzone-hero-bg.webp') }}" alt="First slide">
            </div>
        </div>
        <div class="container">
            <div class="row">
                @if ($logIn == 0)
                    <div id="carouselContent">
                        <span class="carouselContent__heading">
                            <p id="title" class="dancing-in-text" style="animation-delay:500ms">Exclusive Games</p>
                        </span>
                        <span class="carouselContent__names">
                            <p>Subscribe now and get access to exclusive games.</p>
                        </span>
                        <span class="bounce-in-text mt-4">
                            <a href="#" class="btn__primary" data-toggle="modal"
                            data-target="#login">LogIn Now</a>
                        </span>
                    </div>
                @else
                    @if (!empty($purchasePlanDetail))
                        <div id="carouselContent">
                            <span class="carouselContent__heading">
                                <p id="title" class="dancing-in-text" style="animation-delay:500ms">Exclusive Games</p>
                                <p>You Can Access Any Where & Any Device</p>
                                <p>Enjoy Ad Free Games</p>
                                <span class="bounce-in-text mt-4">
                                    <a href="#exgame" class="btn__primary">Play Now</a>
                                </span>
                            </span>
                        </div>
                    @else
                        <div id="carouselContent">
                            <span class="carouselContent__heading">
                                <p id="title" class="dancing-in-text" style="animation-delay:500ms">Exclusive Games</p>
                            </span>
                            <span class="carouselContent__names">
                                <p>Subscribe now and get access to exclusive games.</p>
                            </span>
                            <span class="bounce-in-text mt-4">
                                <a href="#" class="btn__primary" data-toggle="modal"
                                data-target="#login">Subscribe Now</a>
                            </span>
                        </div>
                    @endif
                @endif
            </div>
        </div>

    </div>
    <!-- -----------------------------------------slider end------------------------- -->

    <!-- ------------------------- Top Action And Top Multiplayer Start ---------------------- -->
    @if (empty($purchasePlanDetail))
        <section id="taandtm" class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-md-12  taandtm__rr--items">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h2 class="section__header--title pt-0" data-aos="fade-left"> <span><i class="fas fa-users"></i></span> Popular Games</h2>
                            </div>
                            @foreach ($multiPlayerGame as $game)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 taandtm__rr--item" data-aos="zoom-in-up">
                                    <div class="card-hover">
                                        <a href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                            target="_blank"
                                            @if ($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription" @endif>
                                            <img class="taandtm__rr--img"
                                                src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                                alt="{{ $game->game_name }}">
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
    @else
        <section id="taandtm" class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-md-12  taandtm__rr--items">
                        <div class="row">
                            <div class="col-12 mb-5">
                                <h2 class="section__header--title pt-0" data-aos="fade-left"> <span><i class="fas fa-heart"></i></span> Favourite Games</h2>
                            </div>
                            @foreach ($multiPlayerGame as $game)
                                <div class="col-xl-2 col-lg-3 col-md-4 col-6 taandtm__rr--item" data-aos="zoom-in-up">
                                    <div class="card-hover">
                                        <a href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                            target="_blank"
                                            @if ($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription" @endif>
                                            <img class="taandtm__rr--img"
                                                src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                                alt="{{ $game->game_name }}">
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
    @endif
    <!-- ------------------------- Top Action And Top Multiplayer End ---------------------- -->
    @if (empty($purchasePlanDetail))
        <!-- ------------------------- Exgame Section Start ---------------------- -->
        <section id="exgame" class="section">
            <div class="container bg-color">
                <div class="row section__header">
                    <div class="col-12 ">
                        <h2 class="section__header--title pt-5" data-aos="fade-left"> <span><i class="fas fa-crown"></i></span> Exclusive Games</h2>
                    </div>
                </div>
                <div class="row p-4">
                    @foreach ($exclusiveGames as $game)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-6 card exgame__item" data-aos="zoom-in-up">
                            <div class="card-hover border-rad">
                                <a href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                    class="game-btn" target="_blank"
                                    @if ($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription" @endif>
                                    <img class="card-img-top"
                                        src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                        alt="{{ $game->game_name }}">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $game->game_name }}</h2>
                                        <div class="card-bottom d-flex align-items-center justify-content-between">
                                            @foreach ($game->gameCategories as $category)
                                                <a class="btn"
                                                    href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                                    style="text-transform: capitalize">{{ $category->categoryName->category_name }}</a>
                                            @endforeach
                                            @if ($logIn == 0)
                                                <span class="favorite_icon" data-toggle="modal" data-target="#login">
                                                    <i class="fas fa-heart"></i>
                                                </span>
                                            @else
                                                @if (!empty($purchasePlanDetail))
                                                    <span class="favorite_icon fgame" id="favorite_icon"
                                                        data-user="{{ $subscriber->id }}" data-id="{{ $game->id }}">
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                @else
                                                    <span class="favorite_icon" data-toggle="modal"
                                                        data-target="#subscription">
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ------------------------- Exgame Section End ---------------------- -->
    @else
        <!-- ------------------------- all games Section Start ---------------------- -->
        <section id="exgame" class="section">
            <div class="container bg-color">
                <div class="row section__header">
                    <div class="col-12 ">
                        <h2 class="section__header--title pt-5" data-aos="fade-left"> <span><i class="fas fa-gamepad"></i></span> All Games</h2>
                    </div>
                </div>
                <div class="row p-4">
                    @foreach ($allGames as $game)
                        <div class="col-xl-3 col-lg-4 col-md-4 col-6 card exgame__item" data-aos="zoom-in-up">
                            <div class="card-hover border-rad">
                                <a href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                    class="game-btn" target="_blank"
                                    @if ($logIn == 0) data-toggle="modal" data-target="#login" @elseif(!$game->is_free && empty($purchasePlanDetail)) data-toggle="modal" data-target="#subscription" @endif>
                                    <img class="card-img-top"
                                        src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                        alt="{{ $game->game_name }}">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $game->game_name }}</h2>
                                        <div class="card-bottom d-flex align-items-center justify-content-between">
                                            @foreach ($game->gameCategories as $category)
                                                <a class="btn"
                                                    href="@if ($logIn == 1 && !empty($purchasePlanDetail)) {{ route('game', $game->game_file) }} @else # @endif"
                                                    style="text-transform: capitalize">{{ $category->categoryName->category_name }}</a>
                                            @endforeach
                                            @if ($logIn == 0)
                                                <span class="favorite_icon" data-toggle="modal" data-target="#login">
                                                    <i class="fas fa-heart"></i>
                                                </span>
                                            @else
                                                @if (!empty($purchasePlanDetail))
                                                    <span class="favorite_icon fgame" id="favorite_icon"
                                                        data-user="{{ $subscriber->id }}" data-id="{{ $game->id }}">
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                @else
                                                    <span class="favorite_icon" data-toggle="modal"
                                                        data-target="#subscription">
                                                        <i class="fas fa-heart"></i>
                                                    </span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- ------------------------- all games Section End ---------------------- -->
    @endif
    <!-- ------------------------- Trailer & Gameplay Section Start ---------------------- -->
    <section id="tandg" class="section">
        <div class="container bg-color">
            <div class="row section__header ">
                <div class="col-12 ">
                    <h2 class="section__header--title pt-5" data-aos="fade-left"> <span><i class="fas fa-play-circle"></i></span> Trailer & Gameplay</h2>
                </div>
            </div>
            <div class="container">
                <div class="row tandg__items">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a class="tandg__item" href="https://www.youtube.com/watch?v=UkR_vbwl_Ws" target="_blank">
                            <img class="tandg__item--banner" src="https://img.youtube.com/vi/UkR_vbwl_Ws/hqdefault.jpg"
                                alt="">
                            <img class="tandg__item--icon"
                                src="{{ asset('assets/frontend/img/tandg_youtube_icon.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a class="tandg__item" href="https://www.youtube.com/watch?v=juh6AguSGho" target="_blank">
                            <img class="tandg__item--banner" src="https://img.youtube.com/vi/juh6AguSGho/hqdefault.jpg"
                                alt="">
                            <img class="tandg__item--icon"
                                src="{{ asset('assets/frontend/img/tandg_youtube_icon.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a class="tandg__item" href="https://www.youtube.com/watch?v=B3kbk5LPRhQ" target="_blank">
                            <img class="tandg__item--banner" src="https://img.youtube.com/vi/B3kbk5LPRhQ/hqdefault.jpg"
                                alt="">
                            <img class="tandg__item--icon"
                                src="{{ asset('assets/frontend/img/tandg_youtube_icon.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a class="tandg__item" href="https://www.youtube.com/watch?v=WXaZ7S4mGJo" target="_blank">
                            <img class="tandg__item--banner" src="https://img.youtube.com/vi/WXaZ7S4mGJo/hqdefault.jpg"
                                alt="">
                            <img class="tandg__item--icon"
                                src="{{ asset('assets/frontend/img/tandg_youtube_icon.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------- Trailer & Gameplay Section End ---------------------- -->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.tandg__item').magnificPopup({
                type: 'iframe'
            });
        });
        //----add favorite games
        $('.fgame').click(function() {
            const game_id = $(this).data('id');
            const user_id = $(this).data('user');
            $.ajax({
                type: 'POST',
                url: '/game/favorite',
                data: {
                    game_id: game_id,
                    user_id: user_id
                },
                success: function(response) {
                    alert(response)
                }
            });
        });
    </script>
@endsection
