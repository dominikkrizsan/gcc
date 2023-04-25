@extends('layouts.app') @section('content')


<div class="grid grid-cols-3 items-center justify-start gap-5 mt-5 w-128 mx-auto">
    
    @foreach($category as $item)
    <a href="{{ url('category/'.$item->slug) }}">
        <div class="py-2 px-3 bg-zinc-200 flex flex-col gap-2 border border-zinc-300 shadow-xl hover:border-zinc-400 hover:shadow-2xl ease-in duration-100">
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


@endsection