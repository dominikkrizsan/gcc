<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::orderBy('id', 'DESC')->get();
        //$cards = Card::search(request(key: 'search'));
        return view('admin.card.index', compact('cards'));
    }

    public function add()
    {
        $category = Category::all();
        return view('admin.card.add', compact('category'));
    }

    public function insert(Request $request)
    {
        $cards = new Card();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/cards/', $filename);
            $cards->image = $filename;
        }
        $cards->category_id = $request->input('category_id');
        $cards->name = $request->input('name');
        $cards->slug = $request->input('slug');
        $cards->engine = $request->input('engine');
        $cards->ztoh = $request->input('ztoh');
        $cards->qmile = $request->input('qmile');
        $cards->hp = $request->input('hp');
        $cards->tq = $request->input('tq');
        $cards->weight = $request->input('weight');
        $hp = $request->input('hp');
        $weight = $request->input('weight');
        $ptow = ($hp / $weight) * 1000;
        $cards->ptow = $ptow;
        $cards->price = $request->input('price');
        $cards->qty = $request->input('qty');
        $cards->tier = $request->input('tier');
        $cards->status = $request->input('status') == TRUE ? '1' : '0';
        $cards->trending = $request->input('trending') == TRUE ? '1' : '0';
        $cards->save();
        return redirect('cards');
    }

    public function edit($id)
    {
        $cards = Card::find($id);
        return view('admin.card.edit', compact('cards'));
    }

    public function update(Request $request, $id)
    {
        $cards = Card::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/cards/' . $cards->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/cards/', $filename);
            $cards->image = $filename;
        }
        $cards->name = $request->input('name');
        $cards->slug = $request->input('slug');
        $cards->engine = $request->input('engine');
        $cards->ztoh = $request->input('ztoh');
        $cards->qmile = $request->input('qmile');
        $cards->hp = $request->input('hp');
        $cards->tq = $request->input('tq');
        $cards->weight = $request->input('weight');
        $hp = $request->input('hp');
        $weight = $request->input('weight');
        $ptow = ($hp / $weight) * 1000;
        $cards->ptow = $ptow;
        $cards->price = $request->input('price');
        $cards->qty = $request->input('qty');
        $cards->tier = $request->input('tier');
        $cards->status = $request->input('status') == TRUE ? '1' : '0';
        $cards->trending = $request->input('trending') == TRUE ? '1' : '0';
        $cards->update();
        return redirect('cards')->with('updatedata', 'Successfully Updated');
    }

    public function destroy($id)
    {
        $cards = Card::find($id);
        $path = 'assets/uploads/cards/' . $cards->image;
        if (File::exists($path)) {
            File::delete($path);
        }
        $cards->delete();
        return redirect('cards')->with('deleteCardData', 'Delete was successful!');
    }

    public function confirmCardDelete($id)
    {
        return redirect('cards')->with('confirmCardDelete' . $id, 'Are you sure you want to delete?');
    }
}
