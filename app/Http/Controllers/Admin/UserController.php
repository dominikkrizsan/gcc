<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;

class UserController extends Controller
{
    // dashboard -------------------------------------------

    public function userCount()
    {
        $countUser = User::count();
        $countSoldCards = Inventory::count();
        return view('admin.index', compact('countUser', 'countSoldCards'));
    }

    // users -----------------------------------------------

    public function show()
    {
        $data = DB::table('users')
            ->get();
        return view('admin/user/index', ['users' => $data]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->balance = $request->input('balance');
        $user->update();
        return redirect('users')->with('updatedata', 'Successfully Updated');;
    }

    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('users')->with('deleteUserData', 'Delete was successful!');
    }

    public function confirmUserDelete($id)
    {
        return redirect('users')->with('confirmUserDelete' . $id, 'Are you sure you want to delete?');
    }

    public function updateProfile(Request $req)
    {
        $user = User::find($req->id);
        $user->name = $req->name;
        $user->email = $req->email;
        $user->balance = $req->balance;
        $user->save();
        return redirect('dashboard')->with('updatedata', 'Successfully Updated');;
    }

    public function updateUserProfile(Request $request)
    {
        $user = User::find($request->id);
        $user->id = $request->input('id');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->balance = $request->input('balance');
        $user->save();
        return redirect('home')->with('updatedata', 'Successfully Updated');;
    }
}
