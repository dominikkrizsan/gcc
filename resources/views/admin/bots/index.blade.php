@extends('layouts.admin')

@section('content')
<div class="text-xl mt-5 ml-3 flex items-center gap-20">
    <p class="text-4xl uppercase font-bold text-zinc-700">Bots</p>
    <a class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100" href="{{ url('add-bot') }}">add new bot</a>
</div>
<div class="border-b-2 border-sky-400 w-28 mt-2 mb-5"></div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-table mb-5">
    <table class="w-full text-xl text-left text-gray-200">
        <thead class="text-xl uppercase bg-sky-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Level
                </th>
                <th scope="col" class="px-6 py-3">
                    Profile Pic
                </th>
                <th scope="col" class="px-6 py-3">
                    Bot's Card
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($bots as $item)
            <tr class="border-b bg-zinc-700 border-zinc-500 hover:bg-gray-700 ease-in duration-100">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    {{ $item->id }}
                </th>
                <td class="px-6 py-4 capitalize">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->level }}
                </td>
                <td class="px-6 py-4">
                    <img
                        class="w-20 rounded-xl"
                        src="{{ asset('assets/uploads/bots/'.$item->image) }}"
                        alt="Image here"
                    />
                </td>
                <td class="px-6 py-4">
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
                                    <p>{{ $item->card->hp }} <span>bhp</span></p>
                                    <p>{{ $item->card->tq }} <span>nm</span></p>
                                    <p>{{ $item->card->weight }} <span>kg</span></p>
                                    <p>{{ $item->card->ztoh }} <span>sec</span></p>
                                    <p>{{ $item->card->qmile }} <span>sec</span></p>
                                    <p>{{ $item->card->ptow }} <span>hp/ton</span></p>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 justify-items-center items-center mt-1">
                                <p class="uppercase">{{ $item->card->category->name }}</p>
                                <p class=""><span class="mr-1">Tier</span>{{ $item->card->tier }}</p>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <a class="hover:text-sky-300 ease-in duration-100" href="{{ url('edit-bot/'.$item->id) }}">Edit</a>
                    <a class="hover:text-red-500 ease-in duration-100" href="{{ url('confirm-bot-delete/'.$item->id) }}">Delete</a>
                </td>
            </tr>
            @if (session('confirmBotDelete'.$item->id))
            <div class="alert-container">
                <i class="fa-solid fa-trash fa-2xl"></i>
                <p>{{ session("confirmBotDelete") }}</p>
                <div>
                    <a href="{{ url('bots') }}">cancel</a>
                    <a href="{{ url('delete-bot/'.$item->id) }}">delete</a>
                </div>
            </div>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
    @if (session('updatedata'))
    <script>
        setTimeout(function () {
            $("#updatedata").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="updatedata" class="updatemessage">
        <i class="fa-solid fa-square-check fa-2xl"></i>
        <p>{{ session("updatedata") }}</p>
    </div>
    @endif @if (session('deleteBotData'))
    <script>
        setTimeout(function () {
            $("#deleteBotData").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="deleteBotData" class="deletemessage">
        <p>{{ session("deleteBotData") }}</p>
    </div>
    @endif
@endsection