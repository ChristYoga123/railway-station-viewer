<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
>
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
    >
        <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')"
        >
            <i class="fas fa-bars"></i>
        </button>
        @can('train')
        <a
            class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{ route('dashboard') }}"
        >
            Railway Station Viewer
        </a>
        @endcan
        @can('admin')
        <a
            class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{ route('dashboard') }}"
        >
            Railway Station Viewer
        </a>
        @endcan

        <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
                <a
                    class="text-slate-500 block"
                    href="#pablo"
                    onclick="openDropdown(event,'user-responsive-dropdown')"
                >
                    <div class="items-center flex">
                  <span
                      class="w-12 h-12 text-sm text-white bg-slate-200 inline-flex items-center justify-center rounded-full"
                  ><img
                          alt="..."
                          class="w-full rounded-full align-middle border-none shadow-lg"
                          src="https://eu.ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}"
                      /></span></div>
                </a>
                <div
                    class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="user-responsive-dropdown"
                >
                    <div
                        class="h-0 my-2 border border-solid border-slate-100"
                    ></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-slate-700"
                        >{{ __('Log Out') }}</a
                        >
                    </form>
                </div>
            </li>
        </ul>

        <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar"
        >
            <div
                class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-slate-200"
            >
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a
                            class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('dashboard') }}"
                        >
                            Railway Station Viewer
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button
                            type="button"
                            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            onclick="toggleNavbar('example-collapse-sidebar')"
                        >
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Heading -->
            <x-nav-heading>
                @can ('admin')
                    {{ __('Admin Layout Pages') }}
                @endcan
                @can ('train')
                    {{ __('Station Layout Pages') }}
                @endcan
            </x-nav-heading>

            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="mx-2">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <x-slot name="icon">
                            <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                        </x-slot>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>

                @can('admin')
                    <li class="mx-2">
                        <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                            <x-slot name="icon">
                                <i class="fas fa-users mr-2 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Users') }}
                        </x-nav-link>
                    </li>
                @endcan

                <li class="mx-2">
                    <x-nav-link href="{{ route('train.index') }}" :active="request()->routeIs('train.index')">
                        <x-slot name="icon">
                            <i class="fas fa-train mr-3 text-sm opacity-75"></i>
                        </x-slot>
                        {{ __('Trains') }}
                    </x-nav-link>
                </li>

                <li class="mx-2">
                    <x-nav-link href="{{ route('station.index') }}" :active="request()->routeIs('station.index')">
                        <x-slot name="icon">
                            <i class="fas fa-globe mr-3 text-sm opacity-75"></i>
                        </x-slot>
                        {{ __('Stations') }}
                    </x-nav-link>
                </li>

                @can('admin')
                    <li class="mx-2">
                        <x-nav-link href="{{ route('stationFacility.index') }}" :active="request()->routeIs('stationFacility.index')">
                            <x-slot name="icon">
                                <i class="fas fa-check-circle mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Facility') }}
                        </x-nav-link>
                    </li>
                @endcan

                @can('train')
                  <li class="mx-2">
                    <x-nav-link href="{{ route('trainStation.index') }}" :active="request()->routeIs('trainStation.index')">
                        <x-slot name="icon">
                            <i class="fas fa-clock mr-3 text-sm opacity-75"></i>
                        </x-slot>
                        {{ __('Train Schedule') }}
                    </x-nav-link>
                  </li>
                @endcan
            </ul>

            {{-- <x-divider class="my-4" />

            <x-nav-heading>
                Two-level menu
            </x-nav-heading>

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <x-nav-link href="#">
                    <x-slot name="icon">
                        <i class="far fa-circle mr-2 text-sm opacity-75"></i>
                    </x-slot>
                    Child menu
                </x-nav-link>
            </ul> --}}
        </div>
    </div>
</nav>
