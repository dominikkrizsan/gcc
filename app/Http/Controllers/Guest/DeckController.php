<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Card;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Deck;
use Illuminate\Support\Facades\Auth;

class DeckController extends Controller
{
    public function combineCards()
    {
        $inv = Inventory::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $inventory = [];
        $carcards = [];
        $tuningcards = [];
        foreach ($inv as $item) {
            $card = Card::where('id', $item->card_id)->get();
            array_push($inventory, $card);
        }
        foreach ($inventory as $item) {
            if ($item[0]->category_id === 1) {
                array_push($carcards, $item[0]);
            } else {
                array_push($tuningcards, $item[0]);
            }
        }
        return view('guest.deck.combine-cards', compact('tuningcards', 'carcards'));
    }

    public function doCombineCards(Request $req)
    {
        Deck::where('user_id', Auth::user()->id)->delete();
        $car = Card::where('id', $req->car)->first();
        $tuning = Card::where('id', $req->tuning)->first();
        if ($car === null) {
            return redirect()->back()->with('emptyCarCardError', "Your didn't choose a car card!");
        }
        if ($tuning === null) {
            return redirect()->back()->with('emptyTuningCardError', "Your didn't choose a tuning card!");
        }
        $engineCategory = Category::where('slug', 'engine_swap')->first();
        $newcard = new Deck();
        $newcard->image = $car->image;
        $newcard->name = $car->name;
        if ($engineCategory->id === $tuning->category_id) {
            $newcard->engine = $tuning->engine;
            $newcard->hp = $tuning->hp;
            $newcard->tq = $tuning->tq;
            $newcard->ztoh = $tuning->ztoh;
            $newcard->qmile = $tuning->qmile;
        } else {
            $newcard->engine = $car->engine;
            $newcard->hp = $car->hp + $tuning->hp;
            $newcard->tq = $car->tq + $tuning->tq;
            $newcard->ztoh = ($car->ztoh) * ($tuning->ztoh);
            $newcard->qmile = $car->qmile * $tuning->qmile;
        }
        $newcard->weight = $car->weight + $tuning->weight;
        $newcard->ptow = ($newcard->hp / $newcard->weight) * 1000;
        $tier = 0;
        if ($car->tier === 1 && $tuning->tier === 1) {
            $tier = 1;
        } else if ($car->tier === 1 && $tuning->tier === 2) {
            $tier = 2;
        } else if ($car->tier === 1 && $tuning->tier === 3) {
            $tier = 3;
        } else if ($car->tier === 1 && $tuning->tier === 4) {
            $tier = 4;
        } else if ($car->tier === 1 && $tuning->tier === 5) {
            $tier = 4;
        } else if ($car->tier === 2 && $tuning->tier === 1) {
            $tier = 2;
        } else if ($car->tier === 2 && $tuning->tier === 2) {
            $tier = 3;
        } else if ($car->tier === 2 && $tuning->tier === 3) {
            $tier = 4;
        } else if ($car->tier === 2 && $tuning->tier === 4) {
            $tier = 4;
        } else if ($car->tier === 2 && $tuning->tier === 5) {
            $tier = 5;
        } else if ($car->tier === 3 && $tuning->tier === 1) {
            $tier = 3;
        } else if ($car->tier === 3 && $tuning->tier === 2) {
            $tier = 3;
        } else if ($car->tier === 3 && $tuning->tier === 3) {
            $tier = 4;
        } else if ($car->tier === 3 && $tuning->tier === 4) {
            $tier = 4;
        } else if ($car->tier === 3 && $tuning->tier === 5) {
            $tier = 5;
        } else if ($car->tier === 4 && $tuning->tier === 1) {
            $tier = 4;
        } else if ($car->tier === 4 && $tuning->tier === 2) {
            $tier = 4;
        } else if ($car->tier === 4 && $tuning->tier === 3) {
            $tier = 4;
        } else if ($car->tier === 4 && $tuning->tier === 4) {
            $tier = 5;
        } else if ($car->tier === 4 && $tuning->tier === 5) {
            $tier = 5;
        } else if ($car->tier === 5 && $tuning->tier === 1) {
            $tier = 5;
        } else if ($car->tier === 5 && $tuning->tier === 2) {
            $tier = 5;
        } else if ($car->tier === 5 && $tuning->tier === 3) {
            $tier = 5;
        } else if ($car->tier === 5 && $tuning->tier === 4) {
            $tier = 5;
        } else if ($car->tier === 5 && $tuning->tier === 5) {
            $tier = 5;
        }
        // } else if (($car->hp + $tuning->hp) < 300) {
        //     $tier = 1;
        // } else if (($car->hp + $tuning->hp) > 300) {
        //     $tier = 2;
        // } else if (($car->hp + $tuning->hp) > 500) {
        //     $tier = 3;
        // } else if (($car->hp + $tuning->hp) > 700) {
        //     $tier = 4;
        // } else if (($car->hp + $tuning->hp) > 950) {
        //     $tier = 5;
        // }
        $newcard->tier = $tier;
        $newcard->user_id = Auth::user()->id;
        $newcard->category_id = $car->category_id;
        $newcard->save();
        return redirect('mydeck');
    }

    public function viewdeck()
    {
        $deck = Deck::where('user_id', Auth::user()->id)->first();
        if ($deck === null) {
            return redirect()->back()->with('emptyDeckError', 'Your Deck is empty, craft a card first!');
        }
        return view('guest.deck.index', compact('deck'));
    }
}
