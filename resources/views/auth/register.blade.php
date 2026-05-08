@extends('layouts.app')
@section('title', 'Larapets: Register')
@section('content')
    @include('partial.navbar')
    <section class="bg-[#0009]
                    w-96
                    md:w-fit
                    flex
                    flex-col 
                    justify-center 
                    text-white 
                    items-center 
                    p-4 
                    rounded-sm">
        <h1 class="text-4xl 
                  flex 
                  gap-2 
                  border-b-2 
                  pb-2 
                  mb-4">

            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#c4c4c4" viewBox="0 0 256 256">
            <path d="M144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17a8,8,0,0,0,12.25,10.3C50.25,181.19,77.91,168,108,168s57.75,13.19,77.87,37.15a8,8,0,0,0,12.25-10.3C183.18,177.07,164.6,164.44,144,157.68ZM56,100a52,52,0,1,1,52,52A52.06,52.06,0,0,1,56,100Zm197.66,33.66-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L216,148.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path>
        </svg>
            Register
        </h1> 
       <form class="flex
                    flex-col
                    md:flex-row
                    gap-4" 
        method="POST" action="{{route ('register')}}">
            @csrf
            <div class="w-full md:w-80">
                <label class="label text-white mt-4">Document:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="document" 
                              value="{{ old('document') }}" 
                              placeholder="75000010">
                @error('document')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">FullName:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="fullname" 
                              value="{{ old('fullname') }}" 
                              placeholder="Jeremias Sparrow">
                @error('fullname')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">Gender:</label>
                <select name="gender" class="select bg-[#0009] outline-1 focus:border-white w-full">
                    <option value="">Select...</option>
                    <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                    <option value="Male"@if(old('gender') == 'Male') selected @endif>Male</option>
                </select>
                @error('gender')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror


                <label class="label text-white mt-4">BirthDate:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="birthdate" 
                              value="{{ old('birthdate') }}" 
                              placeholder="1990-12-25">
                @error('birthdate')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-full md:w-80">
                <label class="label text-white mt-4">Phone:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="phone" 
                              value="{{ old('phone') }}" 
                              placeholder="32076726827">
                @error('phone')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Email:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="text" 
                              name="email" 
                              value="{{ old('email') }}" 
                              placeholder="example@mail.com">
                @error('email')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Password:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="password" 
                              name="password" 
                              value="{{ old('password') }}" 
                              placeholder="yoursecret">
                @error('password')
                    <small class="badge badge-error w-full">{{ $message }}</small>
                @enderror

                <label class="label text-white mt-4">Password Confirmation:</label>
                <input class="input bg-[#0009] 
                              outline-1 
                              focus:border-white 
                              w-full" 
                              type="password" 
                              name="password_confirmation" 
                              value="{{ old('password_confirmation') }}" 
                              placeholder="confirm">
                <button class="btn btn-outline mt-4 w-full">
                    Register
                </button>
            </div>
       </form>
    </section>
@endsection        

