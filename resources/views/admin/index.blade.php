@extends('layouts.admin')
@section('content')
<div class="flex justify-center items-end gap-4 text-sky-500 font-bold mb-3 mt-10">
    <h1 class="text-2xl mt-3">Admin dashboard</h1>
</div>
<div class="grid grid-cols-3 w-max gap-6 mx-auto mt-10">
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-solid fa-people-group text-4xl"></i>
        <p>All users</p>
        <p class="text-sky-500">{{ $countUser }}</p>
    </div>
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-brands fa-sellsy text-4xl"></i>
        <p>All cards sold</p>
        <p class="text-sky-500">{{ $countSoldCards }}</p>
    </div>
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-solid fa-compass-drafting text-4xl"></i>
        <p>Total cards crafted</p>
        <p class="text-sky-500">{{ $countCraftedCards->id }}</p>
    </div>
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-solid fa-upload text-4xl"></i>
        <p>Total cards published</p>
        <p class="text-sky-500">{{ $countCardsPublished }}</p>
    </div>
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-brands fa-android text-4xl"></i>
        <p>Bots in the game</p>
        <p class="text-sky-500">{{ $countBots }}</p>
    </div>
    <div class="flex flex-col gap-1 items-center justify-center text-2xl border border-zinc-400 shadow-xl bg-zinc-300 rounded-xl py-5 px-3">
        <i class="fa-solid fa-trophy text-4xl"></i>
        <p>Total games played</p>
        <p class="text-sky-500">{{ $countAllGames }}</p>
    </div>
</div>
@if (session('updateData'))
    <script>
        setTimeout(function () {
            $("#updateData").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="updateData" class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-300 rounded-xl justify-center h-64 w-80 border-2 border-sky-300">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-square-check fa-2xl text-sky-500 mb-3"></i>
        </div>
        <p class="font-bold">{{ session("updateData") }}</p>
    </div>
@endif 
@endsection