@extends('layouts.game')
@section('content')
    
<div class="w-128 mx-auto">
    <div class="flex flex-col justify-center items-center bg-zinc-100 mt-5 rounded-2xl border-2 border-sky-100 p-5">
        <h1 class="text-3xl font-bold text-center uppercase">Last game's results</h1>
        <p>gameid: {{ $game->id}}</p>
        <div class="grid grid-cols-2 items-center capitalize mt-5 gap-8 text-2xl bg-zinc-200 p-5 rounded-2xl border border-zinc-300 ">
            <p>player</p>
            <p class="text-sky-500">{{ $game->user->name}}</p>
            <p>bot</p>
            <div class="flex gap-4 items-center">
                <img class="w-20 rounded-2xl border border-zinc-300" src="{{ asset('./assets/uploads/bots/'.$game->bot->image) }}" alt="">
                <p>{{ $game->bot->name}}</p>
            </div>
            <p>bot level</p>
            <p>level {{ $game->bot->level}}</p>
            <p>result</p>
            <p>{{ $game->score}}</p>
            <p class="flex items-center gap-2">winner<i class="fa-solid fa-crown text-amber-500"></i></p>
            <p class="flex items-center gap-2">{{ $game->result}}<i class="fa-solid fa-user-ninja text-sky-500"></i></p>
            <p>credit+</p>
            <p class="text-emerald-500 flex items-center gap-2">{{ $game->balanceget}} <i class="fa-solid fa-coins"></i></p>
        </div>
        <a class="mt-5 bg-sky-500 text-white py-2 px-3 rounded-xl justify-self-center uppercase border border-zinc-200 hover:bg-sky-400 hover:border-zinc-400 ease-in duration-100" href="{{ url('choose-tier') }}">continue</a>
    </div>
</div>
@endsection