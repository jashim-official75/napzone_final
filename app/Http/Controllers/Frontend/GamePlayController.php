<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GamePlay;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamePlayController extends Controller
{
    public function game(Request $request, $gameName)
    {
        $accessor = $request->session()->get('accessor');

        if ($accessor) {

            $subscriber = Subscriber::where('token', $accessor)->first();
            $game = Game::where('game_file', $gameName)->first();

            $response = Http::get('https://games.napzone.games/' . $gameName . '/', [
                'token' => $accessor,
                'subscriber_id' => $subscriber->id,
                'game_id' => $game->id,
            ]);
            return $response;
        } else {
            return redirect()->route('home');
        }
    }
}
