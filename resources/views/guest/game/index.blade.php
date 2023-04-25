@extends('layouts.game')
@section('content')
    <div class="w-128 mx-auto p-5 bg-zinc-100 rounded-2xl mt-3 border border-zinc-300 hover:border-zinc-400 hover:shadow-lg ease-in duration-200 mb-5">
        <h1 class="text-sky-500 text-center font-bold text-3xl mb-5">Choose your Tier</h1>
        <div class="grid grid-cols-choose_bot uppercase text-xl mt-3">
            <p class="text-center">bot level</p>
            <p class="text-center">bot name / bot profile picture / bot card / choose to play</p>
        </div>
        <p class="text-center text-red-500">magyarazat mit csinal a game miket nez</p>
        @foreach ($showBots as $item)
            <div class="grid grid-cols-choose_bot">
                <div class="flex items-center justify-center">
                    <p class="text-2xl font-bold uppercase">level {{ $item->level }}</p>
                </div>
                <div class="grid grid-cols-4 items-center justify-center bg-zinc-200 rounded-2xl px-5 mt-3 border border-zinc-300 py-1 hover:border-zinc-400 hover:shadow">
                    <p class="uppercase">{{$item->name}}</p>
                    <img class="w-28 rounded-2xl border border-zinc-300" src="{{ asset('./assets/uploads/bots/'.$item->image) }}" alt="">
                    <div class="flex flex-col">
                        <div class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 p-1 w-card_bot_admin text-xs text-white">
                            <div class="font-medium mb-1 ml-1">{{ $item->card->name }}</div>
                            <div>
                                <img class="rounded m1-2" src="{{ asset('./assets/uploads/cards/'.$item->card->image) }}" alt="Image here" />
                            </div>
                            <div class="grid grid-cols-2 bg-zinc-200 text-zinc-700 pb-1">
                                <div class="pl-1">
                                    <p>Engine</p>
                                    <p>HP</p>
                                    <p>Torque</p>
                                    <p>Weight</p>
                                    <p>0-100</p>
                                    <p>1/4 mile</p>
                                    <p>P to W</p>
                                </div>
                                <div class="">
                                    <p>{{ $item->card->engine }}</p>
                                    <p class="text-zinc-400">HIDDEN <span class="text-zinc-700">bhp</span></p>
                                    <p class="text-zinc-400">HIDDEN <span class="text-zinc-700">nm</span></p>
                                    <p>{{ $item->card->weight }} <span>kg</span></p>
                                    <p class="text-zinc-400">HIDDEN <span class="text-zinc-700">sec</span></p>
                                    <p class="text-zinc-400">HIDDEN <span class="text-zinc-700">sec</span></p>
                                    <p class="text-zinc-400">HIDDEN <span class="text-zinc-700">hp/ton</span></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 justify-items-center items-center mt-1">
                                <p class="uppercase">{{ $item->card->category->name }}</p>
                                <p class=""><span class="mr-1">Tier</span>{{ $item->card->tier }}</p>
                            </div>
                        </div>
                    </div>
                    <a id="do_duel" class="bg-sky-500 text-white py-2 px-3 rounded-xl justify-self-center uppercase border border-zinc-200 hover:bg-sky-400 hover:border-zinc-400 ease-in duration-100" href="{{ url('do-duel/'.$item->id) }}">1v1 this bot</a>
                </div>
            </div>
        @endforeach
    </div>
    
@endsection
