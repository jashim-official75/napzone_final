<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\Support;
use Illuminate\Http\Request;

class GamePlayedController extends Controller
{
    public function subscriberGamePlayed(Request $request, $phoneNum)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        $playedGames = Subscriber::where('phone_num', $phoneNum)->first()->gamePlayed;

        return view('backend.pages.subscriber.playedGame',  compact('playedGames', 'notification'));
    }
    public function allGamePlayed(Request $request)
    {
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        return view('backend.pages.played_game.Played-game', compact('notification'));
    }
}
