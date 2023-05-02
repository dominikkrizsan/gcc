@extends('layouts.app') @section('content')
<div class="bg-zinc-300 w-max mx-auto rounded-2xl mt-3 border border-sky-200 shadow">
    <div class="grid grid-cols-3 py-5 justify-items-center gap-4">
        <div class="flex items-center gap-8 capitalize">
            <div class="flex flex-col gap-3 items-center">
                <i class="fa-solid fa-stopwatch fa-xl"></i>
                <p>sort by latest or oldest</p>
            </div>
            <div class="flex flex-col items-center gap-2 uppercase text-white">
                <a class="py-1 px-2 bg-sky-400 rounded-xl hover:bg-sky-500 hover:shadow ease-in duration-100" href="{{ url('filter-latest')}}">latest <i class="fa-solid fa-circle-arrow-up"></i></a>
                <a class="py-1 px-2 bg-sky-400 rounded-xl hover:bg-sky-500 hover:shadow ease-in duration-100" href="{{ url('filter-oldest')}}">oldest <i class="fa-solid fa-circle-arrow-down"></i></a>
            </div>
        </div>
        <form class="w-96 max-[550px]:w-64 mt-2 mx-auto" type="get" action="{{ url('search-cards') }}">
            @csrf
            <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-zinc-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input name="query" type="search" id="default-search" class="block w-full p-4 pl-10 text-base border border-zinc-300 rounded-lg focus:ring-sky-500 focus:border-sky-500 bg-zinc-600 border-zinc-600 placeholder-zinc-400 text-white focus:ring-sky-500 focus:border-sky-500" placeholder="Search the name of a card..." required>
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2 focus:ring-sky-800 ease-in duration-100">Search</button>
            </div>
        </form>
        <div class="flex items-center gap-8 capitalize">
            <div class="flex flex-col items-center gap-2 uppercase text-white">
                <a class="py-1 px-2 bg-sky-400 rounded-xl hover:bg-sky-500 hover:shadow ease-in duration-100" href="{{ url('all-cards')}}">name asc <i class="fa-solid fa-arrow-up-9-1"></i></a>
                <a class="py-1 px-2 bg-sky-400 rounded-xl hover:bg-sky-500 hover:shadow ease-in duration-100" href="{{ url('filter-name-desc')}}">name desc <i class="fa-solid fa-arrow-down-9-1"></i></a>
            </div>
            <div class="flex flex-col gap-3 items-center">
                <i class="fa-solid fa-file-signature fa-xl"></i>
                <p>sort by name</p>
            </div>
        </div>
    </div>
</div>

    <div class="grid grid-cols-4 gap-5 mt-5 mb-5">
        @foreach($cards as $item)
        <div class="p-4 border border-zinc-300 w-max bg-zinc-50 hover:shadow-2xl hover:border-zinc-400 ease-in duration-200">

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