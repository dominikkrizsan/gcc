<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCC | Admin</title>
        <!-- import googlefonts / fontawasome -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- import css -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- jquery -->
        <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
        <!-- chartjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js" integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Scripts -->
        @vite('resources/css/app.css')
    </head>
<body class="bg-zinc-200">
    <nav style="height: 100%;
                width: 240px;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                overflow-x: hidden;
                padding-top: 20px;" 
        class="flex flex-col items-start justify-start gap-3 px-5 text-white bg-zinc-700 text-xl">
        <div class="flex justify-between gap-10 mb-3">
            <p class="text-center text-2xl font-bold">GCC Admin</p>
            <a class="hover:text-zinc-300 ease-in duration-200" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-right-from-bracket text-3xl"></i>
            </a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
        <div class="flex items-center gap-3">
            <i class="fa-solid fa-user-shield text-4xl text-sky-500"></i>
            <div class="flex flex-col">
                <p class="text-lg">{{ Auth::user()->name }}</p>
                <p class="text-sm">{{ Auth::user()->email }}</p>
            </div>
        </div>
        <div class="border-b border-zinc-500 w-full my-3"></div>
        <a href="{{ url('dashboard') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('dashboard') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-signal text-2xl"></i>
            <p>Stats</p>
        </a>
        <a href="{{ url('users') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('users') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-users text-2xl"></i>
            <p>Users</p>
        </a>
        <a href="{{ url('categories') }}" class="flex items-center gap-3 rounded-3xl py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('categories') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-layer-group text-2xl"></i>
            <p>Categories</p>
        </a>
        <a href="{{ url('cards') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('cards') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-car-tunnel text-2xl"></i>
            <p>Cards</p>
        </a>
        <a href="{{ url('bots') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('bots') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-brands fa-android text-2xl"></i>
            <p>Bots</p>
        </a>
        <a href="{{ url('show-all-games') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('show-all-games') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-gamepad text-2xl"></i>
            <p>Games</p>
        </a>
        <a href="{{ url('edit-admin-profile') }}" class="flex items-center gap-3 rounded-3xl hover:bg-sky-500 py-3 px-2 w-full justify-start pl-5 ease-in duration-200 {{ Request::is('edit-admin-profile') ? 'bg-zinc-600' : 'hover:bg-sky-500';}}">
            <i class="fa-solid fa-file-shield text-2xl"></i>
            <p>Account</p>
        </a>
    </nav>
    <main style="margin-left: 240px; padding-left: 20px">
        @yield('content')
    </main>
</body>
</html>
