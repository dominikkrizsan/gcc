@extends('layouts.admin')

@section('content')
<div>
    <p class="text-4xl uppercase font-bold text-zinc-700 mt-5 pl-1">add new bot</p>
</div>
<div class="border-b-2 border-sky-400 w-52 mt-2 mb-5"></div>
<form
    class="flex flex-col gap-4 w-max text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400"
    action="{{ url('insert-bot') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
    <label class="ml-2 text-2xl" for="">Name (name of the bot fe.: Bot Albert)</label>
    <input class="p-2 rounded-xl" type="text" name="name" placeholder="Bot Albert" required />
    <label class="ml-2 text-2xl" for="">Level (1-5)</label>
    <input class="p-2 rounded-xl" type="number" name="level" placeholder="Number" required minlength="1" maxlength="5"/>
    <label class="ml-2 text-2xl" for="">Picture (add a pic 4 the bot)</label>
    <input
    class="p-2 bg-zinc-700 hover:bg-zinc-600 ease-in duration-100 text-white ml-2 block w-max text-xl border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
    id="file_input"
    type="file"
    name="image"
/>
    <select class="rounded-xl px-1 py-1 w-52 bg-zinc-200 border border-zinc-400" name="card_id" required>
        <option value="">Select Bot Card</option>
        @foreach ($cards as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">add bot</button>
</form>
@endsection