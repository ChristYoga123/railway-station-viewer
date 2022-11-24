<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Station') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-8 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col" class="px-8 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                        Owner
                                    </th>
                                    <th scope="col" class="px-8 py-3 text-left text-sm font-bold text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($stations as $station)
                                        <tr>
                                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                                {{ $station->name }}
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                                {{ $station->User->name }}
                                            </td>
                                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                                <a href="{{ route('station.show', $station) }}" class="text-white bg-gradient-to-r from-yellow-500 via-yellow-600 to-yellow-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
