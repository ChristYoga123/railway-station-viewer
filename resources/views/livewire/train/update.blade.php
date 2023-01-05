<div>
    <div class="mb-8 ml-5 mt-6">
        <form wire:submit.prevent="update" method="post" class="flex gap-3">
            @method("PUT")
            <div class="formulir flex flex-col">
                <label for="name" class="mb-2 text-lg font-semibold">Nama Kereta</label>
                <input type="hidden"
                       wire:model="trainId">
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
            <button class="btn btn-warning mt-9">Ubah</button>
            <button type="button" wire:click="cancel()" class="btn btn-error mt-9">Batal</button>
        </form>
    </div>
</div>
