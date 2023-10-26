@extends('frontend.layouts.app')
@section('styles')
@endsection
@section('content')
    <section class="gamePlay">
        <div class="gamePlayscreen">
            <iframe src="{{ asset('AllGames/'.$game->game_file) }}" frameborder="0" height="100%" width="100%"
                id="gameframe"></iframe>
            <div class="gameBottom">
                <a href="#" class="gameName" title="Game Name">{{ $game->game_name }}</a>
                <span class="gameTotalPlay">Total Play : {{ $game->total_play }}</span>
                <div class="fullscreenBtn" title="Fullscreen">
                    <img src="{{ asset('assets/frontend/img/fullscreen.png') }}" alt=""
                        onclick="DesktopfullscreenIframe()">
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="gamePlaydescription">
        <div class="container">
            <div class="gamescontent">
                <article>
                    <main>
                        <h2>Game Descripiton</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic eveniet ducimus, omnis quisquam
                            libero quia consectetur dignissimos quasi asperiores esse similique aspernatur illum commodi
                            laborum consequatur saepe, voluptatem repellat! Maxime corporis repudiandae vitae sapiente, fuga
                            eum ipsa ab unde vel autem? Dolor cum vero excepturi neque, architecto numquam autem
                            dignissimos, id beatae voluptas deserunt. Hic, aspernatur. Velit sint voluptate sapiente
                            reiciendis itaque quod adipisci praesentium rerum ullam pariatur libero eum id officia dolorem
                            saepe quam laudantium aliquam, dignissimos impedit expedita ipsa unde distinctio error quis?
                            Tempora officia atque esse quo earum cum rem non eligendi quis praesentium consequuntur nesciunt
                            nam doloremque itaque facere ut iusto eaque tempore illo, rerum unde. Ullam iusto voluptate
                            nobis, nostrum culpa quibusdam hic. Laborum laboriosam iste ducimus consequatur adipisci,
                            sapiente totam. Molestiae sapiente delectus quia minima, ea doloremque soluta possimus aperiam
                            debitis quos, quaerat dolore nam iusto vitae obcaecati nemo? Nisi vitae sint molestiae delectus
                            earum at, velit doloremque esse tempora, voluptate natus perferendis explicabo exercitationem
                            itaque quod nobis quisquam sit amet aperiam temporibus blanditiis nam, fuga labore. Quasi illum
                            maiores labore veritatis vero, fugit soluta iste qui exercitationem blanditiis. Similique
                            impedit optio illo dignissimos. Autem sit dolorem omnis mollitia eligendi maiores accusantium
                            deserunt. Totam.</p>
                    </main>
                </article>
            </div>
        </div>
    </div> --}}
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
                                <img class="card-img-top"
                                    src="{{ asset($game->game_thumbnail) }}"
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
                                    {{-- @if ($logIn == 0)
                                        <span class="favorite_icon" data-toggle="modal" data-target="#login">
                                            <i class="fas fa-heart"></i>
                                        </span>
                                    @else
                                        @if (!empty($purchasePlanDetail))
                                            @php
                                                $fGame = App\Models\FavoriteGame::where('subscriber_id', $subscriber->id)
                                                    ->where('game_id', $game->id)
                                                    ->first();
                                            @endphp
                                            @if ($fGame)
                                                <span class="favorite_icon fgame" id="favorite_icon"
                                                    title="remove favorite game" data-user="{{ $subscriber->id }}"
                                                    data-id="{{ $game->id }}">
                                                    <i class="fas fa-heart"></i>
                                                </span>
                                            @else
                                                <span class="favorite_icon fgame" id="favorite_icon"
                                                    title="add favorite game" data-user="{{ $subscriber->id }}"
                                                    data-id="{{ $game->id }}">
                                                    <i class="far fa-heart"></i>
                                                </span>
                                            @endif
                                        @else
                                            <span class="favorite_icon" data-toggle="modal" data-target="#subscription">
                                                <i class="fas fa-heart"></i>
                                            </span>
                                        @endif
                                    @endif --}}
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
