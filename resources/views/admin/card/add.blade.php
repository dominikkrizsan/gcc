@extends('layouts.admin') @section('content')
<div>
    <p class="ml-2 text-4xl uppercase font-bold text-zinc-700 mt-5">add new card</p>
</div>
<div class="border-b-2 border-sky-400 w-56 mt-2 mb-5"></div>
<form
    class="flex flex-col justify-center items-center gap-5 w-max text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400 mb-3"
    action="{{ url('insert-card') }}"
    method="POST"
    enctype="multipart/form-data"
    class="add-card-form"
>
    @csrf
    <select class="rounded-xl px-1 py-1 w-52 bg-zinc-200 border border-zinc-400" name="category_id" required>
        <option value="">Select Category</option>
        @foreach ($category as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    <div class="grid grid-cols-2 gap-20">
        <div class="flex flex-col gap-4 w-100">
            <label class="ml-2 text-2xl" for="">Name (Name the Card)</label>
            <input
                class="p-2 rounded-xl"
                type="text"
                name="name"
                placeholder="Card Name"
                required
            />
            <label class="ml-2 text-2xl" for=""
                >Slug (short name 4 database)</label
            >
            <input
                class="p-2 rounded-xl"
                type="text"
                name="slug"
                placeholder="Slug"
                required
            />
            <label class="ml-2 text-2xl" for=""
                >Engine (Type of engine it has)</label
            >
            <input
                class="p-2 rounded-xl"
                type="text"
                name="engine"
                placeholder="Engine Name"
            />
            <label class="ml-2 text-2xl" for=""
                >0-100 (0 kmh to 100 kmh in sec)</label
            >
            <input
                class="p-2 rounded-xl"
                type="number"
                step="any"
                name="ztoh"
                placeholder="number"
                required
            />
            <label class="ml-2 text-2xl" for=""
                >1/4 mile (402m drag in sec)</label
            >
            <input
                class="p-2 rounded-xl"
                type="number"
                step="any"
                name="qmile"
                placeholder="number"
                required
            />
            <label class="ml-2 text-2xl" for="">HP (Brake Horsepower)</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                step="any"
                name="hp"
                placeholder="number"
                required
            />
            <label class="ml-2 text-2xl" for="">Torque (Torque in NM)</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                step="any"
                name="tq"
                placeholder="number"
                required
            />
        </div>
        <div class="flex flex-col gap-4 w-100">
            <label class="ml-2 text-2xl" for="">Weight (Weight KG)</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                name="weight"
                placeholder="number"
                required
            />
            <label class="ml-2 text-2xl" for="">Price (Coins)</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                name="price"
                placeholder="number"
                required
            />
            <label class="ml-2 text-2xl" for="">Quantity</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                name="qty"
                placeholder="number"
                required
                max="1000"
            />
            <label class="ml-2 text-2xl" for="">Tier</label>
            <input
                class="p-2 rounded-xl"
                type="number"
                name="tier"
                placeholder="1-5"
                min="1"
                max="5"
            />
            <div class="flex items-center gap-2">
                <label class="ml-2 text-2xl" for=""
                    >Status (checked is visible)</label
                >
                <input
                    class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600"
                    type="checkbox"
                    name="status"
                    placeholder="number"
                />
            </div>
            <div class="flex items-center gap-2">
                <label class="ml-2 text-2xl" for="">Trending</label>
                <input
                    class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600"
                    type="checkbox"
                    name="trending"
                    placeholder="number"
                />
            </div>
            <label class="block mb-2 text-2xl ml-2" for="file_input"
                >Picture (add a pic that describes the card)</label
            >
            <input
                class="p-2 bg-zinc-700 hover:bg-zinc-600 ease-in duration-100 text-white ml-2 block w-max text-xl border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                id="file_input"
                type="file"
                name="image"
            />
        </div>
    </div>
    <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">add card</button>
</form>
@endsection
