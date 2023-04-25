<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Bot;
use App\Models\Card;


class BotController extends Controller
{
    public function showBots()
    {
        $bots = Bot::orderBy('level', 'ASC')->get();
        return view('admin.bots.index', compact('bots'));
    }

    public function addBot()
    {
        $cards = Card::where('category_id', '5')->orderBy('id', 'DESC')->get();
        return view('admin.bots.add', compact('cards'));
    }

    public function insertBot(Request $request)
    {
        $bots = new Bot();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/bots/', $filename);
            $bots->image = $filename;
        }
        $bots->name = $request->input('name');
        $bots->level = $request->input('level');
        $bots->card_id = $request->input('card_id');
        $bots->save();
        return redirect('bots');
    }

    public function editBot($id)
    {
        $cards = Card::where('category_id', '5')->orderBy('id', 'DESC')->get();
        $bot = Bot::find($id);
        return view('admin.bots.edit', compact('bot', 'cards'));
    }

    public function updateBot(Request $request, $id)
    {
        $bot = Bot::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $bot->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/bots/', $filename);
            $bot->image = $filename;
        }
        $bot->name = $request->input('name');
        $bot->level = $request->input('level');
        $bot->card_id = $request->input('card_id');
        $bot->update();
        return redirect('bots')->with('updatedata', 'Successfully Updated');
    }

    public function destroyBot($id)
    {
        $bot = Bot::find($id);
        if ($bot->image) {
            $path = 'assets/uploads/bots/' . $bot->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $bot->delete();
        return redirect('bots')->with('deleteBotData', 'Delete was successful!');
    }

    public function confirmBotDelete()
    {
        return redirect('bots')->with('confirmBotDelete', 'Are you sure you want to delete?');
    }
}
