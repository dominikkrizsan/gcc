<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Card;
use App\Models\Cart;
use App\Models\Inventory;

class CartController extends Controller
{
    public function addCard(Request $request)
    {
        // where('user_id', Auth::user()->id)->
        $card_id = $request->card_id;
        if (Auth::check()) {
            $card_check = Card::where('id', $card_id)->first();
            if (Inventory::where('card_id', $card_id)->exists()) {
                return response()->json(['status' => 'Card is already in inventory']);
            } else {
                if ($card_check) {
                    if (Cart::where('card_id', $card_id)->where('user_id', Auth::id())->exists()) {
                        return response()->json(['status' => /*$card_id->name.*/ "Card is already added to Cart!"]);
                    } else {
                        $cartItem = new Cart();
                        $cartItem->card_id = $card_id;
                        $cartItem->user_id = Auth::id();
                        $cartItem->save();
                        return response()->json(['status' => /*$card_id->name . */ "Card added to cart successfully!"]);
                    }
                }
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function viewcart()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('guest.shop.cart', compact('cartitems'));
    }

    public function deletecard(Request $request)
    {
        if (Auth::check()) {
            $card_id = $request->input('card_id');
            if (Cart::where('card_id', $card_id)->where('user_id', Auth::id())->exists()) {
                $cartItem = Cart::where('card_id', $card_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => 'Item deleted!']);
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }
}
