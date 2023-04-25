@extends('layouts.app') @section('content')
<!-- card layout -->
<h1 class="text-4xl mt-3 text-center border-b border-sky-500 border-dotted w-max mx-auto pb-3 ">{{ Auth::user()->name }}'s inventory</h1>
<div class="flex items-center justify-center my-5 gap-3 bg-zinc-100 border border-zinc-300 py-3 rounded-xl px-5">
    <i class="fa-solid fa-person-circle-exclamation text-4xl text-sky-500 font-bold"></i>
    <h2 class="text-2xl text-center">You can combine your cards and add them to your deck <a class="font-bold uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{ url('combine-cards') }}">here</a></h2>
</div>
<div class="py-5 px-5 rounded-xl border border-zinc-300 bg-zinc-100 mt-3 mb-5">
    <div class="card_data">
        <div class="grid grid-cols-3 gap-8">
            @forelse($invitems as $item)
            <div class="flex flex-col items-center gap-4">
                <a class="bg-zinc-500 py-1 px-2 rounded-xl uppercase text-white hover:bg-zinc-600 ease-in duration-100" href="{{ url('confirm-sell/'.$item->cards->id) }}">sell for <span class="text-red-400">{{ $item->cards->price / 2 }}<i class="fa-solid fa-coins ml-1"></i></span></a>
                <div style="background-image:linear-gradient(to bottom right, #9ca3af , #111827);'" class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
                    @if (session('confirmSell'.$item->cards->id))
                        <div class="fixed top-1/3 left-1/3 flex flex-col gap-4 text-xl items-center bg-zinc-500 border border-red-500 rounded-xl justify-center h-64 w-80">
                        <i class="fa-solid fa-money-bill-transfer text-4xl"></i>
                        <p>Are you sure you want to sell?</p>
                        <div class="flex items-center gap-4">
                            <a class="py-1 px-2 bg-zinc-200 uppercase text-zinc-700 rounded-xl hover:bg-zinc-100 hover:border hover:border-sky-500 ease-in duration-100" href="{{ url('inventory') }}">cancel</a>
                            <a class="py-1 px-2 bg-zinc-200 uppercase text-red-500 rounded-xl hover:bg-zinc-100 hover:border hover:border-red-500 ease-in duration-100" href="{{ url('sell-from-inventory/'.$item->cards->id) }}">sell</a>
                        </div>
                    </div>
                    @endif
                    <div class="font-medium mb-2 ml-1">{{ $item->cards->name }}</div>
                    <div>
                        <img
                            class="rounded mb-2"
                            src="{{ asset('./assets/uploads/cards/'.$item->cards->image) }}"
                            alt="Image here"
                        />
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
                            <p>{{ $item->cards->engine }}</p>
                            <p>{{ $item->cards->hp }} <span>bhp</span></p>
                            <p>{{ $item->cards->tq }} <span>nm</span></p>
                            <p>{{ $item->cards->weight }} <span>kg</span></p>
                            <p>{{ $item->cards->ztoh }} <span>sec</span></p>
                            <p>{{ $item->cards->qmile }} <span>sec</span></p>
                            <p>{{ $item->cards->ptow }} <span>hp/ton</span></p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                        <p class="uppercase">{{ $item->cards->category->name }}</p>
                        <p class=""><span class="mr-2">Tier</span>{{ $item->cards->tier }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p></p>
            <div class="flex flex-col items-center justify-center place-self-center gap-4">
                <div class="flex items-center text-3xl gap-2 justify-center mt-10">
                    <i class="fa-regular fa-folder-open"></i>
                    <p class="font-bold text-center">Your inventory is empty !!</p>
                </div>
                <p class="text-center mb-5">Buy some cards <a class="uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{ url('all-cards')}}">here</a></p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@if (session('sellData'))
    <script>
        setTimeout(function () {
            $("#sellData").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="sellData" class="fixed top-1/3 left-1/3 flex flex-col gap-4 text-xl items-center bg-zinc-500 border border-red-500 rounded-xl justify-center h-64 w-80">
        <p>{{ session("sellData") }}</p>
    </div>
    @endif
@endsection