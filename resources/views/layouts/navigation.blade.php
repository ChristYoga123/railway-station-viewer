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
            href="{{ route('train.dashboard') }}"
        >
            Railway Station Viewer
        </a>
        @endcan
        @can('admin')
        <a
            class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
            href="{{ route('admin.dashboard') }}"
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
                        {{-- <a
                            class="md:block text-left md:pb-2 text-slate-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            href="{{ route('dashboard') }}"
                        >
                            Railway Station Viewer
                        </a> --}}
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
                @if ('is_admin' == 1)
                    {{ __('Admin Layout Pages') }}
                @else
                    {{ __('Station Layout Pages') }}
                @endif
            </x-nav-heading>

            <!-- Navigation -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                @if ('is_admin' == 1)
                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            <x-slot name="icon">
                                <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                            <x-slot name="icon">
                                <i class="fas fa-users mr-2 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Users') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.train.index') }}" :active="request()->routeIs('admin.train.index')">
                            <x-slot name="icon">
                                <i class="fas fa-train mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Trains') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.station.index') }}" :active="request()->routeIs('admin.station.index')">
                            <x-slot name="icon">
                                <i class="fas fa-globe mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Stations') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.stationFacility.index') }}" :active="request()->routeIs('admin.stationFacility.index')">
                            <x-slot name="icon">
                                <i class="fas fa-check-circle mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Facility') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('admin.route.index') }}" :active="request()->routeIs('admin.route.index')">
                            <x-slot name="icon">
                                <i class="fas fa-clock mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Route') }}
                        </x-nav-link>
                    </li>
                @else
                    <li class="mx-2">
                        <x-nav-link href="{{ route('train.dashboard') }}" :active="request()->routeIs('train.dashboard')">
                            <x-slot name="icon">
                                <i class="fas fa-tv mr-2 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('train.train.index') }}" :active="request()->routeIs('train.train.index')">
                            <x-slot name="icon">
                                <i class="fas fa-train mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Trains') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('train.station.index') }}" :active="request()->routeIs('train.station.index')">
                            <x-slot name="icon">
                                <i class="fas fa-globe mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Stations') }}
                        </x-nav-link>
                    </li>

                    <li class="mx-2">
                        <x-nav-link href="{{ route('train.trainStation.index') }}" :active="request()->routeIs('train.trainStation.index')">
                            <x-slot name="icon">
                                <i class="fas fa-clock mr-3 text-sm opacity-75"></i>
                            </x-slot>
                            {{ __('Train Schedule') }}
                        </x-nav-link>
                    </li>
                @endif
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
