<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GCC | Game</title>
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
            <div class="flex items-center gap-8 text-sky-400 justify-self-start">
                <a class="hover:text-sky-500 ease-in duration-100 flex items-center gap-2" href="{{ url('home')}}"><i class="fa-solid fa-shop-lock fa-lg"></i> Return to shop</a>
                <a class="hover:text-sky-500 ease-in duration-100 flex items-center gap-2" href="{{ url('choose-tier')}}"><i class="fa-solid fa-gamepad fa-lg"></i> Play</a>
            </div>
            <div class="flex items-center gap-2 justify-self-center">
                <p>{{ Auth::user()->balance }}</p>
                <i class="fa-solid fa-coins"></i>
            </div>
           
            <div class="justify-self-end flex items-center gap-6">
                <div class="flex items-center gap-1 uppercase text-sky-400 hover:text-sky-500 ease-in duration-100">
                    <a href="{{ url('all-games') }}">recent games</a>
                    <i class="fa-solid fa-file-signature fa-lg"></i>
                </div>
                <div class="flex items-center gap-2 py-2 px-3 bg-zinc-500 rounded-xl border border-zinc-400">
                    <i class="fa-solid fa-user-ninja fa-xl text-sky-400"></i>
                    <p>{{ Auth::user()->name }}</p>
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