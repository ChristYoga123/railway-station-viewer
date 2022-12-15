<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Train Schedule') }}
        </h2>
    </x-slot>

    <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-8">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            <a class="text-white text-lg uppercase hidden md:inline-block font-semibold w-full" href="{{ route('stationFacility.index') }}">Station Schedule Detail</a>
        </div>
        <div class="flex flex-wrap items-center justify-end w-full px-4 mx-auto md:flex-nowrap md:px-20">
                <x-dropdown>
                    <x-slot name="trigger">
                        <a class="md:block text-slate-500 pt-4 px-8 hidden" href="#pablo" onclick="openDropdown(event,'user-dropdown')"></a>
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
    </nav>
    <div class="w-full px-4 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">

            <div class="mb-10 ml-5 mt-8">
                <a href="{{ route('stationFacility.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-3 text-sm"></i>
                    {{ __('Back to Station Dashboard') }}
                </a>
            </div>

            <div class="block w-full overflow-x-auto">
                <div class="ml-6 block">
                    <h1 class="text-xl font-semibold mb-2">
                        Stasiun
                    </h1>
                    <h2 class="text-lg mb-2"> &rsaquo; {{ $station_facility->Station->name }}</h2>
                </div>

                <x-divider class="my-4 mx-6" />

                <div class="mt-4 ml-6 block">
                    <h1 class="text-xl font-semibold mb-2">
                        Nama Fasilitas
                    </h1>
                    <h2 class="text-lg mb-2"> &rsaquo; {{ $station_facility->name }} </h2>
                </div>

                <x-divider class="my-4 mx-6" />

                <div class="mt-4 ml-6 block">
                    <h1 class="text-xl font-semibold mb-2">
                        Gambar
                    </h1>
                    <img src="/storage/{{ $station_facility->image }}" width="200px">
                </div>

                <x-divider class="my-4 mx-6" />


                <div class="mt-4 mb-8 mx-6 block">
                    <h1 class="text-xl font-semibold mb-2">
                        Deskripsi
                    </h1>
                    <p>{!! $station_facility->description !!}</p>
                </div>
            </div>
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>



