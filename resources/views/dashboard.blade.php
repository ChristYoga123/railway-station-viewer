<x-app-layout>
    <nav class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            @can('admin')
                <a class="text-white w-full text-lg uppercase hidden md:inline-block font-semibold pt-4" href="{{ route('dashboard') }}">Admin Dashboard</a>
            @endcan
            @can('station')
                <a class="text-white text-lg uppercase hidden md:inline-block font-semibold w-full" href="{{ route('dashboard') }}">Station Dashboard</a>
            @endcan
        </div>
    </nav>

    @if ($errors->any())
        <div class="mb-5 px-8" role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                There's Something Wrong!
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>
            </div>
        </div>
    @endif

    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-0 shadow-lg">
            <div class="flex-auto p-4">
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
</x-app-layout>
