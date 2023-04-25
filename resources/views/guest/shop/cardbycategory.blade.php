@extends('layouts.app') @section('content')
<div class="w-128 mx-auto">
    <h1 class="pl-3 font-bold text-3xl uppercase mt-3">{{ $category->name }}s</h1>
    <div class="border-b-2 border-sky-500 my-3 w-44"></div>
</div>
<div class="grid grid-cols-4 gap-5 mt-5 mb-5">
    @foreach($cards as $item)
    <div class="p-4 border border-zinc-300 w-max bg-zinc-50 hover:border-zinc-400 hover:shadow-2xl ease-in duration-200">

        <div class="grid grid-cols-2 gap-2 justify-items-center mb-3 text-xl">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                <p class="text-emerald-500">{{ $item->price }} <span class="">coin</span></p>
            </div>
            <div class="flex items-center gap-2">
                <a class="bg-sky-500 hover:bg-sky-600 text-white py-1 px-2 rounded-xl ease-in duration-100 flex items-center gap-2" href="{{ url('category/'.$item->category->slug.'/'.$item->slug) }}"
                    >
                    <i class="fa-solid fa-cart-plus fa-base"></i>
                    <p class="uppercase">Add to cart</p>
                    </a
                >
            </div>
        </div>

        <a href="{{ url('category/'.$item->category->slug.'/'.$item->slug) }}">
            <div style="background-image:linear-gradient(to bottom right, #9ca3af , #111827);'" class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
                <div class="font-medium mb-2 ml-1">{{ $item->name }}</div>
                <div>
                    <img
                        class="rounded mb-2"
                        src="{{ asset('./assets/uploads/cards/'.$item->image) }}"
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
    </div>
    @endforeach
</div> 
@endsection