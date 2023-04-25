@extends('layouts.game')
@section('content')
<div class="w-128 mx-auto">
    <div class="flex flex-col justify-center items-center bg-zinc-100 mt-5 rounded-2xl border-2 border-sky-100 p-3">
        <form id="myForm" action="{{ url('make-result') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="flex flex-col items-center gap-2">
                <h1 class="text-3xl font-bold text-center text-sky-500 uppercase">game init</h1>
                <p class="uppercase">you are playing against <span class="text-sky-500">{{ $botData->name }} <span class="text-black font-bold">/</span> level {{ $botData->level }}</span> bot</p>
                <p class="text-center text-lg">Click the button to start the duel</p>
            </div>
            <div class="grid grid-cols-game w-full justify-items-center align-center mt-5">
                {{-- player --}}
                <div class="flex flex-col items-center gap-2"> 
                    <h2 class="uppercase font-bold">your card</h2>
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
                                    <input id="deck_hp" type="hidden" value="{{ $deck->hp }}">
                                <p class="spec">{{ $deck->tq }} <span>nm</span></p>
                                    <input id="deck_tq" type="hidden" value="{{ $deck->tq }}">
                                <p class="spec">{{ $deck->weight }} <span>kg</span></p>
                                <p class="spec">{{ $deck->ztoh }} <span>sec</span></p>
                                    <input id="deck_ztoh" type="hidden" value="{{ $deck->ztoh }}">
                                <p class="spec">{{ $deck->qmile }} <span>sec</span></p>
                                    <input id="deck_qmile" type="hidden" value="{{ $deck->qmile }}">
                                <p class="spec">{{ $deck->ptow }} <span>hp/ton</span></p>
                                    <input id="deck_ptow" type="hidden" value="{{ $deck->ptow }}">
                            </div>
                        </div>
                        <div id="tier" class="grid grid-cols-2 justify-items-center items-center mt-3">
                            <p class="uppercase">{{ $deck->category->name }}</p>
                            <p><span><i class="fa-solid fa-arrow-up-wide-short mr-3"></i></span><span class="mr-2">Tier</span>{{ $deck->tier }}</p>
                        </div>
                        <input id="tierval" type="hidden" value="{{ $deck->tier }}">
                    </div>
                </div>
                <input id="do_duel" class="place-self-center bg-sky-500 text-white py-2 px-3 text-2xl uppercase rounded-xl border border-zinc-400 hover:bg-sky-400 hover:border-zinc-500 ease-in duration-100 cursor-pointer" type="submit" value="duel!">
                {{-- bot --}}
                <div class="flex flex-col items-center gap-2">
                    <h2 class="uppercase font-bold">{{ $botData->name }}'s card</h2>
                    <div style="background-image:linear-gradient(to bottom right, #ea580c , #111827);'" class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
                        <div class="font-medium mb-2 ml-1">{{ $botData->card->name }}</div>
                        <div>
                            <img
                                class="rounded mb-2"
                                src="{{ asset('./assets/uploads/cards/'.$botData->card->image) }}"
                                alt="Image here"
                            />
                        </div>
                        <div class="grid grid-cols-2 bg-zinc-200 text-gray-700 pb-2">
                            <div class="pl-2">
                                <p>Engine</p>
                                <p>HP</p>
                                <p>Torque</p>
                                <p>Weight</p>
                                <p>0-100</p>
                                <p>1/4 mile</p>
                                <p>P to W</p>
                            </div>
                            <div class="cursor-not-allowed">
                                <p>{{ $botData->card->engine }}</p>
                                <p id="car_hp">{{ $botData->card->hp }} <span>bhp</span></p>
                                    <input id="bot_hp" type="hidden" value="{{ $botData->card->hp }}">
                                <p id="car_tq">{{ $botData->card->tq }} <span>nm</span></p>
                                    <input id="bot_tq" type="hidden" value="{{ $botData->card->tq }}">
                                <p>{{ $botData->card->weight }} <span>kg</span></p>
                                <p id="car_ztoh">{{ $botData->card->ztoh }} <span>sec</span></p>
                                    <input id="bot_ztoh" type="hidden" value="{{ $botData->card->ztoh }}">
                                <p id="car_qmile">{{ $botData->card->qmile }} <span>sec</span></p>
                                    <input id="bot_qmile" type="hidden" value="{{ $botData->card->qmile }}">
                                <p id="car_ptow">{{ $botData->card->ptow }} <span>hp/ton</span></p>
                                    <input id="bot_ptow" type="hidden" value="{{ $botData->card->ptow }}">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                            <p class="uppercase">{{ $botData->card->category->name }}</p>
                            <p class=""><span class="mr-2">Tier</span>{{ $botData->card->tier }}</p>
                                <input id="bot_card_tier" type="hidden" value="{{ $botData->card->tier }}">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="bot_id" value="{{ $botData->id }}">
            <input id="score" type="hidden" name="score">
            <input id="result" type="hidden" name="result">
            <input id="balanceget" type="hidden" name="balanceget">
            <p id="try">try</p>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        // data
            // car data 4 style
        const carhp = $('#car_hp');
        const cartq = $('#car_tq');
        const carztoh = $('#car_ztoh');
        const carqmile = $('#car_qmile');
        const carptow = $('#car_ptow');
            // bot data
        const bothp = $('#bot_hp').val();
        const bottq = $('#bot_tq').val();
        const botztoh = $('#bot_ztoh').val();
        const botqmile = $('#bot_qmile').val();
        const botptow = $('#bot_ptow').val();
            // deck data
        const deckhp = $('#deck_hp').val();
        const decktq = $('#deck_tq').val();
        const deckztoh = $('#deck_ztoh').val();
        const deckqmile = $('#deck_qmile').val();
        const deckptow = $('#deck_ptow').val();
            // game data
        let botpoints = 0;
        let playerpoints = 0;
        let winner = '';
        let balanceget = 0;
        const bot_tier = $('#bot_card_tier').val();

        // calculate results
            // calculate time values
        const bottimesresult = parseFloat(botztoh) + parseFloat(botqmile);
        const decktimesresult = parseFloat(deckztoh) + parseFloat(deckqmile);
            // calculate hp and tq
        const botstrength = parseInt(bothp) + parseInt(bottq);
        const deckstrength = parseInt(deckhp) + parseInt(decktq);
            // calculate balanceget
        if(bot_tier == 1) {
            balanceget = 50;
        } else if (bot_tier == 2) {
            balanceget = 75;
        } else if (bot_tier == 3) {
            balanceget = 100;
        } else if (bot_tier == 4) {
            balanceget = 150;
        } else if (bot_tier == 5) {
            balanceget = 300;
        }

        
        // invisble on load
        carhp.css('color', '#e4e4e7');
        cartq.css('color', '#e4e4e7');
        carztoh.css('color', '#e4e4e7');
        carqmile.css('color', '#e4e4e7');
        carptow.css('color', '#e4e4e7');

        // result
        $( "#try" ).on( "click", function() {
            // change to visible
           carhp.css('color', '#3f3f46');
            cartq.css('color', '#3f3f46');
            carztoh.css('color', '#3f3f46');
            carqmile.css('color', '#3f3f46');
            carptow.css('color', '#3f3f46');
            // measure times
            if(decktimesresult > bottimesresult) {
                botpoints++;
            } else {
                playerpoints++;
            }
            if(deckstrength > botstrength) {
                playerpoints++;
            } else {
                botpoints++;
            }
            if(deckptow > botptow) {
                playerpoints++;
            } else {
                botpoints++;
            }
            if(playerpoints > botpoints) {
                winner = 'player';
                $('#score').val(playerpoints+'-'+botpoints);
                $('#result').val(winner);
                $('#balanceget').val(balanceget);
                swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "Good job, YOU WIN",
                icon: "success",
                button: "Continue",
                });
            } else {
                balanceget = 0;
                winner = 'bot';
                $('#score').val(playerpoints+'-'+botpoints);
                $('#result').val(winner);
                $('#balanceget').val(balanceget);
                swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "You lost!",
                icon: "warning",
                button: "Continue",
                });
            }
        } );

        //----------------------------------------------------------it lesz ha mukodik minden
        // do duel
        // $( "#do_duel" ).on( "click", function() {
        //    // change to visible
        //    carhp.css('color', '#3f3f46');
        //     cartq.css('color', '#3f3f46');
        //     carztoh.css('color', '#3f3f46');
        //     carqmile.css('color', '#3f3f46');
        //     carptow.css('color', '#3f3f46');
        //     // measure times
        //     if(decktimesresult > bottimesresult) {
        //         botpoints++;
        //     } else {
        //         playerpoints++;
        //     }
        //     if(deckstrength > botstrength) {
        //         playerpoints++;
        //     } else {
        //         botpoints++;
        //     }
        //     if(deckptow > botptow) {
        //         playerpoints++;
        //     } else {
        //         botpoints++;
        //     }
        //     if(playerpoints > botpoints) {
        //         winner = 'player';
        //         $('#score').val(playerpoints+'-'+botpoints);
        //         $('#result').val(winner);
        //         $('#balanceget').val(balanceget);
        //         swal({
        //         title: "The score is " + playerpoints + " - " + botpoints,
        //         text: "Good job, YOU WIN",
        //         icon: "success",
        //         button: "Continue",
        //         });
        //     } else {
        //         balanceget = 0;
        //         winner = 'bot';
        //         $('#score').val(playerpoints+'-'+botpoints);
        //         $('#result').val(winner);
        //         $('#balanceget').val(balanceget);
        //         swal({
        //         title: "The score is " + playerpoints + " - " + botpoints,
        //         text: "You lost!",
        //         icon: "warning",
        //         button: "Continue",
        //         });
        //     }
        // } );
        //----------------------------------------------------------it fent lesz ha mukodik minden

        // delay form submission
        $('#myForm').submit( function(event) {
            var formId = this.id,
                form = this;
            mySpecialFunction(formId);

            event.preventDefault();

            setTimeout( function () { 
                form.submit();
            }, 300);
        }); 

        // tier alapjan color set
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