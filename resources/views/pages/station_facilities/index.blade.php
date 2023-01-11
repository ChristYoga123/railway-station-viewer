<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Station Facility') }}
        </h2>
    </x-slot>

    @section('title')
        @if ('is_admin' == 1)
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('admin.stationFacility.index') }}">Station Facility</a>
        @else
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('train.stationFacility.index') }}">Station Facility</a>
        @endif
    @endsection

    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            @if('is_admin' == 1)
                <div class="mb-8 ml-5 mt-6">
                    <a href="{{ route('admin.stationFacility.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        + Create Facility
                    </a>
                </div>
            @endif

            <div class="block w-full overflow-x-auto rounded">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                    <tr>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Stasiun
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Name
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Image
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold  bg-slate-50 text-slate-500 border-slate-100">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($station_facilities as $stationFacility)
                            <tr>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                    {{ $stationFacility->Station->name }}
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                    {{ $stationFacility->name }}
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                    <img src="/storage/{{ $stationFacility->image }}" alt="" width="180px">
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                    <a href="{{ route('admin.stationFacility.show', $stationFacility->id) }}" class="mr-1 text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Detail</a>
                                    <a href="{{ route('admin.stationFacility.edit', $stationFacility->id) }}" class=" mr-1 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2">Edit</a>
                                    <form action="{{ route('admin.stationFacility.destroy', $stationFacility->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">Delete</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>
