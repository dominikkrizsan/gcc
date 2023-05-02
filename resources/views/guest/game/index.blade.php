@extends('layouts.game')
@section('content')
    <div class="w-128 mx-auto p-5 bg-zinc-100 rounded-2xl mt-3 border border-zinc-300 hover:border-zinc-400 hover:shadow-lg ease-in duration-200 mb-5">
        <h1 class="text-sky-500 text-center font-bold text-3xl mb-5">Choose your Tier</h1>
        
        <!-- modal -->
        <div id="ex1" class="modal">
            <div class="flex flex-col items-center gap-4 text-2xl mt-3">
                <h1 class="font-bold text-sky-500">Best of 3 game</h1>
                <div class="flex flex-col items-center gap-2">
                    <p>1st condition:</p>
                    <p class="text-center">The game adds your hp and tq matches with the bot's hp and tq sum (1st of the 3)</p>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <p>2nd condition:</p>
                    <p class="text-center">Adds your 0-100 and 1/4 mile time, same for the bot (2nd of the 3)</p>
                </div>
                <div class="flex flex-col items-center gap-2">
                    <p>3rd condition:</p>
                    <p class="text-center">Matches your P to W with the bot's P to W <br> (3rd of the 3)</p>
                </div>
                <p class="mb-5 text-center">You can get results like 3-0 | 2-1 | 1-2 | 0-3</p>
                <div class="grid grid-cols-2 items-center justify-items-center gap-4">
                    <p>Level 1: 50 <i class="fa-solid fa-coins text-emerald-500"></i></p>
                    <p>Level 2: 75 <i class="fa-solid fa-coins text-emerald-500"></i></p>
                    <p>Level 3: 100 <i class="fa-solid fa-coins text-emerald-500"></i></p>
                    <p>Level 4: 150 <i class="fa-solid fa-coins text-emerald-500"></i></p>
                    
                </div>
                <p class="mb-5">Level 5: 300 <i class="fa-solid fa-coins text-emerald-500"></i></p>
                <a class="py-2 px-3 bg-red-500 rounded-xl hover:bg-red-600 text-white ease-in duration-100 text-xl" href="#" rel="modal:close">Close</a>
            </div>
        </div>

        <!-- open modal -->
        <div class="flex flex-col items-center">
            <a class="mx-auto capitalize flex items-center gap-2 mb-3 text-zinc-600 py-1 px-2 rounded-xl hover:bg-zinc-200 hover:text-zinc-900 ease-in duration-100" href="#ex1" rel="modal:open">how the game works<i class="fa-solid fa-circle-info text-sky-500"></i></a>
        </div>

        <div class="grid grid-cols-choose_bot uppercase text-xl mt-3">
            <p class="text-center">bot level</p>
            <p class="text-center">bot name / bot profile picture / bot card / choose to play</p>
        </div>

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
