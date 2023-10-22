<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FavoriteGame;
use Illuminate\Http\Request;

class FavoriteGameController extends Controller
{
    //---favorite_game
    public function favorite_game(Request $request)
    {
        $game_id = $request->game_id;
        $user_id = $request->user_id;
        $same_game = FavoriteGame::where('subscriber_id', $user_id)->where('game_id', $game_id)->first();
        if($same_game){
            $same_game->delete();
        }else{
            $favoriteGame = new FavoriteGame();
            $favoriteGame->subscriber_id = $user_id;
            $favoriteGame->game_id = $game_id;
            if($favoriteGame->save()){
                return response()->json('Favorite Game Added Successfully.');
            }else{
                return response()->json('Something Wrong!.');
            }
        }
    }
}
