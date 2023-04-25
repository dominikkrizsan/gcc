<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CardController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\BotController;
use App\Http\Controllers\Guest\FrontendController;
use App\Http\Controllers\Guest\InventoryController;
use App\Http\Controllers\Guest\DeckController;
use App\Http\Controllers\Guest\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//----------------------admin

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userCount']);
    // categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'add']);
    Route::post('insert-category', [CategoryController::class, 'insert']);
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{id}', [CategoryController::class, 'destroy']);
    Route::get('confirm-delete/{id}', [CategoryController::class, 'confirm']);
    // users
    Route::get('users', [UserController::class, 'show']);
    Route::get('edit-user/{id}', [UserController::class, 'edit']);
    Route::put('update-user/{id}', [UserController::class, 'update']);
    Route::get('delete-user/{id}', [UserController::class, 'destroy']);
    Route::get('confirm-user-delete/{id}', [UserController::class, 'confirmUserDelete']);
    // card
    Route::get('cards', [CardController::class, 'index']);
    Route::get('add-card', [CardController::class, 'add']);
    Route::post('insert-card', [CardController::class, 'insert']);
    Route::get('edit-card/{id}', [CardController::class, 'edit']);
    Route::put('update-card/{id}', [CardController::class, 'update']);
    Route::get('delete-card/{id}', [CardController::class, 'destroy']);
    Route::get('confirm-card-delete/{id}', [CardController::class, 'confirmCardDelete']);
    // bots
    Route::get('bots', [BotController::class, 'showBots']);
    Route::get('add-bot', [BotController::class, 'addBot']);
    Route::post('insert-bot', [BotController::class, 'insertBot']);
    Route::post('insert-bot', [BotController::class, 'insertBot']);
    Route::get('edit-bot/{id}', [BotController::class, 'editBot']);
    Route::put('update-bot/{id}', [BotController::class, 'updateBot']);
    Route::get('delete-bot/{id}', [BotController::class, 'destroyBot']);
    Route::get('confirm-bot-delete/{id}', [BotController::class, 'confirmBotDelete']);
});

Route::get('/', function () {
    return view('welcome');
});

// guest ---------- all added -> admin/categories guest/all-categories
Route::middleware(['auth'])->group(function () {

    Route::get('/home', [FrontendController::class, 'index'])->name('home');
    Route::get('/all-categories', [FrontendController::class, 'showCategories']);
    Route::get('/all-cards', [FrontendController::class, 'showAllCards']);

    // edit and update user profile
    Route::get('edit-user-profile', function () {
        return view('guest.edit-user-profile');
    });
    Route::post('update-user-profile', [UserController::class, 'updateUserProfile']);

    // card
    Route::get('category/{category_slug}/{card_slug}', [FrontendController::class, 'cardview']);
    Route::get('category/{slug}', [FrontendController::class, 'viewcategory']);

    // cart
    Route::post('/add-to-cart', [CartController::class, 'addCard']);
    Route::get('/cart', [CartController::class, 'viewcart']);
    Route::post('/delete-cart-item', [CartController::class, 'deletecard']);

    // inventory
    Route::get('inventory', [InventoryController::class, 'viewinventory']);
    Route::post('/add-to-inventory', [InventoryController::class, 'addCards'])->name('addToInv');
    Route::get('/sell-from-inventory/{id}', [InventoryController::class, 'sellCard'])->name('sellCard');
    Route::get('confirm-sell/{id}', [InventoryController::class, 'confirmSell']);

    // deck
    Route::get('mydeck', [DeckController::class, 'viewdeck']);
    Route::get('combine-cards', [DeckController::class, 'combineCards']);
    Route::post('do-combine-cards', [DeckController::class, 'doCombineCards']);

    // game
    Route::get('choose-tier', [GameController::class, 'index']);
    Route::get('do-duel/{id}', [GameController::class, 'gameInit']);
    Route::post('make-result', [GameController::class, 'makeResult']);
    Route::get('game-result', [GameController::class, 'gameResult']);
    Route::get('all-games', [GameController::class, 'allGames']);
});


Auth::routes();
