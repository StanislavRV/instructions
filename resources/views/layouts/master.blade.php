<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="{{ asset('js/app.js') }}" defer></script>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Main</title>
</head>

<body>

    <header>
        <div class="header">
            <div class="logo">
                Instruction
            </div>

            <div class="flex fd-column">
            <form class="create__form" method="post" enctype="multipart/form-data" action="{{ url("/instructions")  }}">
                @csrf
                <div class="mt-2  mx-auto search">
                    <x-input id="search" class=" mt-1 mx-auto" type="text" name="search" :value="old('title')" required autofocus />
                    <x-button class="mt-1 mx-auto bg-gray-600 search_btn">
                       &#128270;
                    </x-button>
                </div>
            </form>
            </div>

            <div class="nav">
                <ul class="nav_link">
                    <a href="{{ asset('/') }}">
                        <li>Main</li>
                    </a>
                    
                    @if(!Auth::check())
                    <a href="{{ route('login') }}">
                        <li>Log in</li>
                    </a>
                    <a href="{{ route('register') }}">
                        <li>Registration</li>
                    </a>
                    @endif

                    @if(Auth::check())
                    <a href="{{ route('create') }}">
                        <li>Create</li>
                    </a>

                    @if(Auth::check() && Auth::user()->admin)
                    <a href="{{ route('accept') }}">
                        <li>Accept</li>
                    </a>
                    <a href="{{ route('complaint') }}">
                        <li>Complaint</li>
                    </a>
                    @endif

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @endif



                </ul>
            </div>
        </div>
    </header>
    <main>
        <!-- <div>{{ Auth::user() }}</div> -->
        @yield("content")
    </main>

    <footer>
        <h2>Footer</h2>
    </footer>


</body>

</html>