@extends('layouts.welcome')
@section('main_content')
    <div class="w-128 mx-auto">
        <h1 class="text-purple-500 font-bold text-center text-3xl mt-5 mb-8">About the Shop</h1>
        <div class="flex flex-col items-center justify-center gap-8">
            <div class="flex items-center justify-center gap-8">
                <div class="flex items-center text-2xl gap-4">
                    <i class="fa-solid fa-shop text-purple-500 text-3xl"></i>
                    <p class="text-white text-center">In the shop you can add cards to your cart</p>
                    <i class="fa-solid fa-cart-plus text-purple-500 text-3xl"></i>
                </div>
                <img class="w-1/2 rounded-xl border border-purple-400" src="{{asset('./assets/img/welcome/shop2.png')}}" alt="">
            </div>
            <div class="flex items-center justify-center gap-8">
                <img class="w-1/2 rounded-xl border border-purple-400" src="{{asset('./assets/img/welcome/shop.png')}}" alt="">
                <div class="flex items-center text-2xl gap-4">
                    <i class="fa-solid fa-square-plus text-purple-500 text-3xl"></i>
                    <p class="text-white text-center">You can only add them if they are not in your inventory already</p>
                    <i class="fa-solid fa-cart-flatbed text-purple-500 text-3xl"></i>
                </div>
            </div>
            <div class="flex items-center justify-center gap-8">
                <div class="flex items-center text-2xl gap-4">
                    <i class="fa-solid fa-cart-shopping text-purple-500 text-3xl"></i>
                    <p class="text-white text-center">You can check your cart and if you have enough balance you can buy the cards you added to your cart</p>
                    <i class="fa-solid fa-money-bill-wave text-purple-500 text-3xl"></i>
                </div>
                <img class="w-1/2 rounded-xl border border-purple-400" src="{{asset('./assets/img/welcome/shop3.png')}}" alt="">
            </div>
            <div class="flex items-center justify-center gap-8 mb-5">
                <img class="w-1/2 rounded-xl border border-purple-400" src="{{asset('./assets/img/welcome/shop4.png')}}" alt="">
                <div class="flex items-center text-2xl gap-4">
                    <i class="fa-solid fa-file-circle-check text-purple-500 text-3xl"></i>
                    <p class="text-white text-center">After you bought it it will be in your inventory</p>
                    <i class="fa-solid fa-boxes-stacked text-purple-500 text-3xl"></i>
                </div>
            </div>
        </div>
    </div>
@endsection