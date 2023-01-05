<div>
    <div class="mb-8 ml-5 mt-6">
        <form wire:submit.prevent="store" method="post" class="flex gap-3">
            <div class="formulir flex flex-col">
                <label for="name" class="mb-2 text-lg font-semibold">Nama Kereta</label>
                <input type="text"
                       class="input input-secondary w-full max-w-xs
                              @error("name")
                                input-error
                              @enderror"
                       wire:model="name">
                @error('name')
                    <small class="text-red-700">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-secondary mt-9">Simpan</button>
        </form>
    </div>
</div>
