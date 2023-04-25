@extends('layouts.app') @section('content')
<div class="w-128 mx-auto p-3 bg-zinc-100 border-r border-l border-b border-zinc-300 shadow-xl flex flex-col gap-10">
        <h1 class="text-4xl mt-3 text-center border-b border-sky-500 border-dotted w-max mx-auto pb-3">{{ Auth::user()->name }}'s cart</h1>
        @php 
            $total = 0;
            $card_ids = [];
        @endphp 
        @forelse ($cartitems as $item)
        <div class="card_data grid grid-cols-cart gap-10 py-5 px-5 rounded-xl border border-zinc-200 bg-zinc-50">
            {{-- card layout --}}
            <div class="flex flex-col rounded-xl border border-zinc-700 bg-zinc-600 py-1 px-2 w-card_cart text-white text-base">
                <div class="font-medium mb-2 ml-1">
                    <span
                        >{{ $item->cards->name }}</span
                    >
                </div>
                <div class="rounded mb-2">
                    <img
                        src="{{ asset('assets/uploads/cards/'.$item->cards->image) }}"
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
                    <div>
                        <p>{{ $item->cards->engine }}</p>
                        <p>{{ $item->cards->hp }} <span>bhp</span></p>
                        <p>{{ $item->cards->tq }} <span>nm</span></p>
                        <p>{{ $item->cards->weight }} <span>kg</span></p>
                        <p>{{ $item->cards->ztoh }} <span>sec</span></p>
                        <p>{{ $item->cards->qmile }} <span>sec</span></p>
                        <p>{{ $item->cards->ptow }} <span>hp/ton</span></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 justify-items-center items-center mt-3">
                    <p class="uppercase">
                        {{ $item->cards->category->name }}
                    </p>
                    <p class="tier-cart"><span class="mr-2">Tier</span>{{ $item->cards->tier }}</p>
                </div>
            </div>
            {{-- others --}}
            <div class="flex flex-col gap-4">
                <div class="text-xl font-bold uppercase border-b border-zinc-300 pb-3 border-dotted">
                    <h1>{{ $item->cards->name }}</h1>
                </div>
                <div class="flex flex-col gap-2 border-b border-zinc-300 border-dotted py-5">
                    <p class="about-category-title pt-3">
                        About the Card's category
                    </p>
                    <p class="about-category pb-3">
                        {{ $item->cards->category->description }}
                    </p>
                    <div class="flex items-center gap-5 border-t border-zinc-300 pt-3 border-dotted">
                        <p>Cost</p>
                        <div class="flex items-center gap-2 text-emerald-500 font-bold">
                            <p>{{ $item->cards->price }}</p>
                            <i class="fa-solid fa-coins"></i>
                        </div>
                    </div>
                </div>
                <div>
                    <input
                        type="hidden"
                        value="{{ $item->cards->id }}"
                        class="card_id"
                    />
                    <button class="delete-cart-item uppercase py-1 px-3 bg-red-500 rounded-2xl text-white hover:bg-red-400 hover:text-zinc-300 ease-in duration-100">Remove</button>
                </div>
            </div>
        </div>
        @php 
            $total+= $item->cards->price;
            array_push($card_ids, $item->cards->id);
        @endphp
        @empty
        <div class="flex items-center text-3xl gap-2 justify-center mt-10">
            <i class="fa-regular fa-folder-open"></i>
            <p class="font-bold text-center">Your cart is empty !!</p>
        </div>
        <p class="text-center mb-5">Buy some cards <a class="uppercase text-sky-500 hover:text-sky-400 ease-in duration-100" href="{{ url('all-cards')}}">here</a></p>
        @endforelse
        <div class="flex items-center justify-center gap-4 mb-10 text-2xl border-t border-zinc-300 pt-10 w-max mx-auto px-20">
            <p>Total cost:</p>
            <div class="flex items-center text-emerald-500 font-bold gap-3">
                <p>{{ $total }}</p>
                <i class="fa-solid fa-coins"></i>
            </div>
            <form action="{{ route('addToInv', ['cards' => $card_ids ]) }}" method="POST">
                @csrf
                <button type="submit" id="buy-button" class="buy-button-cart border-zinc-400 border py-1 px-3 rounded-xl uppercase bg-sky-500 hover:bg-sky-400 text-white hover:text-zinc-300 ease-in duration-100">Buy</button>
            </form>
        </div>
</div>

@if (session('addToCartSuccess'))
    <script>
        setTimeout(function () {
            $("#updatedata").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="updatedata" class="updatemessage">
        <i class="fa-solid fa-square-check fa-2xl"></i>
        <p>{{ session("addToCartSuccess") }}</p>
    </div>
@endif 

<script>
    // add to inventorty
    $(document).ready(function () {
        $(".buy-button-cart").click(function (e) {
            e.preventDefault();

            var cards = [
            <?php
                foreach($card_ids as $card)
                {
                    echo($card . ',');
                }
            ?>
            ];
            
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                method: "POST",
                url: "/add-to-inventory",
                data: { cards: cards, cost: <?php echo($total);?> },

                success: function (response) {
                    swal(response.status , "");
                    window.location.reload();
                },
            });
        });
    });

    // delete from cart
    $(document).ready(function () {
        $(".delete-cart-item").click(function (e) {
            e.preventDefault();

            var card_id = $(this).closest(".card_data").find(".card_id").val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });

            $.ajax({
                method: "POST",
                url: "/delete-cart-item",
                data: { card_id: card_id },

                success: function (response) {
                    window.location.reload()
                    swal(response.status , "" , "success");
                },
            });
        });
    });
</script>



@endsection
