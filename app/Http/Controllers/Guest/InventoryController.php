<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\Cart;
use App\Models\User;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function addCards(Request $request)
    {
        $user = User::find(Auth::id());
        $cards = $request->cards;
        $successfully_added = [];
        if ($user->balance < $request->cost) {
            return response()->json(['status' => 'Not Enough balance']);
        }
        foreach ($cards as $card_id) {

            if (Auth::check()) {
                $card_check = Card::where('id', $card_id)->first();

                if ($card_check) {
                    $invItem = new Inventory();
                    $invItem->card_id = $card_id;
                    $invItem->user_id = Auth::id();
                    $invItem->save();
                    array_push($successfully_added, $card_id);
                }
            } else {
                return response()->json(['status' => 'Login to Continue']);
            }
        }

        foreach ($cards as $card_id) {
            if (Cart::where('card_id', $card_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('card_id', $card_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
            }
        }

        $user->balance -= $request->cost;
        $user->update();
        return response()->json(['status' => 'buy success']);
    }

    public function viewinventory()
    {
        $invitems = Inventory::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('guest.inventory', compact('invitems'));
    }

    public function sellCard($id)
    {
        $inv_item = Inventory::where('card_id', $id)->where('user_id', Auth::id())->first();
        $card = Card::where('id', $id)->first();
        $card_value = $card->price / 2;
        $user = User::find(Auth::id());
        $user->balance += $card_value;
        $user->save();
        $inv_item->delete();
        return redirect('inventory')->with('sellData', 'You sold your Card for ' . $card_value . ' !');
    }

    public function confirmSell($id)
    {
        return redirect('inventory')->with('confirmSell' . $id, 'Are you sure you want to sell?');
    }
}
