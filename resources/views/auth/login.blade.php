@extends('layouts.app')
@section('title', 'Larapets: Login')
@section('content')
    @include('partial.navbar')
    <section class="bg-[#0009] w-96 flex flex-col justify-center text-white items-center p-4 rounded-sm">
        <h1 class="text-4xl flex gap-2 border-b-2 pb-2 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#c4c4c4" viewBox="0 0 256 256">
            <path d="M141.66,133.66l-40,40a8,8,0,0,1-11.32-11.32L116.69,136H24a8,8,0,0,1,0-16h92.69L90.34,93.66a8,8,0,0,1,11.32-11.32l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z"></path>
        </svg>
            Login
        </h1> 
        <form class="flex flex-col gap-2 w-full" action="{{ url('login') }}" method="POST">
            @csrf
            {{ session('status') }}
            <label class="label text-white">Email:</label>
            <input class="input bg-[#0009] outline-1 focus:border-white w-full" type="text" name="email" value="{{ old('email') }}" placeholder="username@mail.com">
            @error('email')
                <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror
            <label class="label text-white">Password:</label>
            <input class="input bg-[#0009] outline-1 focus:border-white w-full" type="password" name="password" placeholder="yoursecret" >
            @error('password')
                <small class="badge badge-error w-full">{{ $message }}</small>
            @enderror
            <button class="btn btn-outline">Login</button>
            @if (Route::has('password.request'))
                <a class="text-sm
                          mt-4
                          pb-1
                          border-b-1
                          w-fit
                          text-white
                          hover:text-[#696767]" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </form>
    </section>
@endsection        
