<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Card;

class FrontendController extends Controller
{
    // for guest sites
    // home index site after logging in
    public function index()
    {
        $featured_cards = Card::where('trending', '1')->where('status', '1')->orderBy('id', 'DESC')->take(3)->get();
        $trending_category = Category::where('popular', '1')->take(3)->get();
        return view('guest.home', compact('featured_cards', 'trending_category'));
    }
    // all categories
    public function showCategories()
    {
        $category = Category::where('status', '1')->get();
        return view('guest.shop.categories', compact('category'));
    }

    //cardbycategory
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $cards = Card::where('category_id', $category->id)->where('status', '1')->orderBy('id', 'DESC')->get();
            return view('guest.shop.cardbycategory', compact('category', 'cards'));
        } else {
            return redirect('/')->with('status', "slug does not exists");
        }
    }

    public function showAllCards()
    {
        $cards = Card::orderBy('id', 'DESC')->where('status', '1')->get();
        return view('guest.shop.cards', compact('cards'));
    }

    public function cardview($category_slug, $card_slug)
    {
        if (Category::where('slug', $category_slug)->exists()) {
            if (Card::where('slug', $card_slug)->exists()) {
                $cards = Card::where('slug', $card_slug)->first();
                $cardnext = Card::where('id', '>', $cards->id)->where('status', '1')->oldest('id')->first();
                $cardprev = Card::where('id', '<', $cards->id)->where('status', '1')->latest('id')->first();
                return view('guest.shop.viewcard', compact('cards', 'cardnext', 'cardprev'));
            } else {
                return redirect('/')->with('status', "link was broken");
            }
        } else {
            return redirect('/')->with('status', "no such category found");
        }
    }
}
