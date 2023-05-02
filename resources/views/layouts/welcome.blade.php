<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To GCC</title>
    <!-- import googlefonts / fontawasome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- import css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body style="background: url({{asset('./assets/img/main-bg.jpg')}}); 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;">
    <nav class="w-128 mx-auto flex justify-between py-8 text-lg text-white items-center">
        <div>
            <a href="{{ url('/') }}" class="text-2xl font-bold">Genuine Car Cards</a>
        </div>
        <div class="flex items-center gap-4">
            <a class="px-3 py-2 bg-zinc-700 rounded-xl hover:text-white hover:bg-zinc-600 ease-in duration-200 flex items-center gap-2" href="{{ url('login') }}"><i class="fa-solid fa-house-chimney"></i> Home</a>
            <a class="px-3 py-2 bg-zinc-700 rounded-xl hover:text-white hover:bg-zinc-600 ease-in duration-200 flex items-center gap-2" href="{{ url('the-shop') }}"><i class="fa-solid fa-store"></i> The Shop</a>
            <a class="px-3 py-2 bg-zinc-700 rounded-xl hover:text-white hover:bg-zinc-600 ease-in duration-200 flex items-center gap-2" href="{{ url('the-game') }}"><i class="fa-solid fa-gamepad"></i> The Game</a>
            <a class="px-3 py-2 bg-zinc-700 border-2 border-purple-800 hover:text-white hover:bg-zinc-600 ease-in duration-200 uppercase" href="{{ url('register') }}">Join Now</a>
        </div>
    </nav>
    <main class="w-128 mx-auto">
        @yield('main_content')
    </main>
</body>

</html>
