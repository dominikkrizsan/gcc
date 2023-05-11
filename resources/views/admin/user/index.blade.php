@extends('layouts.admin') @section('content')
<div class="text-xl mt-5 flex items-center gap-20">
    <p class="ml-3 text-4xl uppercase font-bold text-zinc-700">Users</p>
</div>
<div class="ml-2 border-b-2 border-sky-400 w-28 mt-2 mb-5"></div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg w-table">
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
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Balance
                </th>
                <th scope="col" class="px-6 py-3">
                    Admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($users as $item)
            <tr class="border-b bg-zinc-700 border-gray-700 hover:bg-gray-700 ease-in duration-100">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    {{ $item->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->balance }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->role_as == '0' ? 'User' : 'Admin' }}
                </td>
                <td class="px-6 py-4">
                    <a class="hover:text-sky-300 ease-in duration-100" href="{{ url('edit-user/'.$item->id) }}">Edit</a>
                    <a class="hover:text-red-500 ease-in duration-100" href="{{ url('confirm-user-delete/'.$item->id) }}">Delete</a>
                </td>
            </tr>
            @if (session('confirmUserDelete'.$item->id))
                <div class="fixed top-1/3 left-2/4 flex flex-col gap-2 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80 border-2 border-red-300">
                    <i class="fa-solid fa-trash text-4xl text-zinc-500"></i>
                    <p class="mb-5 mt-3">Are you sure you want to delete?</p>
                    <div class="uppercase flex items-center gap-5">
                        <a class="text-sky-600 bg-zinc-300 hover:text-sky-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('users') }}">cancel</a>
                        <a class="text-red-600 bg-zinc-300 hover:text-red-500 ease-in duration-100 py-2 px-3 rounded-xl" href="{{ url('delete-user/'.$item->id) }}">delete</a>
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
    <div id="updatedata" class="fixed top-1/3 left-2/4 flex flex-col gap-2 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80 border-2 border-emerald-400">
        <i class="fa-solid fa-square-check fa-2xl text-emerald-500 mb-3"></i>
        <p>{{ session("updatedata") }}</p>
    </div>
@endif 

@if (session('deleteUserData'))
    <script>
        setTimeout(function () {
            $("#deleteUserData").fadeOut("fast");
        }, 1500); // <-- time in milliseconds
    </script>
    <div id="deleteUserData" class="fixed top-1/3 left-2/4 flex flex-col gap-2 text-xl items-center bg-zinc-100 rounded-xl justify-center h-64 w-80 border-2 border-emerald-400">
        <p>{{ session("deleteUserData") }}</p>
    </div>
@endif 
@endsection
