<x-app-layout>
    <div class="w-full px-4">
        <nav class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-8 px-12">
            <div class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-4 px-4">
                <a class="text-white text-lg uppercase hidden md:inline-block font-semibold" href="{{ route('stationFacility.index') }}">Create a New Facility</a>
            </div>
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
        </nav>
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
            <div class="mb-4 ml-8 mt-8">
                <a href="{{ route('stationFacility.index') }}" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-pink-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-3 text-sm"></i>
                    {{ __('Back to Facility Dashboard') }}
                </a>
            </div>


            <x-divider class="my-4 mx-8" />

            @if ($errors->any())
                <div class="mb-5 px-8" role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        There's Something Wrong!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </p>
                    </div>
                </div>
            @endif

            <div class="block w-full overflow-x-auto px-8">
                <form action="{{ route('stationFacility.store') }}" class="w-full" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold mb-4">Kereta</label>
                            <select class=" form-control block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="station_id">
                                @foreach ($stations as $station)
                                    @if ($station->user_id === Auth::user()->id)
                                        <option value="{{ $station->id }}" placeholder='Choose the Trains'>{{ $station->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold my-4">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" placeholder="Enter a new Facility name" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold my-4">Image</label>
                            <img src="" class="img-preview block mb-3" width="200px">
                            <input required type="file" value="{{ old('image') }}" name="image" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="image" onchange="previewImage()">
                        </div>

                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-md font-bold my-4">Description</label>
                            <textarea name="description" id="ckeditor"></textarea>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm text-center mr-2 mb-2 py-2 px-4 shadow-lg">
                                Save New Facility
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    CKEDITOR.replace( 'ckeditor' )
    function previewImage() {
        const post = document.querySelector('#image');
        const post_preview = document.querySelector('.img-preview');

        post_preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(post.files[0]);

        oFReader.onload = function(oFREvent) {
            post_preview.src = oFREvent.target.result;
        };
    }
    </script>
</x-app-layout>
