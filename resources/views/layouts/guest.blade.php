<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel Courses') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('./assets/images/favicon.png ')}}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="w-full bg-gradient-to-t from-indigo-100 via-red-100 to-blue-100">
            <!-- ******* Header area START ******** -->
        <div class="w-full shadow-lg bg-blue-50">
            <div class="flex max-w-6xl mx-auto items-center h-16 pt-4 pb-4">
                <div class="w-1/6">
                    <a href="{{ route('home.index') }}"><img class="w-56 h-auto py-4" src="{{ asset('assets/images/logo/logo.png') }}" alt="Laravel Courses"/></a>
                </div>
                <div class="w-3/6 items-center pl-6">
                    <ul class="flex space-x-8 font-semibold">
                    <li><a class="text-gray-500 hover:border-b-2 hover:border-gray-400 hover:pb-4 hover:text-gray-700" href="{{ route('courses') }}">Courses</a></li>
                    <li><a class="text-gray-500 hover:border-b-2 hover:border-gray-400 hover:pb-4 hover:text-gray-700" href="{{ route('books') }}">Books</a></li>
                    </ul>
                </div>

                @if(Auth::check())
                <div class="w-2/6 flex space-x-4 items-center text-end">
                        <span class="text-sm">{{Auth::user()->name}} </span>

                        @if(Auth::user()->type === 1)
                            <a href="{{route('dashboard')}}" class="ml-1 inline-flex items-center justify-center rounded border border-transparent bg-black px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Dashboard</a>
                        @else
                            <a href="" class="ml-1 inline-flex items-center justify-center rounded border border-transparent bg-black px-2 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Submit a course</a>
                        @endif
                        <form class="ml-4 items-center" method="POST" action="{{ route('logout') }}"> @csrf
                            <button class="text-red-600" type="submit">Logout</button>
                        </form>
                </div>
                @else
                <div class="w-2/6 space-x-4 items-center text-end">
                    <a href="{{route('login')}}" class="text-sm font-medium text-gray-500 hover:text-gray-900">Sign in</a>
                    <a href="{{route('register')}}" class="ml-8 inline-flex items-center justify-center rounded border border-transparent bg-black px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500">Sign up</a>
                </div>
                @endif
            </div>
        </div>
                <!-- ******* Header area END ******** -->
                {{ $slot }}
                    <!-- *** footer area ***** -->

            <div class="w-full bg-slate-600 text-white relative">
                <div class="flex max-w-6xl mx-auto py-14">
                    <div class="w-1/5 text-base">
                    <h2 class="text-xl font-bold pb-3">Course by Series</h2>
                    <ul>
                        <li><a href="{{ route('archive', ['series', 'laravel']) }}">Laravel</a></li>
                        <li><a href="{{ route('archive', ['series', 'php']) }}">PHP</a></li>
                        <li><a href="{{ route('archive', ['series', 'vue-js']) }}">Vue.js</a></li>
                        <li><a href="{{ route('archive', ['series', 'livewire']) }}">Livewire</a></li>
                        <li><a href="{{ route('archive', ['series', 'alpine-js']) }}">Alpine.JS</a></li>
                        <li><a href="{{ route('archive', ['series', 'tailwind-css']) }}">Tailwind CSS</a></li>
                        {{-- @foreach($series as $series)
                        <li class="mb-2">
                            <a href="{{route('archive',['series',$series->slug])}}" class="text-links text-gray-100 text-base before:text-gray-100">{{$series->name}}</a>
                        </li>
                        @endforeach --}}
                    </ul>
                    </div>
                    <div class="w-1/5">
                    <h2 class="text-xl font-bold pb-3">Course by Duration</h2>
                    <ul>
                        <li><a href="{{ route('archive', ['duration', '01-05-hours']) }}">01-05 hours</a></li>
                        <li><a href="{{ route('archive', ['duration', '05-08-hours']) }}">05-08 hours</a></li>
                        <li><a href="{{ route('archive', ['duration', '08-plus-hours']) }}">08+ hours</a></li>
                    </ul>
                    </div>
                    <div class="w-1/5">
                    <h2 class="text-xl font-bold pb-3">Course by Level</h2>
                    <ul>
                        <li><a href="{{ route('archive', ['level', 'beginner']) }}">Beginner</a></li>
                        <li><a href="{{ route('archive', ['level', 'intermediate']) }}">Intermediate</a></li>
                        <li><a href="{{ route('archive', ['level', 'advanced']) }}">Advanced</a></li>
                    </ul>
                    </div>
                    <div class="w-1/5">
                    <h2 class="text-xl font-bold pb-3">Course by Platform</h2>
                    <ul>
                        <li><a href="{{ route('archive', ['platform', 'laracasts']) }}">Laracast</a></li>
                        <li><a href="{{ route('archive', ['platform', 'youtube']) }}">Youtube</a></li>
                        <li><a href="{{ route('archive', ['platform', 'larajobs']) }}">Larajobs</a></li>
                        <li><a href="{{ route('archive', ['platform', 'laravel-news']) }}">Lara News</a></li>
                        <li><a href="{{ route('archive', ['platform', 'laracasts-forum']) }}">Laracast Forum</a></li>
                    </ul>
                    </div>
                    <div class="w-1/5">
                    <h2 class="text-xl font-bold pb-3">Course by Topics</h2>
                    <ul>
                        <li><a href="{{ route('archive', ['topic', 'eloquent']) }}">Eloqulent ORM</a></li>
                        <li><a href="{{ route('archive', ['topic', 'validation']) }}">Validation</a></li>
                        <li><a href="{{ route('archive', ['topic', 'authentication']) }}">Authentication</a></li>
                        <li><a href="{{ route('archive', ['topic', 'testing']) }}">Testing</a></li>
                        <li><a href="{{ route('archive', ['topic', 'refactoring']) }}">Refactoring</a></li>
                    </ul>
                    </div>
                </div>
                <p class="text-center text-gray-400 pb-5">Developed by Mostafizur Rahman ⚡️</p>
                <img class="absolute bottom-0 right-0" src="{{ asset('assets/images/footer-cure.png') }}"/>
            </div>
            <!-- *** footer area ***** -->
        </div>
    </body>
</html>
