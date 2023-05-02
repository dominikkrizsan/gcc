@extends('layouts.auth')

@section('content')
<!-- Container -->
<div class="flex flex-wrap min-h-screen w-full content-center justify-center bg-gray-200 py-10">
  
    <!-- Login component -->
    <div class="flex shadow-md max-[800px]:flex-col">
      <!-- Login form -->
      <div class="flex  flex-wrap content-center justify-center rounded-l-md bg-white" style="width: 24rem; height: 32rem;">
        <div class="w-72">
          <!-- Heading -->
          <h1 class="text-xl font-semibold">Forgot your<span class="text-purple-700 font-bold"> Password?</span></h1>
          <small class="text-gray-400">Send a password reset link</small>
  
          <!-- Form -->
          <form  method="POST" action="{{ route('password.email') }}" class="mt-10">
            @csrf
            <div class="mb-3">
              <label class="mb-2 block text-xs font-semibold pl-2">Email</label>
              <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" placeholder="Enter your email" class="@error('email') is-invalid @enderror block w-full rounded-md border border-gray-300 focus:border-purple-700 focus:outline-none focus:ring-1 focus:ring-purple-700 py-1 px-1.5 text-gray-500" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
  
            <div class="mb-3">
              <button class="mb-1.5 block w-full text-center text-white bg-purple-700 hover:bg-purple-900 px-2 py-1.5 rounded-md ease-in duration-200">Send link</button>
            </div>
          </form>
  
          <!-- Footer -->
          <div class="text-center">
            <span class="text-xs text-gray-400 font-semibold">Don't have account?</span>
            <a href="{{ url('register') }}" class="text-xs font-semibold text-purple-700">Sign up</a>
          </div>
        </div>
      </div>
  
      <!-- Login banner -->
      <div class="flex flex-wrap content-center justify-center rounded-r-md" style="width: 24rem; height: 32rem;">
        <img class="w-full h-full bg-center bg-no-repeat bg-cover rounded-r-md" src="{{asset('./assets/img/purple.png')}}">
      </div>
  
    </div>

  </div>
@endsection
