@extends('layouts.app')
@section('content')

<h1 class="text-center capitalize text-3xl mt-5 border-b border-sky-500 border-dotted w-max mx-auto pb-2">combine your cards</h1>
<div class="bg-zinc-100 border border-zinc-300 rounded-2xl w-128 mx-auto my-5">
    <div class="flex items-center justify-center gap-4 my-2">
        <i class="fa-solid fa-lightbulb text-3xl text-sky-500"></i>
        <p class="text-center text-xl">With this form you can craft your custom tuned card for your deck</p>
    </div>
    <div class="flex items-center justify-center gap-4 my-2">
        <i class="fa-solid fa-file-circle-exclamation text-3xl text-sky-500"></i>
        <p class="text-center text-xl">You can use <span class="text-sky-500">1 car card</span> and <span class="text-sky-500">1 tuning card</span> for your craft</p>
    </div>
    <div class="flex items-center justify-center gap-4 my-2">
        <i class="fa-solid fa-triangle-exclamation text-3xl text-sky-500"></i>
        <p class="text-center text-xl">Attention, if you craft a card, your previous card will be replaced with the current craft</p>
    </div>
</div>
<form method="POST" action="{{ url('do-combine-cards')}}" class="bg-zinc-100 border border-zinc-300 rounded-2xl w-128 mx-auto py-5 px-3 mb-5 flex flex-col justify-center">
    @csrf
    <div class="grid grid-cols-combine justify-items-center">
        <div class="">
            <p class="capitalize text-center mb-3">your car cards</p>
            <div class="grid grid-cols-2 gap-4">
                @forelse ($carcards as $item)
                <div class="flex flex-col">
                    <div class="flex justify-center gap-3 items-center bg-zinc-50 border border-zinc-300 my-2 py-2 rounded-2xl">
                        <p class="text-lg uppercase">Check to add</p>
                        <input class="car" type="checkbox" name="car" id="" value="{{ $item->id }}">
                    </div>
                    <div class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-2 px-2 w-card_craft text-sm text-white">
                        <div class="font-medium mb-2 ml-1">{{ $item->name }}</div>
                        <div>
                            <img class="rounded mb-2" src="{{ asset('./assets/uploads/cards/'.$item->image) }}" alt="Image here" />
                        </div>
                        <div class="grid grid-cols-2 bg-zinc-200 text-zinc-700 pb-2">
                            <div class="pl-2">
                                <p>Engine</p>
                                <p>HP</p>
                                <p>Torque</p>
                                <p>Weight</p>
                                <p>0-100</p>
                                <p>1/4 mile</p>
                                <p>P to W</p>
                            </div>
                            <div class="">
                                <p>{{ $item->engine }}</p>
                                <p>{{ $item->hp }} <span>bhp</span></p>
                                <p>{{ $item->tq }} <span>nm</span></p>
                                <p>{{ $item->weight }} <span>kg</span></p>
                                <p>{{ $item->ztoh }} <span>sec</span></p>
                                <p>{{ $item->qmile }} <span>sec</span></p>
                                <p>{{ $item->ptow }} <span>hp/ton</span></p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                            <p class="uppercase">{{ $item->category->name }}</p>
                            <p class=""><span class="mr-2">Tier</span>{{ $item->tier }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex items-center text-lg gap-2 justify-center mt-10 self-center bg-zinc-500 text-white py-3 px-2 rounded-xl border border-red-500">
                    <i class="fa-regular fa-folder-open"></i>
                    <p class="text-center">You don't have any Car Cards !!</p>
                </div>
                <h1 class="border border-red-500 bg-zinc-500 text-white py-3 px-2 rounded-xl text-center self-end">Buy some <a class="uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{ url('all-cards')}}">here</a></h1>
                @endforelse
            </div>
        </div>
        <div class="border-l-2 border-zinc-400 w-1 h-full"></div>
        <div class="">
            <p class="capitalize text-center mb-3">your tuning cards</p>
            <div class="grid grid-cols-2 gap-4">
                @forelse ($tuningcards as $item)
                <div class="flex flex-col">
                    <div class="flex justify-center gap-3 items-center bg-zinc-50 border border-zinc-300 my-2 py-2 rounded-2xl if_check">
                        <p class="text-lg uppercase">Check to add</p>
                        <input class="tuning" type="checkbox" name="tuning" id="" value="{{ $item->id }}">
                    </div>
                    <div class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-2 px-2 w-card_craft text-sm text-white">
                        <div class="font-medium mb-2 ml-1">{{ $item->name }}</div>
                        <div>
                            <img class="rounded mb-2" src="{{ asset('./assets/uploads/cards/'.$item->image) }}" alt="Image here" />
                        </div>
                        <div class="grid grid-cols-2 bg-zinc-200 text-zinc-700 pb-2">
                            <div class="pl-2">
                                <p>Engine</p>
                                <p>HP</p>
                                <p>Torque</p>
                                <p>Weight</p>
                                <p>0-100</p>
                                <p>1/4 mile</p>
                                <p>P to W</p>
                            </div>
                            <div class="">
                                <p>{{ $item->engine }}</p>
                                <p>{{ $item->hp }} <span>bhp</span></p>
                                <p>{{ $item->tq }} <span>nm</span></p>
                                <p>{{ $item->weight }} <span>kg</span></p>
                                <p>{{ $item->ztoh }} <span>sec</span></p>
                                <p>{{ $item->qmile }} <span>sec</span></p>
                                <p>{{ $item->ptow }} <span>hp/ton</span></p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                            <p class="uppercase">{{ $item->category->name }}</p>
                            <p class=""><span class="mr-2">Tier</span>{{ $item->tier }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="flex items-center text-lg gap-2 justify-center mt-10 self-center bg-zinc-500 text-white py-3 px-2 rounded-xl border border-red-500">
                    <i class="fa-regular fa-folder-open"></i>
                    <p class="text-center">You don't have Tuning Cards !</p>
                </div>
                <h1 class="border border-red-500 bg-zinc-500 text-white py-3 px-2 rounded-xl text-center self-end">Buy some <a class="uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{ url('all-cards')}}">here</a></h1>
                @endforelse
            </div>
        </div>
    </div>
    <input class="uppercase text-2xl mt-8 mb-2 py-3 px-4 border border-zinc-300 bg-sky-500 hover:bg-sky-400 hover:border-zinc-500 self-center text-white rounded-2xl ease-in duration-200 cursor-pointer" type="submit" value="craft" name="" id="">
</form>

@if (session('emptyCarCardError'))
    <script>
        setTimeout(function () {
            $("#emptyCarCardError").fadeOut("fast");
        }, 2500); // <-- time in milliseconds
    </script>
    <div id="emptyCarCardError" class="fixed top-fourty left-fourty flex flex-col gap-4 text-xl items-center bg-zinc-300 rounded-xl justify-center h-64 w-80 border-2 border-red-300">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-triangle-exclamation fa-2xl text-red-500 mb-3"></i>
            <i class="fa-solid fa-car-side fa-2xl text-sky-500 mb-3"></i>
        </div>
        <p class="font-bold text-red-500">{{ session("emptyCarCardError") }}</p>
    </div>
@endif 
@if (session('emptyTuningCardError'))
    <script>
        setTimeout(function () {
            $("#emptyTuningCardError").fadeOut("fast");
        }, 2500); // <-- time in milliseconds
    </script>
    <div id="emptyTuningCardError" class="fixed top-fourty left-fourty flex flex-col gap-4 text-xl items-center bg-zinc-300 rounded-xl justify-center h-64 w-80 border-2 border-red-300">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-triangle-exclamation fa-2xl text-red-500 mb-3"></i>
            <i class="fa-solid fa-bolt-lightning fa-2xl text-sky-500 mb-5"></i>
        </div>
        <p class="font-bold text-red-500">{{ session("emptyTuningCardError") }}</p>
    </div>
@endif 

<script src="{{asset('js/combine-cards.js')}}"></script>
@endsection