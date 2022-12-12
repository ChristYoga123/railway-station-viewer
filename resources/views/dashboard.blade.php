<x-app-layout>
    <nav class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            @can('admin')
                <a class="text-white w-full text-lg uppercase hidden md:inline-block font-semibold pt-4" href="{{ route('train.index') }}">Admin Dashboard</a>
            @endcan
            @can('station')
                <a class="text-white text-lg uppercase hidden md:inline-block font-semibold w-full" href="{{ route('train.index') }}">Station Dashboard</a>
            @endcan
            <div class="flex flex-wrap items-center justify-end w-full px-4 mx-auto md:flex-nowrap md:px-10">
                <x-dropdown>
                    <x-slot name="trigger">
                        <a class="md:block text-slate-500 pt-4 px-8 hidden" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
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

    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</x-app-layout>
