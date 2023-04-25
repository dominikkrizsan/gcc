@extends('layouts.admin') @section('content')
<div class="text-xl mt-5 ml-3 flex items-center gap-20">
    <p class="text-4xl uppercase font-bold text-zinc-700">categories</p>
    <a class="uppercase py-2 px-3 bg-sky-400 rounded-xl text-white hover:bg-sky-500 ease-in duration-100" href="{{ url('add-category') }}">add category</a>
</div>
<div class="ml-3 border-b-2 border-sky-400 w-44 mt-2 mb-5"></div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-table_category mb-5">
    <table class="w-full text-xl text-left text-gray-200">
        <thead class="text-xl uppercase bg-sky-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($category as $item)
            <tr class="border-b bg-zinc-700 border-gray-700 hover:bg-gray-700 ease-in duration-100">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    {{ $item->id }}
                </th>
                <td class="px-6 py-4 w-52">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->description }}
                </td>
                <td class="px-6 py-4">
                    <img
                    class="w-64 rounded-lg"
                    src="{{ asset('assets/uploads/category/'.$item->image) }}"
                    alt="Image here"
                />
                </td>
                <td class="px-6 py-4 w-40">
                    <a class="hover:text-sky-300 ease-in duration-100 mr-3" href="{{ url('edit-category/'.$item->id) }}">Edit</a>
                    <a class="hover:text-red-500 ease-in duration-100" href="{{ url('confirm-delete/'.$item->id) }}">Delete</a>
                </td>
            </tr>
            @if (session('confirmDelete'.$item->id))
            <div class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
                <i class="fa-solid fa-trash fa-2xl text-zinc-500"></i>
                <p class="mt-3">{{ session("confirmDelete") }}</p>
                <div class="uppercase flex items-center gap-5">
                    <a class="text-sky-600 bg-zinc-300 hover:text-sky-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('categories') }}">cancel</a>
                    <a class="text-red-600 bg-zinc-300 hover:text-red-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('delete-category/'.$item->id) }}">delete</a>
                </div>
            </div>
            @endif 
            @endforeach
        </tbody>
    </table>
</div>


@if (session('updatedata'))
<script>
    setTimeout(function () {
        $("#updatedata").fadeOut("fast");
    }, 1500); // <-- time in milliseconds
</script>
<div id="updatedata" class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
    <i class="fa-solid fa-square-check fa-2xl text-emerald-500 mb-3"></i>
    <p>{{ session("updatedata") }}</p>
</div>
@endif @if (session('deletedata'))
<script>
    setTimeout(function () {
        $("#deletedata").fadeOut("fast");
    }, 1500); // <-- time in milliseconds
</script>
<div id="deletedata" class="fixed top-1/3 left-2/4 flex flex-col gap-4 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80">
    <p>{{ session("deletedata") }}</p>
</div>
@endif 
@endsection
