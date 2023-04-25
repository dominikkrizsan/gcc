@extends('layouts.admin') @section('content')
<div>
    <p class="ml-2 text-4xl uppercase font-bold text-zinc-700 mt-5">edit & update card</p>
</div>
<div class="border-b-2 border-sky-400 w-80 mt-2 mb-5"></div>
<form
    class="flex flex-col justify-center items-center gap-5 w-max text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400 mb-3"
    action="{{ url('update-card/'.$cards->id) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @method('PUT') @csrf
    <select class="rounded-xl px-1 py-1 w-52 bg-zinc-200 border border-zinc-400" name="category_id">
        <option value="">{{ $cards->category->name }}</option>
    </select>
    <div class="grid grid-cols-2 gap-10">
        <div class="flex flex-col gap-4 w-100">
            <label class="ml-2 text-2xl" for="">Name</label>
            <input class="p-2 rounded-xl" type="text" name="name" value="{{ $cards->name }}" />
            <label class="ml-2 text-2xl" for="">Slug (short name 4 database)</label>
            <input class="p-2 rounded-xl" type="text" name="slug" value="{{ $cards->slug }}" required />
            <label class="ml-2 text-2xl" for="">Engine</label>
            <input class="p-2 rounded-xl" type="text" name="engine" value="{{ $cards->engine }}" />
            <label class="ml-2 text-2xl" for="">HP</label>
            <input class="p-2 rounded-xl" type="number" step="any" name="hp" value="{{ $cards->hp }}" />
            <label class="ml-2 text-2xl" for="">Torque (NM)</label>
            <input class="p-2 rounded-xl" type="number" step="any" name="tq" value="{{ $cards->tq }}" />
            <label class="ml-2 text-2xl" for="">Weight (KG)</label>
            <input class="p-2 rounded-xl" type="number" name="weight" value="{{ $cards->weight }}" />
            <label class="ml-2 text-2xl" for="">0-100</label>
            <input class="p-2 rounded-xl" type="number" step="any" name="ztoh" value="{{ $cards->ztoh }}" />
            <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">Update Card</button>
        </div>
        <div class="flex flex-col gap-4 w-100">
            <label class="ml-2 text-2xl" for="">1/4 mile</label>
            <input class="p-2 rounded-xl" type="number" step="any" name="qmile" value="{{ $cards->qmile }}" />
            <label class="ml-2 text-2xl" for="">Power to Weight Ratio</label>
            <input class="p-2 rounded-xl" type="number" step="any" name="ptow" value="{{ $cards->ptow }}" readonly/>
            <label class="ml-2 text-2xl" for="">Price</label>
            <input class="p-2 rounded-xl" type="number" name="price" value="{{ $cards->price }}" />
            <label class="ml-2 text-2xl" for="">Tier</label>
            <input class="p-2 rounded-xl" type="number" name="tier" value="{{ $cards->tier }}" min="1" max="5"/>
            <label class="ml-2 text-2xl" for="">Quantity</label>
            <input class="p-2 rounded-xl" type="number" name="qty" value="{{ $cards->qty }}" required max="1000"/>
            <div class="flex items-center gap-2">
                <label class="ml-2 text-2xl" for="">Status (checked is visible)</label>
                <input class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" type="checkbox" name="status" {{ $cards->status == "1" ? 'checked' : 'null'}}  />
            </div>
            <div class="flex items-center gap-2">
                <label class="ml-2 text-2xl for="">Trending</label>
                <input class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" type="checkbox" name="trending" {{ $cards->trending == "1" ? 'checked' : 'null'}}  />
            </div>
            <div>
                <label class="block mb-2 text-2xl ml-2" for="file_input"
                >Picture (add a pic that describes the card)</label
                >
                <input
                    class="p-2 bg-zinc-700 hover:bg-zinc-600 ease-in duration-100 text-white ml-2 block w-max text-xl border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                    id="file_input"
                    type="file"
                    name="image"
                />
                @if( $cards->image )
                <img
                    class="w-52 rounded-xl mx-auto mt-5"
                    src="{{ asset('assets/uploads/cards/'.$cards->image) }}"
                    alt="Card image"
                />
                @endif
            </div>
        </div>
</form>
@endsection
