@extends('layouts.admin')

@section('content')
<div>
    <p class="text-4xl uppercase font-bold text-zinc-700 mt-5">edit & update user</p>
</div>
<div class="border-b-2 border-sky-400 w-72 mt-2 mb-5"></div>
<form action="{{ url('update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4 w-useredit text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400">
    @csrf
    @method('PUT')
    <label class="ml-2 text-2xl" for="">Name</label>
    <input class="p-2 rounded-xl" type="text" name="name" value="{{ $user->name }}">
    <label class="ml-2 text-2xl" for="">Email</label>
    <input class="p-2 rounded-xl" type="text" name="email" value="{{ $user->email }}">
    <label class="ml-2 text-2xl" for="">Balance</label>
    <input class="p-2 rounded-xl" class="balance-input-edit-user" type="number" name="balance" value="{{ $user->balance }}">
    <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">Update User</button>
</form>
@endsection