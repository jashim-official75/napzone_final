@extends('frontend.layouts.app')

@section('styles')
    <style>
        footer#footer {
            background-color: #18212b;
        }

        .sub-sub-heading {
            color: #f2b705;
            font-size: 1.2rem;
        }

        .list-heading {
            color: #f2b705;
        }

    </style>
@endsection

@section('content')
    <!-- ------------------------- GAMEPLAY SCREEN START ---------------------- -->
    <section id="gamePlay">
  <div class="container">
    <div class="row pb-5">
      <div class="col-md-12">
        <div class="Gameplayground">
          <iframe src="https://html5.gamedistribution.com/571b9df027e449f78e3869ba19658754/?gd_sdk_referrer_url=https://www.naptechgames.com/game/penalty-shooters-2" frameborder="0" height="100%" width="100%" id="gameplayScreen" scrolling="no"></iframe>
          <div class="game_topbar">
            <div class="game_name">
              <a href="https://naptechgames.com/game/penalty-shooters-2" title="Penalty Shooters 2"> <span class="naptechgames_icon">
                  <img src="https://img.gamedistribution.com/571b9df027e449f78e3869ba19658754-512x512.jpeg" alt="Penalty Shooters 2" alt="Penalty Shooters 2 Online Sports Games on NaptechGames.com" title="Penalty Shooters 2 is the Best Online Sports Games to Play Free on NapTechGames.com">
                </span>
                Penalty Shooters 2</a>
            </div>
            <div id="fullsecreen_btn" title="Press "F" Get Fullscreen">
              <div class="fullscreen" title="Fullscreen">
                <i class="fas fa-expand" id="fullscrn_btn"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 <!-- ------------------------- GAMEPLAY SCREEN END ---------------------- -->

@endsection
