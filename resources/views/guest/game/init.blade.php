@extends('layouts.game') @section('content')
<div class="w-128 mx-auto">
    <div
        class="flex flex-col justify-center items-center bg-zinc-100 mt-5 rounded-2xl border-2 border-sky-100 p-3"
    >
        <form
            id="myForm"
            action="{{ url('make-result') }}"
            enctype="multipart/form-data"
            method="POST"
        >
            @csrf
            <div class="flex flex-col items-center gap-2">
                <h1
                    class="text-3xl font-bold text-center text-sky-500 uppercase"
                >
                    game init
                </h1>
                <p class="uppercase">
                    you are playing against
                    <span class="text-sky-500"
                        >{{ $botData->name }}
                        <span class="text-black font-bold">/</span> level
                        {{ $botData->level }}</span
                    >
                    bot
                </p>
                <p class="text-center text-lg">
                    Click the button to start the duel
                </p>
            </div>
            <div
                class="grid grid-cols-game w-full justify-items-center align-center mt-5"
            >
                {{-- player --}}
                <div class="flex flex-col items-center gap-2">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-user-ninja fa-xl"></i>
                        <h2 class="uppercase font-bold">your card</h2>
                    </div>
                    <div
                        id="card_bg"
                        class="flex flex-col mx-auto rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white"
                    >
                        <div class="font-medium mb-2 ml-1 flex justify-between">
                            {{ $deck->name }}<span class="mr-1">TUNED</span>
                        </div>
                        <div>
                            <img
                                class="rounded mb-2"
                                src="{{ asset('./assets/uploads/cards/'.$deck->image) }}"
                                alt="Image here"
                            />
                        </div>
                        <div
                            id="specs"
                            class="grid grid-cols-2 bg-zinc-200 text-zinc-700 pb-2"
                        >
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
                                <p class="spec">
                                    {{ $deck->hp }} <span>bhp</span>
                                </p>
                                <input
                                    id="deck_hp"
                                    type="hidden"
                                    value="{{ $deck->hp }}"
                                />
                                <p class="spec">
                                    {{ $deck->tq }} <span>nm</span>
                                </p>
                                <input
                                    id="deck_tq"
                                    type="hidden"
                                    value="{{ $deck->tq }}"
                                />
                                <p class="spec">
                                    {{ $deck->weight }} <span>kg</span>
                                </p>
                                <p class="spec">
                                    {{ $deck->ztoh }} <span>sec</span>
                                </p>
                                <input
                                    id="deck_ztoh"
                                    type="hidden"
                                    value="{{ $deck->ztoh }}"
                                />
                                <p class="spec">
                                    {{ $deck->qmile }} <span>sec</span>
                                </p>
                                <input
                                    id="deck_qmile"
                                    type="hidden"
                                    value="{{ $deck->qmile }}"
                                />
                                <p class="spec">
                                    {{ $deck->ptow }} <span>hp/ton</span>
                                </p>
                                <input
                                    id="deck_ptow"
                                    type="hidden"
                                    value="{{ $deck->ptow }}"
                                />
                            </div>
                        </div>
                        <div
                            id="tier"
                            class="grid grid-cols-2 justify-items-center items-center mt-3"
                        >
                            <p class="uppercase">{{ $deck->category->name }}</p>
                            <p>
                                <span
                                    ><i
                                        class="fa-solid fa-arrow-up-wide-short mr-3"
                                    ></i></span
                                ><span class="mr-2">Tier</span>{{ $deck->tier }}
                            </p>
                        </div>
                        <input
                            id="tierval"
                            type="hidden"
                            value="{{ $deck->tier }}"
                        />
                    </div>
                </div>
                <input
                    id="do_duel"
                    class="place-self-center bg-sky-500 text-white py-2 px-3 text-2xl uppercase rounded-xl border border-zinc-400 hover:bg-sky-400 hover:border-zinc-500 ease-in duration-100 cursor-pointer"
                    type="submit"
                    value="duel!"
                />
                {{-- bot --}}
                <div class="flex flex-col items-center gap-2">
                    <div class="flex items-center gap-2 mb-2">
                        <i class="fa-solid fa-robot fa-xl"></i>
                        <h2 class="uppercase font-bold">
                            {{ $botData->name }}'s card
                        </h2>
                    </div>
                    <div
                        style="
                            background-image: linear-gradient(
                                to bottom right,
                                #ea580c,
                                #111827
                            );
                        "
                        class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white"
                    >
                        <div class="font-medium mb-2 ml-1">
                            {{ $botData->card->name }}
                        </div>
                        <div>
                            <img
                                class="rounded mb-2"
                                src="{{ asset('./assets/uploads/cards/'.$botData->card->image) }}"
                                alt="Image here"
                            />
                        </div>
                        <div
                            class="grid grid-cols-2 bg-zinc-200 text-gray-700 pb-2"
                        >
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
                                <p id="car_hp">
                                    {{ $botData->card->hp }} <span>bhp</span>
                                </p>
                                <input
                                    id="bot_hp"
                                    type="hidden"
                                    value="{{ $botData->card->hp }}"
                                />
                                <p id="car_tq">
                                    {{ $botData->card->tq }} <span>nm</span>
                                </p>
                                <input
                                    id="bot_tq"
                                    type="hidden"
                                    value="{{ $botData->card->tq }}"
                                />
                                <p>
                                    {{ $botData->card->weight }} <span>kg</span>
                                </p>
                                <p id="car_ztoh">
                                    {{ $botData->card->ztoh }} <span>sec</span>
                                </p>
                                <input
                                    id="bot_ztoh"
                                    type="hidden"
                                    value="{{ $botData->card->ztoh }}"
                                />
                                <p id="car_qmile">
                                    {{ $botData->card->qmile }} <span>sec</span>
                                </p>
                                <input
                                    id="bot_qmile"
                                    type="hidden"
                                    value="{{ $botData->card->qmile }}"
                                />
                                <p id="car_ptow">
                                    {{ $botData->card->ptow }}
                                    <span>hp/ton</span>
                                </p>
                                <input
                                    id="bot_ptow"
                                    type="hidden"
                                    value="{{ $botData->card->ptow }}"
                                />
                            </div>
                        </div>
                        <div
                            class="grid grid-cols-2 justify-items-center items-center mt-3"
                        >
                            <p class="uppercase">
                                {{ $botData->card->category->name }}
                            </p>
                            <p class="">
                                <span class="mr-2">Tier</span
                                >{{ $botData->card->tier }}
                            </p>
                            <input
                                id="bot_card_tier"
                                type="hidden"
                                value="{{ $botData->card->tier }}"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="bot_id" value="{{ $botData->id }}" />
            <input id="score" type="hidden" name="score" />
            <input id="result" type="hidden" name="result" />
            <input id="balanceget" type="hidden" name="balanceget" />
            <p id="try">try</p>
        </form>
    </div>
</div>

<script src="{{asset('js/game-init.js')}}"></script>
@endsection
