@extends('layouts.app')

@section('title', 'Larapets: My Adoptions')

@section('content')
    @include('partial.navbar')
    <h1 class="mt-6 text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
            <path
                d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
            </path>
        </svg>
        My Adoptions
    </h1>

    {{-- Breadcrumbs --}}
    <div class="breadcrumbs text-sm text-white mb-6">
        <ul>
            <li>
                <a href="{{ url('dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M104,40H56A16,16,0,0,0,40,56v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,104,40Zm0,64H56V56h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V56A16,16,0,0,0,200,40Zm0,64H152V56h48v48Zm-96,32H56a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,104,136Zm0,64H56V152h48v48Zm96-64H152a16,16,0,0,0-16,16v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V152A16,16,0,0,0,200,136Zm0,64H152V152h48v48Z">
                        </path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <span class="inline-flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                        <path
                            d="M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z">
                        </path>
                    </svg>
                    My adoptions
                </span>
            </li>
        </ul>
    </div>
        {{-- Search + Filter --}}
        <div class="flex flex-col md:flex-row gap-2 items-center mb-10">
            {{-- Search input --}}
            <label class="input text-white bg-[#0009] w-58 md:w-84 outline outline-white">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                        stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </g>
                </svg>
                <input type="search" placeholder="Search..." name="qsearch" id="qsearch" />
            </label>
        </div>

    {{-- List --}}
    <div class="datalist flex flex-col gap-4 items-center justify-center">
        @forelse ($adoptions as $adopt)
            <div class="avatar-group mt-2 -space-x-6">
                <div class="avatar">
                    <div class="w-36">
                        <img src="{{ asset('images/' . $adopt->user->photo) }}" />
                    </div>
                </div>
                <div class="avatar">
                    <div class="w-36">
                        <img src="{{ asset('images/' . $adopt->pet->image) }}" />
                    </div>
                </div>
            </div>
            <h4 class="text-white text-center">
                <span class="underline font-bold">{{ $adopt->pet->name }}</span>
                was adopted by
                <span class="underline font-bold">{{ $adopt->user->fullname }}</span>
                <span class="text-[#fff9] text-sm ml-1">{{ $adopt->created_at->diffForHumans() }}</span>
            </h4>
            <a href="{{ url('myadoption/' . $adopt->id) }}"
                class="btn btn-outline text-white hover:bg-[#fff6] hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
                    <path
                        d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z">
                    </path>
                </svg>
                Show more
            </a>
            <span class="border-b border-dashed mt-2 border-[#fff6] w-full max-w-lg"></span>
        @empty
            <p class="text-white text-2xl py-20">No adoptions found.</p>
        @endforelse
    </div>

    {{-- Pagination
    <div class="flex justify-center mt-8">
        {{ $adoptions->links('partial.pagination') }}
    </div> --}}

@endsection

@section('js')
    <script>
        // MESSAGES
        @if (session('message'))
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "{{ session('message') }}",
                showConfirmButton: false,
                timer: 3500
            });
        @endif
        @if (session('error'))
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 3500
            });
        @endif

        // SEARCH
        function debounce(func, wait) {
            let timeout
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout)
                    func(...args)
                };
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }

        const search = debounce(function(query) {
            const $token = $('input[name=_token]').val()

            $.post("search/adoptions", {
                    q: query,
                    _token: $token
                },
                function(data) {
                    $('.datalist').html(data).hide().fadeIn(800)
                }
            )
        }, 500)

        $('body').on('input', '#qsearch', function(event) {
            event.preventDefault()
            const query = $(this).val()

            $('.datalist').html(`<div class="py-20 text-center">
                                <span class="loading loading-spinner loading-xl text-white"></span>
                             </div>`)

            if (query !== '') {
                search(query)
            } else {
                setTimeout(() => {
                    window.location.replace('adoptions')
                }, 500)
            }
        })
    </script>
@endsection
