<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Route Station') }}
        </h2>
    </x-slot>

    @section('title')
        <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('route.index') }}">Rute Stasiun</a>
    @endsection

    <div class="w-full px-4 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white">
            @livewire("route.index")
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>



