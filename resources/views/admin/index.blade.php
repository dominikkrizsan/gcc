@extends('layouts.admin')
@section('content')
<div class="flex justify-center items-end gap-4 text-sky-500 font-bold mb-3">
    <h1 class="text-2xl mt-3">Admin dashboard</h1>
</div>
<div class="flex flex-col w-max mx-auto gap-6 border border-zinc-400 shadow-xl bg-zinc-300 py-4 px-5 rounded-xl mt-5">
    <p class="text-2xl flex items-center gap-2"><span><i class="fa-solid fa-people-group fa-xl"></i></span><span>All users: </span><span class="text-sky-500">{{ $countUser }}</span></p>
    <p class="text-2xl flex items-center gap-2"><span><i class="fa-brands fa-sellsy"></i></span><span>All cards sold: </span><span class="text-sky-500">{{ $countSoldCards }}</span></p>
</div>
@endsection