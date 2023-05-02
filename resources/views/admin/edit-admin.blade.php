@extends('layouts.admin')
@section('content')
<div class="w-128 mx-auto bg-zinc-300 p-3 mt-5 rounded-xl shadow-lg text-xl">
    <p class="text-center text-2xl font-bold">Edit your Profile</p>
        <form action="{{ url('update-admin-profile') }}" method="POST" enctype="multipart/form-data" class="flex flex-col w-96 mx-auto gap-2">
            @csrf
            <input class="p-2 rounded-xl" type="hidden" name="id" id="id" value="{{ Auth::user()->id }}">
            <label class="ml-2 text-xl" for="">Name</label>
            <input class="p-2 rounded-xl" type="text" name="name" value="{{ Auth::user()->name }}">
            <label class="ml-2 text-xl" for="">Email</label>
            <input class="p-2 rounded-xl" type="text" name="email" value="{{ Auth::user()->email }}">
            <div class="flex justify-center items-center gap-6 mt-3">
                <label class="ml-2 text-xl" for="">Balance</label>
                <input class="p-2 rounded-xl" type="hidden" name="balance" value="{{ Auth::user()->balance }}">
                <div class="flex items-center gap-2 text-emerald-500 font-bold">
                    <p class="text-emerald-500 font-bold">{{ Auth::user()->balance }}</p>
                    <i class="fa-solid fa-coins"></i>
                </div>
            </div>
            <button class="self-center uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-xl my-3" type="submit">Update Profile</button>
        </form>
</div>
@endsection