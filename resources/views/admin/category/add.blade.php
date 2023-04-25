@extends('layouts.admin') @section('content')
<div>
    <p class="text-4xl uppercase font-bold text-zinc-700 mt-5">add new category</p>
</div>
<div class="border-b-2 border-sky-400 w-72 mt-2 mb-5"></div>
<form
    class="flex flex-col gap-4 w-max text-xl bg-zinc-100 px-5 py-3 rounded-xl border border-zinc-400"
    action="{{ url('insert-category') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf
    <label class="ml-2 text-2xl" for="">Name (name of the category fe.: Car Card)</label>
    <input class="p-2 rounded-xl" type="text" name="name" placeholder="Category Name" required />
    <label class="ml-2 text-2xl" for="">Slug (short name 4 database)</label>
    <input class="p-2 rounded-xl" type="text" name="slug" placeholder="Slug" required />
    <label class="ml-2 text-2xl" for=""
        >Description (short description: what the category is about)</label
    >
    <input
        class="p-2 rounded-xl"
        type="text"
        name="description"
        placeholder="Category Description"
        required
    />
    <div class="flex items-center gap-2">
        <label class="ml-2 text-2xl" for="">Status (checked is visible)</label>
        <input class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600" type="checkbox" name="status"/>
    </div>
    <div class="flex items-center gap-2">
        <label class="ml-2 text-2xl" for="">Popular</label>
        <input class="ml-5 w-4 h-4 rounded focus:ring-sky-500 focus:ring-sky-600 ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600"  type="checkbox" name="popular"/>
    </div>
    <label class="block mb-2 text-2xl ml-2" for="file_input">Picture (add a pic that describes the category)</label>
    <input class="p-2 bg-zinc-700 hover:bg-zinc-600 ease-in duration-100 text-white ml-2 block w-max text-xl border border-gray-300 rounded-lg cursor-pointer focus:outline-none" name="image" id="file_input" type="file">
    <button class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100 w-max ml-5 my-3 text-2xl" type="submit">add category</button>
</form>
@endsection
