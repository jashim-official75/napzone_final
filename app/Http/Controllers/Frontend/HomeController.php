<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function home(Request $request)
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
        $freeGames =  Game::where('is_free', 1)->where('is_exclusive', 0)->get();
        $multiPlayerGame = Game::where('is_free', 0)->where('is_exclusive', 0)->take(12)->get();
        $exclusiveGames = Game::where('is_free', 0)->with('FavoriteGame')->where('is_exclusive', 1)->get();
        $allGames = Game::latest()->get();
        return view('frontend.pages.home', compact('freeGames', 'multiPlayerGame', 'exclusiveGames', 'logIn', 'purchasePlanDetail', 'allGames', 'subscriber'));
    }
    public function game(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        // Check if user is subscribed or not.
        $subscriber = Subscriber::where('token', $accessor)->first();
        if ($subscriber) {
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)
                ->where('end_at', '>', Carbon::now())
                ->latest()
                ->first();
        } else {
            $purchasePlanDetail = null;
        }
        $games = Game::all();
        return view('frontend.pages.searchGames', compact('games', 'logIn', 'purchasePlanDetail'));
    }
    public function privacyPolicy(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        return view('frontend.pages.privacy-policy', compact('logIn'));
    }
    public function tos(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }
        // Check if user is subscribed or not.
        $subscriber = Subscriber::where('token', $accessor)->first();
        if ($subscriber) {
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)
                ->where('end_at', '>', Carbon::now())
                ->latest()
                ->first();
        } else {
            $purchasePlanDetail = null;
        }
        return view('frontend.pages.terms-condition', compact('logIn', 'purchasePlanDetail'));
    }
    public function faq(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }

        // Check if user is subscribed or not.
        $subscriber = Subscriber::where('token', $accessor)->first();
        if ($subscriber) {
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)
                ->where('end_at', '>', Carbon::now())
                ->latest()
                ->first();
        } else {
            $purchasePlanDetail = null;
        }
        return view('frontend.pages.faq', compact('logIn', 'purchasePlanDetail'));
    }

    public function gamePlay(Request $request)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            $logIn = 1;
        } else {
            $logIn = 0;
        }

        // Check if user is subscribed or not.
        $subscriber = Subscriber::where('token', $accessor)->first();
        if ($subscriber) {
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)
                ->where('end_at', '>', Carbon::now())
                ->latest()
                ->first();
        } else {
            $purchasePlanDetail = null;
        }

        return view('frontend.pages.gameplay', compact('logIn', 'purchasePlanDetail'));
    }

    //---test function----
    public function test_subscription()
    {
        return view('test_sub');
    }

    public function test_sub_store()
    {
        $phone_number = "01580150519";
        $result = Http::get('http://wap.teletalk.com.bd/napgames/napsubjson.php', [
            'msisdn' => $phone_number,
            'servicename' => 'NapTechGames',
            'subservicename' => 'NapTechGames',
            'servicetype' => "W",
            'groupid' => 1,
            'refid' => 1,
        ]);
        dd(json_decode($result));
    }
}
