<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCC | Store</title>
        <!-- import googlefonts / fontawasome -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- fontawasome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- import css -->
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
        <!-- CSRF Header -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>
<body>
    <div class="bg-zinc-600 text-xl py-3 border-b border-sky-300">
        <nav class="grid grid-cols-3 bg-zinc-600 text-white w-128 mx-auto max-[1150px]:w-full max-[1150px]:px-2 max-[550px]:grid-cols-1 max-[550px]:items-center max-[550px]:gap-4">
            <div class="flex items-center gap-4 text-sky-400 justify-self-start">
                <a class="hover:text-sky-500 ease-in duration-100" href="{{ url('home')}}">Home</a>
                <a class="hover:text-sky-500 ease-in duration-100" href="{{ url('all-categories')}}">Categories</a>
                <a class="hover:text-sky-500 ease-in duration-100" href="{{ url('all-cards')}}">Cards</a>
            </div>
            <div class="flex items-center gap-2 justify-self-center">
                <p>{{ Auth::user()->balance }}</p>
                <i class="fa-solid fa-coins"></i>
            </div>
            
            <div class="flex items-center gap-4 justify-self-end">
                <a class="text-sky-400 hover:text-sky-500 ease-in duration-100 flex items-center gap-2 uppercase" href="{{ url('choose-tier')}}"><i class="fa-solid fa-gamepad"></i>Play</a>
            
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="justify-self-end max-[550px]:w-max text-xl text-white bg-zinc-500 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-sky-800" type="button"><p><i class="fa-solid fa-user-tie text-sky-400 fa-xl mr-3"></i>{{ Auth::user()->name }}</p> <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="z-10 hidden bg-white text-xl divide-y divide-zinc-100 rounded-lg shadow w-44 bg-zinc-700">
                    <ul class="py-2 text-lg text-white" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ url('inventory') }}" class="block px-4 py-2 hover:bg-zinc-600 hover:text-white"><i class="fa-solid fa-boxes-stacked mr-3"></i>Inventory</a>
                    </li>
                    <li>
                        <a href="{{ url('combine-cards') }}" class="block px-4 py-2 hover:bg-zinc-600 hover:text-white"><i class="fa-solid fa-pen-ruler mr-3"></i></i>Craft Deck Card</a>
                    </li>
                    <li>
                        <a href="{{ url('mydeck') }}" class="block px-4 py-2 hover:bg-zinc-600 hover:text-white"><i class="fa-solid fa-car-tunnel mr-3"></i></i>Deck</a>
                    </li>
                    <li>
                        <a href="{{ url('edit-user-profile') }}" class="block px-4 py-2 hover:bg-zinc-600 hover:text-white"><i class="fa-solid fa-user-pen mr-3"></i>Profile</a>
                    </li>
                    <li>
                        <a href="{{ url('cart') }}" class="block px-4 py-2 hover:bg-zinc-600 hover:text-white"><i class="fa-solid fa-cart-arrow-down mr-3"></i>Cart</a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 hover:bg-zinc-600 hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <main class="w-max mx-auto text-xl">
        @yield('content')
    </main>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>