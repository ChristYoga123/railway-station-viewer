<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Train') }}
        </h2>
    </x-slot>

    @section('title')
        <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('train.index') }}">Trains</a>
    @endsection

    <div class="w-full px-4 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            @can('train')
                <div class="mb-8 ml-5 mt-6">
                    <a href="{{ route('train.create') }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        + Create Train
                    </a>
                </div>
            @endcan

            <div class="block w-full overflow-x-auto rounded">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                    <tr>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Name
                        </th>
                        @can('admin')
                            <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold  bg-slate-50 text-slate-500 border-slate-100">
                                Action
                            </th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($trains as $train)
                            <tr>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                    {{ $train->name }}
                                </td>
                                @can('train')
                                    <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                        <a href="{{ route('train.edit', $train) }}" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</a>
                                        <form action="{{ route('train.destroy', $train->id) }}" method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">Delete</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>
