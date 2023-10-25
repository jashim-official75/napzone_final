<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryControler;
use App\Http\Controllers\Backend\GameController;
use App\Http\Controllers\Backend\GamePlayedController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SearchAndCategoryController;
use App\Http\Controllers\Frontend\SubscriberController as FrontendSubscriberController;
use App\Http\Controllers\Backend\SubscriberController as BackendSubscriberController;
use App\Http\Controllers\Frontend\GamePlayController;
use App\Http\Controllers\Frontend\SupportController as FrontendSupportController;
use App\Http\Controllers\Backend\SupportController as BackendSupportController;
use App\Http\Controllers\Frontend\FavoriteGameController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//---test route----
Route::get('/test_subscriber', [HomeController::class, 'test_subscription'])->name('test_subscriber');
Route::post('/test_subscriber', [HomeController::class, 'test_sub_store'])->name('test_sub_store');
//----text route end---
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/all-games', [HomeController::class, 'game'])->name('games');
Route::get('/logout', [FrontendSubscriberController::class, 'logout'])->name('logout');
Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
Route::post('/profile/{id}', [ProfileController::class, 'profile_update'])->name('user.profile.update');
Route::get('/search', [SearchAndCategoryController::class, 'search'])->name('search');
Route::get('/category/{categoryName}', [SearchAndCategoryController::class, 'category'])->name('category');
Route::get('/game/{categoryName}', [SearchAndCategoryController::class, 'category'])->name('category');
Route::get('/games/{gameName}/play', [GamePlayController::class, 'game'])->name('game');
Route::get('/game_play', [GamePlayController::class, 'play'])->name('game.play');
Route::post('/game/favorite', [FavoriteGameController::class, 'favorite_game']);
Route::get('/ip',function(){
    // echo $_SERVER['SERVER_ADDR'];
    echo request()->getClientIp();
    // echo "Test";
});
Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacyPlicy');
Route::get('/gameplay', [HomeController::class, 'gamePlay'])->name('gamePlay');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/terms-and-conditions', [HomeController::class, 'tos'])->name('tos');
Route::get('/support', [FrontendSupportController::class, 'show'])->name('support');
Route::post('/support', [FrontendSupportController::class, 'submit'])->name('support.submit');
###########################################################################
##############################  Admin Panel ###############################
###########################################################################
Route::get('/admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'loginProcess'])->name('admin.login.process');
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::get('/', [BackendController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/support', [BackendSupportController::class, 'show'])->name('dashboard.support');
    Route::post('/support/mark/{supportId}', [BackendSupportController::class, 'makeMark'])->name('dashboard.support.mark');
    Route::get('/support/unread', [BackendSupportController::class, 'unread'])->name('dashboard.support.unread');
    Route::get('/category', [CategoryControler::class, 'index'])->name('dashboard.category');
    Route::post('/category', [CategoryControler::class, 'add'])->name('dashboard.category.add');
    Route::delete('/category/{category}', [CategoryControler::class, 'destroy'])->name('dashboard.category.destroy');
    Route::get('/game', [GameController::class, 'show'])->name('dashboard.game.show');
    Route::delete('/game/{game}', [GameController::class, 'destroy'])->name('dashboard.game.destroy');
    Route::get('/game/add', [GameController::class, 'add'])->name('dashboard.game.add');
    Route::post('/game/add', [GameController::class, 'store'])->name('dashboard.game.store');
    Route::get('/game/edit/{game}', [GameController::class, 'edit'])->name('dashboard.game.edit');
    Route::put('/game/edit/{game}', [GameController::class, 'update'])->name('dashboard.game.update');
    Route::get('/subscriber', [BackendSubscriberController::class, 'show'])->name('dashboard.subscribers');
    Route::get('/subscriber/{phoneNum}', [GamePlayedController::class, 'subscriberGamePlayed'])->name('dashboard.subscriber.gamePlayed');
    Route::get('/all-game-played', [GamePlayedController::class, 'allGamePlayed'])->name('dashboard.subscribers.gamePlayed');
    Route::get('/purchase-plan', [BackendSubscriberController::class, 'purchasePlans'])->name('dashboard.subscribers.purchasePlans');
});



