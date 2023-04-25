@extends('layouts.admin') @section('content')
<div>
    <p class="text-4xl uppercase font-bold text-zinc-700 mt-5">edit & update bot</p>
</div>
<div class="border-b-2 border-sky-400 w-72 mt-2 mb-5"></div>
<form
    class="flex flex-col gap-4 w-max text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400 mb-5"
    action="{{ url('update-bot/'.$bot->id) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')
    <label class="ml-2 text-2xl" for="">Name (name of the bot fe.: Bot Albert)</label>
    <input
        class="p-2 rounded-xl"
        type="text"
        name="name"
        placeholder="Category Name"
        required
        value="{{ $bot->name }}"
    />
    <label class="ml-2 text-2xl" for="">Level (1-5)</label>
    <input class="p-2 rounded-xl" type="number" name="level" placeholder="Number" required minlength="1" maxlength="5" value="{{ $bot->level }}"/>
    <label class="ml-2 text-2xl" for="">Picture (add a pic that describes the category)</label>
    <div class="edit-cat-pic">
        <input
        class="p-2 bg-zinc-700 hover:bg-zinc-600 ease-in duration-100 text-white ml-2 block w-max text-xl border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
        id="file_input"
        type="file"
        name="image"
    />
        @if( $bot->image )
        <img
            class="w-60 mx-auto mt-3 border border-zinc-300"
            src="{{ asset('assets/uploads/bots/'.$bot->image) }}"
            alt="Category image"
        />
        @endif
    </div>
    <select class="rounded-xl px-1 py-1 w-52 bg-zinc-200 border border-zinc-400 mx-auto" name="card_id" required>
        <option value="{{ $bot->card_id }}">{{ $bot->card->name }}</option>
        @foreach ($cards as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">Update Bot Data</button>
</form>
@endsection
