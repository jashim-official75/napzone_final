<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoriteGameController extends Controller
{
    //---favorite_game
    public function favorite_game(Request $request)
    {
        $game_id = $request->game_id;
        $user_id = $request->user_id;
        
    }
}
