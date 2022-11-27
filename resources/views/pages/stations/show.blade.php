<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Station') }}
        </h2>
    </x-slot>

    <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-8">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            <a class="text-white text-lg uppercase hidden md:inline-block font-semibold" href="{{ route('station.index') }}">Stations</a>
        </div>
    </nav>
    <div class="w-full px-4 ">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">

            <div class="mb-10 ml-5 mt-8">
                <a href="{{ route('station.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-3 text-sm"></i>
                    {{ __('Station') }}
                </a>
            </div>

            <div class="block w-full overflow-x-auto">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                    <tr>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Name
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center bg-slate-50 text-slate-500 border-slate-100">
                            Owner
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center bg-slate-50 text-slate-500 border-slate-100">
                            Facility
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-center bg-slate-50 text-slate-500 border-slate-100">
                            Train
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 ">
                                    {{ $station->name }}
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                    {{ $station->User->name }}
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                    - Kamar Mandi <br/>
                                    - Pump <br/>
                                    - Time Crisis <br/>
                                </td>
                                <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                    Thomas and his friends
                                </td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- {{ $trains->links() }} --}}

    </div>
</x-app-layout>



