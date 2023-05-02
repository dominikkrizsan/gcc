@extends('layouts.welcome')
@section('main_content')
    <div class="grid grid-cols-2 mt-welcome justify-items-center items-center">
        <div class="text-xl text-white flex flex-col gap-5 items-start">
            <h1 class="text-3xl font-bold">Time to join the community</h1>
            <h1 class="text-3xl font-bold">Become the best gcc player</h1>
            <h2>GCC offers playable car cards you can use to beat the car devils
                and become the best gcc player in the world</h2>
            <a class="uppercase py-3 px-10 rounded-xl bg-zinc-800 border border-purple-800 hover:bg-zinc-700 ease-in duration-200" href="{{url('register')}}">Join now for free</a>
            <div class="flex items-center gap-4">
                <i class="fa-solid fa-user-group text-purple-800"></i>
                <p><span>{{$mainUser->name}}</span> and <span>{{$countUser}}</span> others have already joined</p>  
            </div>
        </div>
        <div class="flex items-end justify-center">
            <img class="ml-20" src="{{asset('./assets/img/main.png')}}" alt="">
        </div>
    </div>
@endsection