<div>
    @if (session()->has("success"))
        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500">Sukses</span>
                    <p class="text-sm text-gray-600">{{ session("success") }}</p>
                </div>
            </div>
        </div>
    @elseif(session()->has("error"))
        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-red-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-red-500">Error</span>
                    <p class="text-sm text-gray-600">{{ session("error") }}</p>
                </div>
            </div>
        </div>
    @endif
    @can('admin')
        @if ($statusUpdate)
            <div class="mb-8 ml-5 mt-6">
                @livewire("route.update")
            </div>
        @else
            <div class="mb-8 ml-5 mt-6">
                @livewire("route.create")
            </div>
        @endif
    @endcan
    <hr class="mb-5">
    <div class="block w-full overflow-x-auto rounded">
        <table class="items-center w-full bg-transparent border-collapse">
            <thead>
            <tr>
                <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                    Stasiun Awal
                </th>
                <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold  bg-slate-50 text-slate-500 border-slate-100">
                    Stasiun Akhir
                </th>
                <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold  bg-slate-50 text-slate-500 border-slate-100">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr>
                        <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 ">
                            {{ $route->StartStation->name }}
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 ">
                            {{ $route->EndStation->name }}
                        </td>
                        <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500 ">
                            <button wire:click="edit({{ $route->id }})" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Edit</button>
                            <button wire:click="destroy({{ $route->id }})" class="inline text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 cursor-pointer">Delete</button>
                        </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
