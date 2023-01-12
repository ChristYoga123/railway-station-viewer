<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    @section('title')
        @can('admin')
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('admin.users.index') }}">Users</a>
        @endcan
        @can('train')
            <a class="text-white w-64 text-lg uppercase hidden md:inline-block font-semibold pt-8" href="{{ route('train.users.index') }}">Users</a>
        @endcan
    @endsection

    <div class="w-full px-4">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">

            {{-- <div class="text-white mx-8 my-4 py-4 border-0 rounded relative  bg-sky-500">
                <span class="inline-block align-middle ml-4">
                    Sample table page
                </span>
            </div> --}}

            <div class="block w-full overflow-x-auto rounded">
                <table class="items-center w-full bg-transparent border-collapse">
                    <thead>
                    <tr>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Name
                        </th>
                        <th class="px-8 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-slate-50 text-slate-500 border-slate-100">
                            Email
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                {{ $user->name }}
                            </td>
                            <td class="px-8 py-4 whitespace-nowrap text-md text-gray-500">
                                {{ $user->email }}
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
