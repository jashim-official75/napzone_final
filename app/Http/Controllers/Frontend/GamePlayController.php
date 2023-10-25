<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GamePlay;
use App\Models\PurchasePlan;
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

    //---play
    public function play(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        $subscriber = Subscriber::where('token', $accessor)->first();
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        //---check subscriber call api---
        $purchasePlanDetail = null;
        if ($subscriber) {
            $purchaseDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
            if ($purchaseDetail) {
                if ($purchaseDetail->autorenew) {
                    $autorenew = 1;
                } else {
                    $autorenew = 2;
                }
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'charset' => 'UTF-8',
                ])->post('http://wap.teletalk.com.bd/napgames/napgetstatusjson.php', [
                    "msisdn" => $subscriber->phone_num,
                    "servicename" => 'NapTechGames',
                    "subservicename" => 'NapTechGames',
                    'servicetype' => $purchaseDetail->service_type,
                    "groupid" => $autorenew,
                ]);
                // dd(json_decode($response));
                $result = json_decode($response);
                if ($result == null) {
                    $purchasePlanDetail = null;
                } elseif ($result->result_code == 400) {
                    $purchasePlanDetail = null;
                } elseif ($result->result_code == 0) {
                    $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('confirmed_by_user', 1)->latest()->first();
                }else{
                    $purchasePlanDetail = null;
                }
            }
        }
        return view('frontend.pages.game.play', compact('subscriber', 'logIn', 'purchasePlanDetail'));
    }
}
