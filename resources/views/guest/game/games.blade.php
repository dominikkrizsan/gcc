@extends('layouts.game')
@section('content')
    
<div class="w-128 mx-auto">
    <div class="flex flex-col justify-center items-center bg-zinc-100 mt-5 rounded-2xl border-2 border-sky-100 p-5 mb-5">
        <h1 class="text-3xl font-bold text-center uppercase">last 30 game's results</h1>
        <div class="mx-auto flex items-center justify-center gap-8 my-3 font-bold py-2 px-3 bg-zinc-200 rounded-xl border border-sky-200">
            <p>Games won: {{ $win }} <i class="fa-solid fa-crown text-amber-500 text-2xl"></i></p>
            <p>Games lost: {{ $lose }} <i class="fa-solid fa-square-xmark text-red-500 text-2xl"></i></p>
        </div>
        <div class="grid grid-cols-2 gap-8">
        @forelse ($game as $item)
            <div class="@if($item->result=='bot') bg-class-lose @else bg-class-win @endif grid grid-cols-2 items-center capitalize mt-5 gap-8 text-2xl bg-zinc-200 p-5 rounded-2xl border border-zinc-300 hover:shadow-2xl hover:border-zinc-400 ease-in duration-200">
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
                <p class="flex items-center gap-2">{{ $item->result}}</i></p>
                    <input class="winner" type="hidden" value="{{ $item->result }}">
                <p>credit+</p>
                <p class="text-emerald-500 flex items-center gap-2">{{ $item->balanceget}} <i class="fa-solid fa-coins"></i></p>
            </div>
            @empty
            <p class="capitalize text-3xl mt-3">no recent games</p>
            <p class="capitalize text-3xl mt-3">start <a class="uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{url('choose-tier')}}">here</a></p>
        @endforelse
        </div>
        <a class="mt-5 bg-sky-500 text-white py-2 px-3 rounded-xl justify-self-center uppercase border border-zinc-200 hover:bg-sky-400 hover:border-zinc-400 ease-in duration-100" href="{{ url('choose-tier') }}">back</a>
    </div>
</div>
@endsection