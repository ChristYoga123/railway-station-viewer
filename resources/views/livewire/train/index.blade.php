<div>
    @can('admin')
        @if ($statusUpdate)
            @livewire('train.update')
        @else
            @livewire('train.create')
        @endif
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
                        @can('admin')
                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 text-center">
                                <button wire:click="getTrain({{ $train->id }})" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                                <button wire:click="destroy({{ $train->id }})" class="inline text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">Delete</button>
                            </td>
                        @endcan
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
