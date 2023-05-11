@extends('layouts.admin')
@section('content')
<div class="flex flex-col justify-center items-center gap-4 font-bold mb-3 mt-5">
    <h1 class="text-3xl mt-3 text-sky-500">All games</h1>
    <div class="mx-auto flex items-center text-2xl justify-center gap-8 my-3 font-bold py-2 px-3 bg-zinc-300 rounded-xl border border-sky-200">
        <p>Games won by players: <span class="text-sky-500">{{ $playerwins }}</span> <i class="fa-solid fa-user-ninja text-3xl ml-2"></i></p>
        <p>Games win by bots: <span class="text-sky-500">{{ $botwins }}</span> <i class="fa-brands fa-android text-3xl ml-2"></i></p>
    </div>
</div>
<div class="grid grid-cols-2 w-max mx-auto gap-6 border border-zinc-400 shadow-xl bg-zinc-300 py-4 px-5 rounded-xl mt-5 mb-5">
    @forelse ($game as $item)
        <div class="flex flex-col gap-2 items-center mt-5">
            <div class="text-2xl flex items-center gap-2">
                <p class="capitalize">game id:</p>
                <p>{{ $item->id }}</p>
            </div>
            <div class="grid grid-cols-2 items-center capitalize gap-8 text-2xl bg-zinc-200 p-5 rounded-2xl border border-zinc-300 hover:shadow-2xl hover:border-zinc-400 ease-in duration-200">
                <p>player</p>
                <p class="text-sky-500">{{ $item->user->name}}</p>
                <p>bot</p>
                <div class="flex gap-4 items-center">
                    <img class="w-20 rounded-2xl border border-zinc-300" src="{{ asset('./assets/uploads/bots/'.$item->bot->image) }}" alt="">
                    <p>{{ $item->bot->name}}</p>
                </div>
                <p>bot level</p>
                <p>level {{ $item->bot->level}}</p>
                <p>result</p>
                <p>{{ $item->score}}</p>
                <p class="flex items-center gap-2">winner<i class="fa-solid fa-crown text-amber-500"></i></p>
                <p class="flex items-center gap-2">{{ $item->result}}</p>
                <p>credit+</p>
                <p class="text-emerald-500 flex items-center gap-2">{{ $item->balanceget}} <i class="fa-solid fa-coins"></i></p>
            </div>
        </div>
    @empty
        <p class="capitalize text-3xl mt-3">there no games yet</p>
    @endforelse
</div>
@endsection