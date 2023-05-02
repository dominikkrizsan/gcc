<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class WelcomeController extends Controller
{
    // welcome
    public function welcome()
    {
        $mainUser = User::first();
        $countUser = User::count() - 1;
        return view('welcome.welcome', compact('mainUser', 'countUser'));
    }

    // the game
    public function game()
    {
        return view('welcome.game');
    }

    // the shop
    public function shop()
    {
        return view('welcome.shop');
    }
}
