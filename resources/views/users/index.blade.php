<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-8">
        <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4">
            <a class="text-white text-lg uppercase hidden md:inline-block font-semibold" href="{{ route('users.index') }}">Users</a>
            <div class="flex flex-wrap items-center justify-end w-full px-4 mx-auto md:flex-nowrap md:px-10">
                <x-dropdown>
                    <x-slot name="trigger">
                        <a class="md:block text-slate-500 pt-4 px-8 hidden" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                            
                        </a>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.show') }}">{{ __('My profile') }}</x-dropdown-link>
                        <x-divider />
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </nav>
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
