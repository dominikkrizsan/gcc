<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Bot;
use App\Models\User;
use App\Models\Deck;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $showBots = Bot::all();
        return view('guest.game.index', compact('showBots'));
    }

    public function gameInit(Request $req, $id)
    {
        $playerData = Auth::user();
        $deck = Deck::where('user_id', Auth::user()->id)->first();
        $botData = Bot::where('id', $id)->first();
        return view('guest.game.init', compact('playerData', 'deck', 'botData'));
    }

    public function makeResult(Request $req)
    {
        $game = new Game();
        $game->user_id = Auth::user()->id;
        $game->bot_id = $req->input('bot_id');
        $game->score = $req->input('score');
        $game->result = $req->input('result');
        $game->balanceget = $req->input('balanceget');
        $game->save();
        return redirect('game-result');
    }

    public function gameResult()
    {
        $game = Game::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->first();
        return view('guest.game.result', compact('game'));
    }

    public function allGames()
    {
        $game = Game::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->take(30)->get();
        return view('guest.game.games', compact('game'));
    }
}
