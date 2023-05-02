@extends('layouts.app')

@section('content')
<div class="w-128 mx-auto mb-10">
    <h1 class="text-center text-3xl mt-5">Welcome to GCC webshop <span class="text-sky-500">{{ Auth::user()->name }}</span></h1>
    <div class="border-b border-zinc-200 w-1/2 mx-auto my-3"></div>

    <h2 class="my-3 font-bold text-2xl">Featured Cards</h2>

    <div class="flex items-center gap-6">
        @foreach ($featured_cards as $item)

        <a class="hover:shadow-2xl ease-in duration-200 rounded-xl" href="{{ url('category/'.$item->category->slug.'/'.$item->slug) }}">
            <div style="background-image:linear-gradient(to bottom right, #9ca3af , #111827);'" class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
                <div class="font-medium mb-2 ml-1">{{ $item->name }}</div>
                <div>
                    <img
                        class="rounded mb-2"
                        src="{{ asset('./assets/uploads/cards/'.$item->image) }}"
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
        </a>
        @endforeach
    </div>

    <h2 class="mb-3 mt-5 font-bold text-2xl">Trending Categories</h2>

    <div class="grid grid-cols-3 gap-5 mt-5">
    
        @foreach($trending_category as $item)
        <a href="{{ url('category/'.$item->slug) }}">
            <div class="py-2 px-3 bg-zinc-200 flex flex-col gap-2 border border-zinc-300 shadow-xl">
                <img
                    class="w-max"
                    src="{{ asset('assets/uploads/category/'.$item->image) }}"
                    alt="Image here"
                />
                <p>{{ $item->name }}</p>
                <p>{{ $item->description }}</p>
            </div>
        </a>
        @endforeach
       
    </div>
</div>

@if (session('updateData'))
    <script>
        setTimeout(function () {
            $("#updateData").fadeOut("fast");
        }, 2000); // <-- time in milliseconds
    </script>
    <div id="updateData" class="fixed top-fourty left-fourty flex flex-col gap-4 text-xl items-center bg-zinc-300 rounded-xl justify-center h-64 w-80 border-2 border-sky-300">
        <div class="flex items-center gap-4">
            <i class="fa-solid fa-square-check fa-2xl text-sky-500 mb-3"></i>
        </div>
        <p class="font-bold">{{ session("updateData") }}</p>
    </div>
@endif 
@endsection
