<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GamePlay;
use App\Models\Subscriber;
use App\Models\Support;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    function dashboard()
    {
        $games = Game::count();
        $subscriber = Subscriber::count();
        $gamePlayed = GamePlay::count();
        $notification = Support::where('contacted', 0)->orderByDesc('created_at')->take(3)->get();
        return view('backend.pages.dashboard.dashboard', compact('notification', 'subscriber', 'games', 'gamePlayed'));
    }
}
