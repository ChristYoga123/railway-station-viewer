<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Railway Station Viewer') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="/ckeditor/ckeditor.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-slate-700">
    @include('layouts.navigation')

    <div class="relative md:ml-64 bg-slate-50">
        <!-- TOP NAV -->
        <nav class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
                @yield('title')
                <div class="flex flex-wrap items-center justify-end w-full mx-auto px-4 md:flex-nowrap pt-4">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <a class="md:block text-slate-500 pt-4 hidden" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                                <span class="text-white ">{{ Auth::user()->name }}</span>
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link href="{{ route('profile.show') }}">{{ __('My profile') }}</x-dropdown-link>
                            <x-divider />
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </nav>
        <!-- END TOP NAV -->
        @if (Auth::user()->is_admin == 1)
            <div class="relative pt-12 pb-32 bg-pink-600 md:pt-32">
                <div class="w-full px-4 mx-auto md:px-10">
                    <div class="flex flex-wrap"></div>
                </div>
            </div>
        @else
            <div class="relative pt-12 pb-32 bg-blue-600 md:pt-32">
                <div class="w-full px-4 mx-auto md:px-10">
                    <div class="flex flex-wrap"></div>
                </div>
            </div>
        @endif

        <div class="w-full px-4 mx-auto -m-24 md:px-10">
            {{ $slot }}
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }

        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
</body>

</html>
