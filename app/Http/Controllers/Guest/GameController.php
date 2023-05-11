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
        $deck = Deck::where('user_id', Auth::user()->id)->first();
        if ($deck === null) {
            return redirect()->back()->with('emptyDeckError', 'Your Deck is empty, craft a card first!');
        }
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
        $user = User::where('id', Auth::user()->id)->first();
        $user->balance += $req->input('balanceget');
        $user->save();
        return redirect('game-result');
    }

    public function gameResult()
    {
        $game = Game::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->first();
        return view('guest.game.result', compact('game'));
    }

    public function allGames()
    {
        $win = Game::where('user_id', Auth::user()->id)->where('result', 'player')->count();
        $lose = Game::where('user_id', Auth::user()->id)->where('result', 'bot')->count();
        $game = Game::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->take(30)->get();
        return view('guest.game.games', compact('game', 'win', 'lose'));
    }

    // for admin

    public function adminAllGames()
    {
        $botwins = Game::where('result', 'bot')->count();
        $playerwins = Game::where('result', 'player')->count();
        $game = Game::orderby('id', 'DESC')->get();
        return view('admin.game.index', compact('game', 'botwins', 'playerwins'));
    }
}
