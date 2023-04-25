@extends('layouts.app') @section('content')
<div class="w-128 mx-auto">
    <div class="py-4 ml-3 uppercase flex items-center gap-3">
        <p>{{ $cards->category->name }} / </p>
        <p>@if(isset($cardprev)) <a class="text-zinc-500 hover:text-zinc-700 ease-in duration-100" href="{{ url('category/'.$cards->category->slug.'/'.$cardprev->slug) }}"><i class="fa-solid fa-arrow-left text-lg"></i></a> @endif</p>
        <p class="text-sky-500">{{ $cards->name }}</p>
        <p>@if(isset($cardnext)) <a class="text-zinc-500 hover:text-zinc-700 ease-in duration-100" href="{{ url('category/'.$cards->category->slug.'/'.$cardnext->slug) }}"><i class="fa-solid fa-arrow-right text-lg"></i></a> @endif</p>
    </div>
    
    <div class="bg-zinc-300 py-5 px-4 flex justify-stretch gap-10 w-full mx-auto rounded-xl shadow-lg border border-zinc-300">
        <div class="card_data">
            <div style="background-image:linear-gradient(to bottom right, #9ca3af , #111827);'" class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-3 px-4 w-card text-xl text-white">
                <div class="font-medium mb-2 ml-1">{{ $cards->name }}</div>
                <div>
                    <img
                        class="rounded mb-2"
                        src="{{ asset('./assets/uploads/cards/'.$cards->image) }}"
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
                    <div>
                        <p>{{ $cards->engine }}</p>
                        <p>{{ $cards->hp }} <span>bhp</span></p>
                        <p>{{ $cards->tq }} <span>nm</span></p>
                        <p>{{ $cards->weight }} <span>kg</span></p>
                        <p>{{ $cards->ztoh }} <span>sec</span></p>
                        <p>{{ $cards->qmile }} <span>sec</span></p>
                        <p>{{ $cards->ptow }} <span>hp/ton</span></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                    <p class="uppercase">{{ $cards->category->name }}</p>
                    <p><span class="mr-2">Tier</span>{{ $cards->tier }}</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col items-start gap-2 w-full">
            <div class="flex items-center gap-4 justify-between w-full border-b border-zinc-200 pb-3">
                <h1 class="uppercase font-bold text-sky-500 text-2xl">{{ $cards->name }}</h1>
                @if ($cards->trending == '1')
                <p class="text-white py-1 px-2 bg-red-700 rounded-xl uppercase">Trending</p>
                @endif
            </div>
            <div class="flex flex-col items-start">
                <div class="border-b border-zinc-200 pb-3 w-full">
                    <p class="mb-3">About the Card's category</p>
                    <p class="">
                        {{ $cards->category->description }}
                    </p>
                </div>
                <div class="mt-3 flex items-center justify-start gap-16">
                    <p>Cost</p>
                    <div class="flex items-center gap-2 text-emerald-500 font-bold">
                        <p>{{ $cards->price }}</p>
                        <i class="fa-solid fa-coins"></i>
                    </div>
                </div>
                <div class="flex items-center gap-8 mt-3 border-b w-full pb-3 border-zinc-200">
                    <p>Quantity</p>
                    <p>{{ $cards->qty }} <span>available</span></p>
                </div>
                <div class="mt-5">
                    <input
                        type="hidden"
                        value="{{ $cards->id }}"
                        id="card_id"
                    />
                    <a id="add-to-cart" class="bg-sky-500 hover:bg-sky-600 text-white py-1 px-2 rounded-xl ease-in duration-100 flex items-center gap-2 w-max uppercase" href="#"
                        >Add to Cart <i class="fa-solid fa-cart-shopping"></i
                    ></a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#add-to-cart").click(function (e) {
            e.preventDefault();
            
            const card_id = $("#card_id").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: { card_id: card_id },
                
                success: function (response) {
                    //alert(response.status);
                    swal(response.status , "");
                },
            });
        });
    });
</script>

@endsection
