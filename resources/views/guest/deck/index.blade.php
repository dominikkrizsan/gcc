@extends('layouts.app')
@section('content')
<div class="flex flex-col items-center bg-zinc-100 border border-zinc-300 rounded-2xl w-max px-10 mx-auto my-5">
    <h1 class="text-2xl">{{Auth::user()->name}}'s Deck</h1>
    <h2 class="my-2">Here is the last card you crafted</h2>
    <h2 class="my-2">This card will be used in the game</h2>
</div>
<div id="card_bg" class="flex flex-col mx-auto rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
    <div class="font-medium mb-2 ml-1 flex justify-between">{{ $deck->name }}<span class="mr-1">TUNED</span></div>
    <div>
        <img
            class="rounded mb-2"
            src="{{ asset('./assets/uploads/cards/'.$deck->image) }}"
            alt="Image here"
        />
    </div>
    <div id="specs" class="grid grid-cols-2 bg-zinc-200 text-zinc-700 pb-2">
        <div class="pl-2">
            <p class="spec">Engine</p>
            <p class="spec">HP</p>
            <p class="spec">Torque</p>
            <p class="spec">Weight</p>
            <p class="spec">0-100</p>
            <p class="spec">1/4 mile</p>
            <p class="spec">P to W</p>
        </div>
        <div class="">
            <p class="spec">{{ $deck->engine }}</p>
            <p class="spec">{{ $deck->hp }} <span>bhp</span></p>
            <p class="spec">{{ $deck->tq }} <span>nm</span></p>
            <p class="spec">{{ $deck->weight }} <span>kg</span></p>
            <p class="spec">{{ $deck->ztoh }} <span>sec</span></p>
            <p class="spec">{{ $deck->qmile }} <span>sec</span></p>
            <p class="spec">{{ $deck->ptow }} <span>hp/ton</span></p>
        </div>
    </div>
    <div id="tier" class="grid grid-cols-2 justify-items-center items-center mt-3">
        <p class="uppercase">{{ $deck->category->name }}</p>
        <p><span><i class="fa-solid fa-arrow-up-wide-short mr-3"></i></span><span class="mr-2">Tier</span>{{ $deck->tier }}</p>
    </div>
</div>
<input id="tierval" type="hidden" value="{{ $deck->tier }}">

<script>
    $(document).ready(function() {
        const tier_val = $('#tierval').val();
        const tier_text = $('#tier');
        const bg = $('#card_bg');
        if(tier_val == 1) {
            tier_text.css('color', '#d1d5db');
            bg.attr({'style': 'background-image:linear-gradient(to bottom right, #6b7280 , black);'});
            $('.spec').css('color', '#4b5563');
        } else if (tier_val == 2) {
            tier_text.css('color', '#38bdf8');
            bg.attr({'style': 'background-image:linear-gradient(to bottom right, #38bdf8 , black);'});
            $('.spec').css('color', '#0284c7');
        } else if (tier_val == 3) {
            tier_text.css('color', '#10b981');
            bg.attr({'style': 'background-image:linear-gradient(to bottom right, #047857 , black);'});
            $('.spec').css('color', '#059669');
        } else if (tier_val == 4) {
            tier_text.css('color', '#ef4444');
            bg.attr({'style': 'background-image:linear-gradient(to bottom right, #b91c1c , black);'});
            $('.spec').css('color', '#dc2626');
        } else if (tier_val == 5) {
            tier_text.css('color', '#a855f7');
            bg.attr({'style': 'background-image:linear-gradient(to bottom right, #7e22ce , black);'});
            $('.spec').css('color', '#9333ea');
        }
    });
</script>
@endsection