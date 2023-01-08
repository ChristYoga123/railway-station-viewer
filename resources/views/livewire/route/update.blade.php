<div>
    <form wire:submit.prevent="update">
        <div class="flex justify-around gap-3">
            <div class="form flex flex-col">
                <label for="station_start_id" class="text-xs font-semibold mb-3">Station Awal</label>
                <select wire:model="station_start_id" 
                        id="station_start_id"
                        class="select select-primary w-full max-w-xs
                        @error("station_start_id")
                            select-error
                        @enderror">
                    <option value="">Pilih stasiun awal</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}" {{ $station->id === $station_start_id ? "selected" : "" }}>{{ $station->name }}</option>
                    @endforeach
                </select>
                @error('station_start_id')
                    <small class="text-red-700">{{ $message }}</small>
                @enderror
            </div>

            <div class="form flex flex-col">
                <label for="station_end_id" class="text-xs font-semibold mb-3">Station Akhir</label>
                <select wire:model="station_end_id" 
                        id="station_end_id"
                        class="select select-primary w-full max-w-xs
                        @error("station_end_id")
                            select-error
                        @enderror">
                    <option value="">Pilih stasiun akhir</option>
                    @foreach ($stations as $station)
                        <option value="{{ $station->id }}" {{ $station->id === $station_end_id ? "selected" : "" }}>{{ $station->name }}</option>
                    @endforeach
                </select>
                @error('station_end_id')
                    <small class="text-red-700">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-warning mt-6">Simpan</button>
            <button wire:click="cancel" type="button" class="btn btn-error mt-6">Batal</button>
        </div>
    </form>
</div>
