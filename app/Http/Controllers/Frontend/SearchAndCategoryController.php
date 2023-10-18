<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\PurchasePlan;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use stdClass;

class SearchAndCategoryController extends Controller
{
    public function search(Request $request)
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
            $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('end_at', '>', Carbon::now())->latest()->first();
        } else {
            $purchasePlanDetail = null;
        }

        $search = $request->get('keyword');
        $games = Game::where('game_name', 'LIKE', '%' . $search . '%')->get();
        return view('frontend.pages.searchGames', compact('games', 'logIn', 'purchasePlanDetail'));
    }

    public function category(Request $request, $categoryName)
    {
        if (Category::where('category_name', $categoryName)->count() > 0) {
            $accessor = $request->session()->get('accessor');
            if (Subscriber::where('token', $accessor)->count() > 0) {
                $logIn = 1;
            } else {
                $logIn = 0;
            }
            $allGamesId = Category::where('category_name', $categoryName)->first()->allGameId;

            // Check if user is subscribed or not.
            $subscriber = Subscriber::where('token', $accessor)->first();
            if ($subscriber) {
                $purchasePlanDetail = PurchasePlan::where('subscriber_id', $subscriber->id)->where('end_at', '>', Carbon::now())->latest()->first();
            } else {
                $purchasePlanDetail = null;
            }

            return view('frontend.pages.categories', compact('allGamesId', 'logIn', 'purchasePlanDetail'));
        }
        return redirect()->route('home');
    }
}
