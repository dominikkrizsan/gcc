@extends('layouts.admin') @section('content')
<div class="text-xl mt-5 ml-3 flex items-center gap-20">
    <p class="text-4xl uppercase font-bold text-zinc-700">cards</p>
    <a class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100" href="{{ url('add-card') }}">add card</a>
</div>
<div class="border-b-2 border-sky-400 w-32 mt-2 mb-5"></div>
<!-- card layout -->
    <div class="grid grid-cols-4 max-[1700px]:grid-cols-3 max-[1300px]:grid-cols-2 max-[1000px]:grid-cols-1 max-[1000px]:justify-items-center">
        @foreach($cards as $item)
        <div class="p-4 border border-zinc-300 w-max bg-zinc-50 hover:shadow-2xl ease-in duration-200 mb-5">
            <div class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
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

            <div class="grid grid-cols-2 gap-2 justify-items-center mt-3 text-xl">
                <div class="flex items-center gap-3">
                    <p>Price</p>
                    <i class="fa-solid fa-money-check-dollar fa-xl"></i>
                </div>
                <p>Actions</p>
                <div class="text-emerald-500">
                    <p class="">{{ $item->price }} <span class="">coin</span></p>
                </div>
                <div class="flex items-center gap-3">
                    <a class="text-sky-500 hover:text-sky-600 ease-in duration-100" href="{{ url('edit-card/'.$item->id) }}"
                        >Edit</a
                    >
                    <a
                        class="text-red-500 hover:text-red-600 ease-in duration-100"
                        href="{{ url('confirm-card-delete/'.$item->id) }}"
                        >Delete</a
                    >
                </div>
            </div>
        </div>
        @if (session('confirmCardDelete'.$item->id))
            <div class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
                <i class="fa-solid fa-trash fa-2xl text-zinc-500"></i>
                <p class="mt-3">{{ session("confirmCardDelete") }}</p>
                <div>
                    <a class="text-sky-600 bg-zinc-300 hover:text-sky-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('cards') }}">cancel</a>
                    <a class="text-red-600 bg-zinc-300 hover:text-red-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('delete-card/'.$item->id) }}">delete</a>
                </div>
            </div>
        @endif 
        @endforeach
    </div>


@if (session('updatedata'))
    <script>
        setTimeout(function () {
            $("#updatedata").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="updatedata" class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
        <i class="fa-solid fa-square-check fa-2xl text-emerald-500 mb-3"></i>
        <p>{{ session("updatedata") }}</p>
    </div>
@endif 

@if (session('deleteCardData'))
    <script>
        setTimeout(function () {
            $("#deleteCardData").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="deleteCardData" class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
        <p>{{ session("deleteCardData") }}</p>
    </div>
@endif 

@endsection
