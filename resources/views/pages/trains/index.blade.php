<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Train') }}
        </h2>
    </x-slot>

    @section('title')
        @if ('is_admin' == 1)
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('admin.train.index') }}">Trains</a>
        @else
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('train.train.index') }}">Trains</a>
        @endif
    @endsection

    <div class="w-full px-4 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            @livewire("train.index")
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>
